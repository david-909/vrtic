<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    @page {
        size: a4;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: DejaVu Sans !important;
        font-size: 12px;
        list-style-type: none;
        text-decoration: none;

    }

    body {
        margin: 0 auto;
    }
</style>


<body>
    <div class="paper"
        style="position: fixed;width: 210mm !important; height: 297mm !important;min-height: 210mm !important; margin: 0 auto; vertical-align: center; top: 0; left: 0;">
        <div class="faktura-format" style="top: 10mm;width: 200mm;height: 30mm;">
            <div class="faktura" style="width: 210mm; margin: 0 auto;">
                <div class="faktura-head">
                    <img src="data:image/png;base64, {{ $mailData['logo'] }}" height="110px">
                    <div class="firm-info" style="display: inline-block; float: right; margin-top: 20px;">
                        <ul">
                            <li>PIB: {{ $mailData['pib'] }}</li>
                            <li>matični br: {{ $mailData['maticni_broj'] }}</li>
                            <li>šifra delatnosti: 1234</li>
                            <li>tekući račun: {{ $mailData['racun'] }}</li>
                            </ul>
                    </div>
                </div>

            </div>
        </div>
        <p style="border-bottom: 15px solid black;"></p>
        <div style="text-align: center; margin-top: 4px;font-weight: 500;">
            <span>
                Adresa: Ulica 32 •
            </span>
            <span>
                Telefon: 061 111 1111 •
            </span>
            <span>
                mail: vrticvrticvrtic@gmail.com •
            </span>
            <span>
                website: sajt.com
            </span>
        </div>

        <h3 style="text-indent: 15px; margin-top: 20px; border-bottom">RAČUN</h3>
        <p style="width: 210px;border-bottom: 2px solid black; margin-top: 5px; margin-bottom: 20px;"></p>
        <div>
            <ul style="display: inline-block;margin-left: 20px;">
                <li>Broj:</li>
                <li>Mesto:</li>
                <li>Poziv na broj:</li>
                <li>Datum računa:</li>
                <li>Datum prometa:</li>
                <li>Dospeće:</li>
            </ul>
            <ul style="display: inline-block;margin-left: 20px;">
                <li>{{ $mailData['broj_fakture'] }}</li>
                <li>Beograd</li>
                <li>{{ $mailData['broj_fakture'] }}</li>
                <li>{{ $mailData['datumRacuna'] }}</li>
                <li>{{ $mailData['datumRacuna'] }}</li>
                <li>ROK</li>
            </ul>
            <ul style="display: inline-block;margin-left: 120px; border-left: 2px solid black; padding-left: 8px;">
                <li>{{ $mailData['ime_nosioca'] }} ({{ $mailData['ime_deteta'] }}) {{ $mailData['prezime_nosioca'] }}
                </li>
                <li>{{ $mailData['adresa'] }}</li>
                <li>11000 Beograd</li>
            </ul>
        </div>


        <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">Vrsta robe odn. usluga</th>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">Kolicina</th>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">Cena</th>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">PDV u %</th>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">Cena + PDV</th>
                    <th style="border-bottom: 2px solid black;padding-bottom: 3px;">Vrednost RSD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-indent: 10px; border-bottom: 2px solid black; padding-bottom: 4px">Naknada za
                        {{ $mailData['mesec'] }}
                        {{ $mailData['godina'] }}.</td>
                    <td style="text-align: center; border-bottom: 2px solid black; padding-bottom: 4px ">1</td>
                    <td style="text-align: center; border-bottom: 2px solid black;">
                        {{ number_format($mailData['iznos'], 2, ',', '.') }}</td>
                    <td style="text-align: center; border-bottom: 2px solid black; padding-bottom: 4px ">0
                    </td>
                    <td style="text-align: center; border-bottom: 2px solid black; padding-bottom: 4px ">0</td>
                    <td style="text-align: center; border-bottom: 2px solid black; padding-bottom: 4px ">
                        {{ number_format($mailData['iznos'], 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid black; padding-bottom: 4px"></td>
                    <td style="border-bottom: 1px solid black; padding-bottom: 4px"></td>
                    <td style=" border-bottom: 1px solid black; padding-bottom: 4px; text-align: right"><b>UKUPNO
                            RSD:</b></td>
                    <td style="border-bottom: 1px solid black; padding-bottom: 4px"></td>
                    <td style="border-bottom: 1px solid black; padding-bottom: 4px"></td>
                    <td style="border-bottom: 1px solid black; padding-bottom: 4px; text-align: center">
                        {{ number_format($mailData['iznos'], 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right"><b>Za plaćanje:</b></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center">{{ number_format($mailData['iznos'], 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <h4>Napomena:</h4>
            <p>PDV nije obračunat u skladu sa članom 25, stav 2, tačka 13 Zakona o porezu na dodatu vrednost.</p>
        </div>

        <div style="position:absolute;bottom: 110mm;width: 210mm;">
            <div style="position: absolute;top:0; left:0; width: 97mm;">
                <table class="left-side"style="vertical-align: top">
                    <tbody>
                        <tr>
                            <td>
                                <h4 style="font-size: 13px;font-weight: 400;margin-bottom: 1px;">платилац</h4>
                                <div class="box"
                                    style="width: 91mm;height: 15mm;border: 1px solid black; font-size: 14px;overflow-y:hidden;">
                                    <p>{{ $mailData['ime_prezime_deteta'] }},</p>
                                    <p>{{ $mailData['adresa'] }}, Beograd</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 style="font-size: 13px;font-weight: 400;margin-top: 3mm;margin-bottom: 1px;">сврха
                                    уплате
                                </h4>
                                <div class="box"
                                    style="width: 91mm;height: 15mm;border: 1px solid black; font-size: 14px;overflow-y:hidden;">
                                    Uplata za mesec {{ lcfirst($mailData['mesec']) }} {{ $mailData['godina'] }}.
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 style="font-size: 13px;font-weight: 400;margin-top: 3mm;margin-bottom: 1px;">
                                    прималац
                                </h4>
                                <div class="box"
                                    style="width: 91mm;height: 15mm;border: 1px solid black; font-size: 14px;overflow-y:hidden;">
                                    "Vrtic" P.P.U.
                                    <p>Ulica broj</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <div class="box3"
                                    style="width: 56mm; margin-top: 7mm;border-bottom: 1px solid black;">

                                </div>
                                <h4 style="font-size: 13px;font-weight: 400;margin-top: 0mm;margin-bottom: 1px;">печат
                                    и
                                    потпис
                                    платиоца</h4>
                            </td>
                        </tr>
                    </tbody>
                    <tr style="position:relative;width: 80mm;">
                        <td style="width: 80mm;position:relative;">
                            <p class="box3"
                                style="position:absolute;right:0;width: 40mm; margin-top: 7.3mm;border-bottom: 1px solid black;text-align: end">

                            </p>
                            <h4
                                style="position:absolute;top:40px;right:0;font-size: 13px;font-weight: 400;margin-top: 1mm;top: 25px;text-align:right">
                                место и
                                датум пријема</h4>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="position: absolute;top:0; right:0; width: 100mm;">
                <h3 style="font-size: 21px;right:0;color:black !important; text-align: right;">НАЛОГ ЗА УПЛАТУ</h3>
                <table class="right-side" style="vertical-align: top">
                    <tbody style="width: 90mm;height: 50mm">
                        <tr>
                            <td style="width: 90mm; vertical-align: middle;">
                                <div class="sp" style="display: inline-block; vertical-align: bottom;">
                                    <h4
                                        style="margin-top: 0; font-size: 13px;font-weight: 400; vertical-align: middle;">
                                        шифра
                                    </h4>
                                    <h4
                                        style="margin-top: 0; font-size: 13px;font-weight: 400; vertical-align: middle;">
                                        плаћања
                                    </h4>
                                    <div
                                        style="width: 13mm; height: 6mm; margin-right: 5mm; border: 2px solid black; font-size: 12px;text-align:center;  vertical-align: middle;">
                                        189
                                    </div>
                                </div>
                                <div class="valuta" style="display: inline-block; vertical-align: bottom; ">
                                    <h4 style="margin-top: 0;font-size: 13px;font-weight: 400;">
                                        валута
                                    </h4>
                                    <div
                                        style="width: 13mm; height: 6mm; margin-right: 7mm; border: 2px solid black; font-size: 12px;text-align:center;vertical-align: middle;">
                                        RSD
                                    </div>
                                </div>
                                <div class="iznos" style="display: inline-block; vertical-align: bottom;">
                                    <h4 style="margin-top: 0;font-size: 13px;font-weight: 400;">
                                        износ
                                    </h4>
                                    <div
                                        style="width: 55.9mm; height: 6mm; border: 2px solid black; font-size: 12px; vertical-align: middle;">
                                        ={{ number_format($mailData['iznos'], 2, ',', '.') }}
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 style="font-size: 13px;font-weight: 400;margin-bottom: 1px;">рачун
                                    примаоца
                                </h4>
                                <div class="box2"
                                    style="width: 97.7mm; height: 6mm; border: 2px solid black;vertical-align: middle;">
                                    160-0000000000000000000-25
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150mm;" class="working">
                                <h4 style="font-size: 13px;font-weight: 400;">
                                    модел
                                    и
                                    позив
                                    на број (одобрење)</h4>
                                <div class="sp" style="display: inline-block; vertical-align: middle;">
                                    <div
                                        style="width: 10mm; height: 6mm; border: 2px solid black;vertical-align:middle;text-align: center;">
                                        97
                                    </div>
                                </div>
                                <div class="valuta" style="display: inline-block; vertical-align: middle;">
                                    <div
                                        style="margin-left: 5mm;width: 80.7mm; height: 6mm;border: 2px solid black;vertical-align:middle;text-indent: 4px;">
                                        {{ $mailData['broj_fakture'] }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <td>
                            <div class="box3" style="width: 37mm;height:40mm;border-bottom: 1px solid black;">

                            </div>
                            <h4
                                style="margin-top:
                                0; font-size: 13px;font-weight: 400;margin-bottom: 1px;veritcal-align:bottom;">
                                датум извршења</h4>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        <h4
            style="position:absolute;bottom: 10px;left: 50%; transform: translate(-50%,0%);font-size: 7px;font-weight: 400;">
            Образац
            бр. 1</h4>
    </div>
</body>

</html>
