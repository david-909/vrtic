<?php

namespace App\Http\Controllers;

use App\Models\Faktura;
use App\Models\Ugovor;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;


class FileController extends Controller
{
    public function upload(Request $request, ToastrFactory $flasher)
    {
        if ($request->has("file")) {
            if ($request->file->getClientMimeType() == "text/xml") {
                $xml = file_get_contents($request->file('file'));
                $xmlObject = simplexml_load_string($xml);
                $json = json_encode($xmlObject);
                $final = json_decode($json);
                $xmlData = $final->stmtrs->trnlist->stmttrn;

                $data = [];
                gettype($xmlData) == "object" ? array_push($data, $xmlData) : $data = $xmlData;
                foreach ($data as $d) {
                    if ($d->purposecode == "289" || $d->purposecode == "189") {
                        $faktura = Faktura::where("broj_fakture", $d->refnumber)->whereRaw("iznos != placeno")->first();
                        if ($faktura) {
                            $faktura->placeno = $faktura->placeno + $d->trnamt;
                            $faktura->updated_at = explode("T", $d->dtuser)[0];
                            Toastr::addSuccess("Faktura broj: " . $d->refnumber . " uspešno plaćena.");
                            $faktura->save();
                        } else {
                            $brUgovora = explode("-", $d->refnumber);
                            $brUgovora = $brUgovora[0] . "-" . $brUgovora[1];
                            $ugovor = Ugovor::with(["dete"])->where("broj_ugovora", "LIKE", $brUgovora)->where("active", 1)->first();
                            $faktureDeteta = Faktura::with(["mesec", "godina"])->where("dete_id", $ugovor->dete->id)->whereRaw("iznos != placeno")->get();
                            if ($faktureDeteta) {
                                $msg = "Nismo mogli da pronadjemo fakturu sa zadatim brojem. Neplaćene fakture deteta su: ";
                                foreach ($faktureDeteta as $faktura) {
                                    $msg .= $faktura->mesec->mesec . " " . $faktura->godina->godina . " | ";
                                }
                            }
                            Toastr::persistent()->addWarning($msg);
                        }
                    }
                }
                return redirect()->back();
            } else {
                Toastr::addError("Fajl mora biti XML");
                return redirect()->back();
            }
        } else {
            Toastr::addError("Morate izabrati fajl");
            return redirect()->back();
        }
    }
}
