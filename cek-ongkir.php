<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="asset/jquery/jquery-3.3.1.min.js"></script>
    <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
    <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="asset/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</head>

<body> -->

<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$atasnama = $_POST['pemilikrekening'];
$rekening = $_POST['nomorrekening'];
$bank = $_POST['bank'];
$whatsapp = $_POST['whatsapp'];
$alamat = $_POST['alamat'];
$jumlah = $_POST['jumlah'];
// $price = $_POST['price'];
// set default kota asal 114 kode kota denpasar
$kota_asal = 151;
//jika mau set oleh user gunakan kode dibawah 
// $kota_asal = $_POST['kota_asal'];
$kota_tujuan = $_POST['kota_tujuan'];
$kurir = $_POST['kurir'];
$berat = $_POST['jumlah'] * 100;
$total_harga = $jumlah * 12500;
$kode = date('mdYhis');
$message = "testing 123";
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
    CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
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
$provinsiasal = $data['rajaongkir']['origin_details']['province'];
$kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
$provinsitujuan = $data['rajaongkir']['destination_details']['province'];
$berat = $data['rajaongkir']['query']['weight'] / 1000;

?>


<div class="panel panel-default">
    <div class="panel-body">
        <table width="100%">
            <img src="img/garaga_logo.png" class="logo" alt="garaga_logo">
            <tr>
                <td width='30%' class='font'><b>Nama Pemesan</b> </td>
                <td class='font'>:<b><?= $nama ?></b></td>
            </tr>
            <tr>
                <td width='40%' class='font'><b>Atas Nama Pemilik Rekening</b> </td>
                <td class='font'>:<b><?= $atasnama ?></b></td>
            </tr>
            <tr>
                <td width='30%' class='font'><b>No. Rekening</b> </td>
                <td class='font'>:<b><?= $rekening ?></b></td>
            </tr>
            <tr>
                <td width='15%' class='font'><b>Bank</b></td>
                <td class='font'>:<b><?= $bank ?></b></td>
            </tr>
            <tr>
                <td width="15%" class='font'><b>Whatsapp</b> </td>
                <td class='font'>:<b><?= $whatsapp ?></b></td>
            </tr>
            <tr>
                <td width="15%" class='font'><b>Alamat</b> </td>
                <td class='font'>:<b><?= $alamat ?></b></td>
            </tr>
            <tr>
                <td width="15%" class='font'><b>Jumlah</b> </td>
                <td class='font'>:<b><?= $jumlah ?> Bungkus/Pcs</b></td>
            </tr>
            <tr>
                <td width="15%" class='font'><b>Kurir</b> </td>
                <td class='font'>:<b><?= $kurir ?></b></td>
            </tr>
            <tr>
                <td class='font'><b>Dari</b></td>
                <td class='font'>:<b><?= $kotaasal . ", " . $provinsiasal ?></b></td>
            </tr>
            <tr>
                <td class='font'><b>Tujuan</b></td>
                <td class='font'>:<b><?= $kotatujuan . ", " . $provinsitujuan ?></b></td>
            </tr>
            <tr>
                <td class='font'><b>Berat (Kilo)</b></td>
                <td class='font'>:<b><?= $berat ?> Kilogram</b></td>
            </tr>
            <tr>
                <td class='font'><b>kode</b></td>
                <td class='font'>:<b><?= $kode ?></b></td>
            </tr>
        </table><br>
        <table class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th class='font'>Nama Layanan</th>
                    <th class='font'>Tarif</th>
                    <th class='font'>ETD(Estimates Days)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datanya = $data['rajaongkir']['results'][0]['costs'];
                // $valuenya = $datanya['service'];
                // $valuenya = $value['service'];
                $service = $data['rajaongkir']['results'][0]['costs'][1]['service'];
                foreach ($datanya as $value) {
                    // $valuenya=$value['service']
                    echo "<tr class='font'>";
                    echo "<td class='font'>" . $value['service'] . "</td>";
                    // echo "<td>" . $value['costs'][0] . "</td>";

                    foreach ($value['cost'] as $tarif) {
                        echo "<td align='right' class='font'>Rp " . number_format($tarif['value'], 0, ',', '.') . "</td>";
                        echo "<td class='font'>" . $tarif['etd'] . " Hari</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tr>
                <td class='font'><b>Total Harga :</b></td>
                <?php
                $nominal = $total_harga + $tarif['value'];
                $format = "Rp " . number_format($nominal, 2, ',', '.');
                ?>

                <td class='font' name="total"><b><?= $format   ?></b></td>
            </tr>
        </table>
        <!-- total harga -->
        <input type="text" readonly value="<?= $nominal; ?>" id="myInput">
        <button onclick="myFunction('myInput')">Copy text</button>

        <p id="show" class="font">test</p>
        <p class="font">*(klik untuk copy nominal)</p>

        <p class="font">*(HARGA diatas SUDAH termasuk ONGKIR!.)</p>

        <h2 class="font">BCA</h2>
        <input type="text" readonly value="0401362184" name="norekening" id="rekeningnumber">
        <button id="rekening" onclick="myFunction('rekeningnumber')">copy</button>
        <!-- <button><a href="https://api.whatsapp.com/send?phone=<?= $whatsapp ?>&text=<?= $message ?>"></a></button> -->
    </div>
</div>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";


if ($service == null) {
    $service = $data['rajaongkir']['results'][0]['costs'][0]['service'];


    $mail = new PHPMailer;

    //Enable SMTP debugging. 
    // $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    // $mail->isMail();
    //Set SMTP host name                          
    $mail->Host = "tls://smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "emailanda@gmail.com";   //nama-email smtp          
    $mail->Password = "password";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "emailanda@gmail.com"; //email pengirim
    $mail->FromName = "ADE"; //nama pengirim

    $mail->addAddress($email, $_POST['nama']); //email penerima

    $mail->isHTML(true);
    $mail->AddEmbeddedImage('garaga_logo.png', 'garaga_logo', 'garaga_logo.png');
    // $mail->addStringAttachment(file_get_contents("https://ibb.co/Yy82mnL"), "garaga_logo");
    $mail->Subject = "INVOICE PEMBELIAN GARAGA KING COFFEE"; //subject
    $mail->Body    = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <style>
        .logo{
            cursor: pointer;
            position: flex;
            width: 100px; 
            height: 100px; 
            display: block; 
        }
        </style>
    </head>
    <body>
    <div class='panel panel-default'>
    <h2>INVOICE PEMBELIAN GARAGA KING COFFEE</h2>
        <div class='panel-body'>
            <table width='100%'>
            <img src='cid:garaga_logo' class='logo' alt='garaga'>
                <tr>
                    <td width='15%' class='font'><b>Nama Pemesan</b> </td>
                    <td class='font'>:<b>$nama</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Atas Nama Pemilik Rekening</b> </td>
                    <td class='font'>:<b>$atasnama</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>No. Rekening</b> </td>
                    <td class='font'>:<b>$rekening</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Bank</b></td>
                    <td class='font'>:<b>$bank</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Whatsapp</b> </td>
                    <td class='font'>:<b>$whatsapp</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Alamat</b> </td>
                    <td class='font'>:<b>$alamat</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Jumlah</b> </td>
                    <td class='font'>:<b>$jumlah Bungkus/Pcs</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Kurir</b> </td>
                    <td class='font'>:<b>$kurir</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Tipe Servis</b></td>
                    <td class='font'>:<b>$service </b></td>
                </tr>
                <tr>
                    <td class='font'><b>Dari</b></td>
                    <td class='font'>:<b>$kotaasal , $provinsiasal</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Tujuan</b></td>
                    <td class='font'>:<b>$kotatujuan , $provinsitujuan</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Berat (Kilo)</b></td>
                    <td class='font'>:<b>$berat Kilogram</b></td>
                </tr>
                <tr>
                    <td class='font'><h2><b>Total Bayar</b></h2></td>
                    <td class='font'><h2>:<b>$format</b></h2></td>
                </tr>
                <tr>
                    <td class='font'><b>kode</b></td>
                    <td class='font'>:<b> $kode </b></td>
                </tr>
                </table> 
                <hr>
                <p><b>Nb.Bila dalam 1x24 jam anda belum melakukan transfer, maka kami anggap batal</b></p>
                <h4><b>Silahkan Transfer Sejumlah $format ke 0401696465</b></h4>
                <h4><b>BCA an. I Wayan Suparta</b></h4>
                <h3><b>IKUTI TATACARA KONFIRMASI PEMBAYARAN BERIKUT:</b> </h3>
                <table style='width:100%'>
    
                <tr>
                    <td class='font' width='5%'><b>1.</b></td>
                    <td class='font'><b>Screenshot invoice ini.</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>2.</b></td>
                    <td class='font'><b>Kirimkan screenshot tersebut ke nomor Whatsapp kami(no papa).</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>3.</b></td>
                    <td class='font'><b>Lakukan Pembayaran ke nomor rekening kami sesuai dengan nominal Total Bayar</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>4.</b></td>
                    <td class='font'><b>kirimkan bukti transfer anda ke nomor Whatsapp kami.</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>5.</b></td>
                    <td class='font'><b>dalam waktu 1x 24 jam kami akan melakukan verifikasi bukti transfer dan invoice yang anda kirimkan</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>6.</b></td>
                    <td class='font'><b>jika data valid maka kami akan mengirimkan pesan \" VALID \" dan kode resi ke nomor anda. </b></td>
                </tr>
        
                <tr>
                </table>
                <hr>
                    <td class='font'><b><h1>Mohon simpan INVOICE ini sebagai bukti pada saat akan melakukan konfirmasi pembayaran!</h1></b></td>
                </tr>
            </div> 
    </body>
    </html>"; //body email (optional); //isi email
    // $mail->AltBody =
    // $mail->AddEmbeddedImage('img/garaga_logo.png', 'logo_mynotescode', 'garaga_logo.png');

    if (!$mail->send()) {
        // echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "<h2 class='font'>INVOICE TELAH KAMI KIRIMKAN KE ALAMAT E-MAIL ANDA</h2>
        <p class='font'><b>*Silahkan ikuti tata cara konfirmasi pembayaran pada email yang kami kirimkan.</b></p>
        <h3 class='font'><b>-TERIMA KASIH-</b></h3>";
    }
} else {
    $mail = new PHPMailer;

    //Enable SMTP debugging. 
    // $mail->SMTPDebug = 3;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    // $mail->isMail();
    //Set SMTP host name                          
    $mail->Host = "tls://smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "emailanda@gmail.com";   //nama-email smtp          
    $mail->Password = "password";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "emailanda@gmail.com"; //email pengirim
    $mail->FromName = "TESTER"; //nama pengirim

    $mail->addAddress($email, $_POST['nama']); //email penerima

    $mail->isHTML(true);
    $mail->AddEmbeddedImage('garaga_logo.png', 'garaga_logo', 'garaga_logo.png');
    // $mail->addStringAttachment(file_get_contents("https://ibb.co/Yy82mnL"), "garaga_logo");
    $mail->Subject = "INVOICE PEMBELIAN GARAGA KING COFFEE"; //subject
    $mail->Body    = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <style>
        .logo{
            cursor: pointer;
            position: flex;
            width: 100px; 
            height: 100px; 
            display: block; 
        }
        </style>
    </head>
    <body>
    <div class='panel panel-default'>
    <h2>INVOICE PEMBELIAN GARAGA KING COFFEE</h2>
        <div class='panel-body'>
            <table width='100%'>
            <img src='cid:garaga_logo' class='logo' alt='garaga'>
                <tr>
                    <td width='15%' class='font'><b>Nama Pemesan</b> </td>
                    <td class='font'>:<b>$nama</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Atas Nama Pemilik Rekening</b> </td>
                    <td class='font'>:<b>$atasnama</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>No. Rekening</b> </td>
                    <td class='font'>:<b>$rekening</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Bank</b></td>
                    <td class='font'>:<b>$bank</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Whatsapp</b> </td>
                    <td class='font'>:<b>$whatsapp</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Alamat</b> </td>
                    <td class='font'>:<b>$alamat</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Jumlah</b> </td>
                    <td class='font'>:<b>$jumlah Bungkus/Pcs</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Kurir</b> </td>
                    <td class='font'>:<b>$kurir</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Tipe Servis</b></td>
                    <td class='font'>:<b>$service </b></td>
                </tr>
                <tr>
                    <td class='font'><b>Dari</b></td>
                    <td class='font'>:<b>$kotaasal , $provinsiasal</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Tujuan</b></td>
                    <td class='font'>:<b>$kotatujuan , $provinsitujuan</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Berat (Kilo)</b></td>
                    <td class='font'>:<b>$berat Kilogram</b></td>
                </tr>
                <tr>
                    <td class='font'><h2><b>Total Bayar</b></h2></td>
                    <td class='font'><h2>:<b>$format</b></h2></td>
                </tr>
                <tr>
                    <td class='font'><b>kode</b></td>
                    <td class='font'>:<b> $kode </b></td>
                </tr>
                </table> 
                <hr>
                <p><b>Nb.Bila dalam 1x24 jam anda belum melakukan transfer, maka kami anggap batal</b></p>
                <h4><b>Silahkan Transfer Sejumlah $format ke 0401696465</b></h4>
                <h4><b>BCA an. I Wayan Suparta</b></h4>
                <h3><b>IKUTI TATACARA KONFIRMASI PEMBAYARAN BERIKUT:</b> </h3>
                <table style='width:100%'>
    
                <tr>
                    <td class='font' width='5%'><b>1.</b></td>
                    <td class='font'><b>Screenshot invoice ini.</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>2.</b></td>
                    <td class='font'><b>Kirimkan screenshot tersebut ke nomor Whatsapp kami(no papa).</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>3.</b></td>
                    <td class='font'><b>Lakukan Pembayaran ke nomor rekening kami sesuai dengan nominal Total Bayar</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>4.</b></td>
                    <td class='font'><b>kirimkan bukti transfer anda ke nomor Whatsapp kami.</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>5.</b></td>
                    <td class='font'><b>dalam waktu 1x 24 jam kami akan melakukan verifikasi bukti transfer dan invoice yang anda kirimkan</b></td>
                </tr>
    
                <tr>
                    <td class='font' width='5%'><b>6.</b></td>
                    <td class='font'><b>jika data valid maka kami akan mengirimkan pesan \" VALID \" dan kode resi ke nomor anda. </b></td>
                </tr>
        
                <tr>
                </table>
                <hr>
                    <td class='font'><b><h1>Mohon simpan INVOICE ini sebagai bukti pada saat akan melakukan konfirmasi pembayaran!</h1></b></td>
                </tr>
            </div> 
    </body>
    </html>"; //body email (optional); //isi email
    // $mail->AltBody =
    // $mail->AddEmbeddedImage('img/garaga_logo.png', 'logo_mynotescode', 'garaga_logo.png');

    if (!$mail->send()) {
        // echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "<h2 class='font'>INVOICE TELAH KAMI KIRIMKAN KE ALAMAT E-MAIL ANDA</h2>
        <p class='font'><b>*Silahkan ikuti tata cara konfirmasi pembayaran pada email yang kami kirimkan.</b></p>
        <h3 class='font'><b>-TERIMA KASIH-</b></h3>";
    }
}
?>

<!-- </body>

</html> -->
