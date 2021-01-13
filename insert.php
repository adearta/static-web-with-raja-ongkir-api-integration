<?php
session_start();
?>
<?php

// $atasnama = $_POST['pemilikrekening'];
// $rekening = $_POST['nomorrekening'];
// $bank = $_POST['bank'];
$nama = $_POST['namapemesan'];
$_SESSION["nama"] = $nama;
$email = $_POST['email'];
$_SESSION["email"] = $email;
$whatsapp = $_POST['whatsapp'];
$_SESSION['whatsapp'] = $whatsapp;
$alamat = $_POST['alamat'];
$_SESSION["alamat"] = $alamat;
$jumlah = $_POST['jumlah'];
$_SESSION["jumlah"] = $jumlah;
// $price = $_POST['price'];
// set default kota asal 114 kode kota denpasar
$kota_asal = 151;
$_SESSION['dari'] = $kota_asal;
//jika mau set oleh user gunakan kode dibawah 
// $kota_asal = $_POST['kota_asal'];
$kota_tujuan = $_POST['kota_tujuan'];
$_SESSION["tujuan"] = $kota_tujuan;
$kurir = "jne";
$berattotal = $jumlah * 100;
$total_harga = $jumlah * 12500;
$totalhargaformat = "Rp " . number_format($total_harga, 2, ',', '.');
$_SESSION['hargabarang'] = $totalhargaformat;
// $kode = date('mdYhis');
// $message = "testing 123";
$cod = 5000;
$biayacod = "Rp " . number_format($cod, 2, ',', '.');
$_SESSION["biayacod"] = $biayacod;
// $idpemesanan = "GRG"M

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berattotal . "&courier=" . $kurir . "",
    // CURLOPT_POSTFIELDS => "origin=114&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key:a1747e5a243659fa23c8793dfc860417"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
//mengambil data berupa json dan mengubahnya menjadi array
$data = json_decode($response, true);

$kurir = $data['rajaongkir']['results'][0]['name'];
$kotaasal = $data['rajaongkir']['origin_details']['city_name'];
$_SESSION['kotaasal'] = $kotaasal;
$provinsiasal = $data['rajaongkir']['origin_details']['province'];
$_SESSION['provinsiasal'] = $provinsiasal;
$kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
$_SESSION['kotatujuan'] = $kotatujuan;
$provinsitujuan = $data['rajaongkir']['destination_details']['province'];
$_SESSION['provinsitujuan'] = $provinsitujuan;
$berat = $data['rajaongkir']['query']['weight'] / 1000;
$_SESSION["berat"] = $berat;
$datanya = (int) $data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
$_SESSION['ongkir'] = $datanya;
$formatongkir = "Rp " . number_format($datanya, 2, ',', '.');
$_SESSION['formatongkir'] = $formatongkir;
// $valuenya = $datanya['service'];
// $valuenya = $value['service'];
// $service = $data['rajaongkir']['results'][0]['costs'][1]['service'];

// $biayapengiriman = (int) $data['rajaongkir']['results'][0]['costs'][1]['cost'][0];
$biayatotal = $datanya + $total_harga + $cod;
$formattotal = "Rp " . number_format($biayatotal, 2, ',', '.');
$_SESSION["harga"] = $formattotal;
?>
<div>
    <table>
        <tr>
            <th class="font" width='20%'>Ongkir:</th>
            <th class="font" width='10%'><?= $formatongkir ?></th>
        </tr>
        <tr>
            <th class="font" width='20%'>Total Biaya:</th>
            <th class="font" width='10%'><?= $formattotal ?></th>
        </tr>
    </table>
</div>