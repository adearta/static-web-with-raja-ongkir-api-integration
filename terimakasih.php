<?php
session_start();
//post variable was $_POST['name']


//post variable was $_POST['age']
// echo $_SESSION['age'];
?>
<?php

$namanya = $_SESSION['nama'];
$whatsappnya = $_SESSION['whatsapp'];
$emailnya = $_SESSION['email'];
$biayacodnya = $_SESSION['biayacod'];
$alamatnya = $_SESSION['alamat'];
$kotatujuannya = $_SESSION['kotatujuan'];
$kotaasalnya = $_SESSION['kotaasal'];
$provinsitujuannya = $_SESSION['provinsitujuan'];
$provinsiasalnya = $_SESSION['provinsiasal'];
$subtotal = $_SESSION['hargabarang'];
// $dari = $_SESSION['dari'];
$beratnya = $_SESSION['berat'];
$formatnya = $_SESSION['harga'];
$jumlahnya = $_SESSION['jumlah'];
$formatongkir = $_SESSION['formatongkir'];
$namawa = $namanya;
$alamatwa = $alamatnya;

$explodenama = explode(" ", $namawa);
$explodealamat = explode(" ", $alamatwa);
$implodenama = implode("%20", $explodenama);
$implodealamat = implode("%20", $explodealamat);
// echo ($implodealamat);
// echo ($implodenama);
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
        .font {
            margin-top: 5pt;
            color: #edf0f1;
        }

        button {
            padding: 9px 25px;
            background-color: #25D366;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
            position: relative;
        }
    </style>
    <style>
        /* body {
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
        } */

        /* input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
*/
        th,
        tr {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .th1 {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <table width='100%'>
                    <img src='69beli-logo.png' class='logo' alt='69beli' style="margin-bottom: 20px;">
                    <tr>
                        <th class='font th1'>
                            <h2><b>Yth. <b style="color: #25D366;"><?= $_SESSION["nama"] ?></b> Terima kasih sudah melakukan order</b></h2>
                            <!-- <h3>invoice anda sudah kami kirimkan ke email anda</h3> -->
                        </th>
                        <!-- <td class='font'>:<b><?= $nama ?></b></td> -->
                    </tr>
                    <tr></tr>
                    <tr>
                        <th class='font th2'>
                            <p><b>Orderan anda kini kami proses, silahkan tunggu kedatangan kurir dalam 2 - 4 hari kedepan, dan mohon siapkan pembayarannya senilai:</b></p>
                            <h2 style="color: #25D366;"><?= $_SESSION["harga"] ?></b></h2>
                            <p><b>Untuk dibayarkan ke kurir J&T langsung Bayar jumlah uang yang sesuai ke kurir, dengan lihat nominal yang tertra di RESI</b></p>
                            <p><b>No.Resi akan diinfokan oleh CS kami.</b></p>
                            <p><b>Stand by dirumah ya kak.. Nanti akan dihubungi oleh kurir, Rumah jangan sampai kosong & jangan lupa uang cash nya.</b></p>
                            <p><b>Terima kasih</b></p>
                            <hr>
                            <p style="color:Tomato;"><b>PENTING : </b></p>
                            <p><b>Kemungkinan total diatas bisa berbeda dengan di resi, karena ada perubahan ongkos kirim dari pihak J&T</b></p>
                            <h3 style="color: #25D366;"><b>Untuk meminta Nomor Resi anda, anda dapat mengklik tombol berikut sehingga kami dapat mengkonfirmasi anda lewat whatsapp</b></h3>
                            <button style="background-color: #25D366;"><a href="https://api.whatsapp.com/send?phone=6281211118369&text=Halo%20kak%20saya%20mau%20pesan%20*Aroma%20Diffuser%20Aromatherapy%20Air%20Humidifier%20Desain%20Kayu%20K%20H41*%0A%20%20%20%0A%20*Nama%20Lengkap*%3A%20<?= $implodenama ?>%20%0A%20*Alamat*%3A%20Jl%20<?= $implodealamat ?>%20%0A%20*No.HP*%3A%20<?= $whatsappnya ?>%20%0A%20*Jumlah%20Orderan*%3A%20<?= $jumlahnya ?>%20%0A%20*Jenis%20Pembayaran*%3A%20COD%20(Cash%20On%20Delivery)%20%0A%20*Sub%20total*%3A%20<?= $subtotal ?>%20%0A%20*Ongkir*%3A%20<?= $formatongkir ?>%20%0A%20*Biaya%20COD*%3A%20<?= $biayacodnya ?>%20%0A*Total%20Harga*%3A%20<?= $formatnya ?>%20%0ATolong%20Segera%20di%20infokan%20total%20biayanya%20ya%20KK">Whatsapp sekarang</a></button>
                            <p><b>*Jika harga pada bagian atas tidak muncul, maka browser anda perlu di update ke versi terbaru, Terima kasih.</b></p>
                        </th>
                        <!-- <td class='font'>:<b></b></td> -->
                    </tr>
                </table>
            </div>
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
    $mail->Username = "cs69belibarang@gmail.com";   //nama-email smtp          
    $mail->Password = "sempol1969";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;

    $mail->From = "cs69belibarang@gmail.com"; //email pengirim
    $mail->FromName = "Admin 69 Beli"; //nama pengirim

    $mail->addAddress($emailnya, $namanya); //email penerima
    $mail->addAddress('69beliaja@gmail.com', $namanya);
    $mail->isHTML(true);
    $mail->AddEmbeddedImage('69beli-logo.png', '69beli-logo', '69beli-logo.png');
    // $mail->addStringAttachment(file_get_contents("https://ibb.co/Yy82mnL"), "garaga_logo");
    $mail->Subject = "INVOICE PEMBELIAN AROMA DIFFUSER AROMATHERAPY AIR HUMIDIFIER DESAIN KAYU K H41"; //subject
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
    <h2>INVOICE PEMBELIAN AROMA DIFFUSER AROMATHERAPY AIR HUMIDIFIER DESAIN KAYU K H41</h2>
        <div class='panel-body'>
            <table width='100%'>
            <img src='cid:69beli-logo' class='logo' alt='garaga'>
                <tr>
                    <td width='15%' class='font'><b>Nama Pemesan</b> </td>
                    <td class='font'>:<b>$namanya</b></td>
                </tr>
                    <td width='15%' class='font'><b>Whatsapp</b> </td>
                    <td class='font'>:<b>$whatsappnya</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Alamat</b> </td>
                    <td class='font'>:<b>$alamatnya</b></td>
                </tr>
                <tr>
                    <td width='15%' class='font'><b>Jumlah</b> </td>
                    <td class='font'>:<b>$jumlahnya Bungkus/Pcs</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Dari</b></td>
                    <td class='font'>:<b>$kotaasalnya , $provinsiasalnya</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Tujuan</b></td>
                    <td class='font'>:<b>$kotatujuannya, $provinsitujuannya</b></td>
                </tr>
                <tr>
                    <td class='font'><b>Berat (Kilo)</b></td>
                    <td class='font'>:<b>$beratnya Kilogram</b></td>
                </tr>
                <tr>
                    <td class='font'><h2><b>Biaya COD</b></h2></td>
                    <td class='font'><h2>:<b>$biayacodnya</b></h2></td>
                </tr>
                <tr>
                    <td class='font'><h2><b>Total Bayar</b></h2></td>
                    <td class='font'><h2>:<b>$formatnya</b></h2></td>
                </tr>
                </table> 
                <hr>
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
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "    <div class='container'><div class='row'><div class='col'><h2 class='font'>INVOICE TELAH KAMI KIRIMKAN KE ALAMAT E-MAIL ANDA</h2>
        <h3 class='font'><b>-TERIMA KASIH-</b></h3></div></div></div>";
    }
    ?>
</body>

</html>