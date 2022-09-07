<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;


class DecaTabelica extends Component
{
    use WithPagination;

    public $listeners = ["deteUpdated" => "render"];

    public $perPage = 10;
    public $search = "";
    public $orderBy = "id";
    public $orderAsc = "DESC";
    public $active = 1;

    public function render()
    {

        $deca = Deca::with(["ugovori", "fakture"])
            ->select(["id", "ime", "prezime", "jmbg", "ime_roditelja"])
            ->whereHas('ugovori', function (Builder $q) {
                $q->where('active', $this->active);
            });
        if (!empty($this->search)) {
            $deca =  $deca->where("id", "LIKE", "%$this->search%")
                ->orWhere("ime", "LIKE", "%$this->search%")
                ->orWhere("prezime", "LIKE", "%$this->search%")
                ->orWhere("jmbg", "LIKE", "%$this->search%")
                ->orWhereHas('ugovori', function (Builder $q) {
                    $q->where('broj_ugovora', "LIKE", "%$this->search%");
                });
        }
        $deca = $deca->orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire.deca-tabelica', ["deca" => $deca, "active" => $this->active]);
    }
}
