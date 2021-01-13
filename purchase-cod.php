<?php
session_start();


// $totalhargabarang = $_SESSION['hargabarang'];
// $jumlahbarang = $_SESSION['jumlah'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        button {
            padding: 9px 25px;
            background-color: rgba(0, 136, 169, 1);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
            position: relative;
        }
    </style>
    <script src="asset/jquery/jquery-3.3.1.min.js"></script>
    <script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
    <script src="asset/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="asset/js/app.js"></script>
</head>

<body class="bg-dark">
    <?php
    // $price = $_POST['price'];
    $harga = 12500;
    $biayacod = "Rp " . number_format(5000, 2, ',', '.');
    $format = "Rp " . number_format($harga, 2, ',', '.');
    // $nama = $_POST['namapemesan'];
    ?>
    <div class="container">
        <div class="row-about">
            <div class="col-about">
                <h1 class="font descriptionbayar">PEMBAYARAN</h1>
                <h1 class="font">VIA COD</h1>
                <hr class="biasa">
                <p class="font description">Lakukan pembayaran sesuai dengan nominal berikut</p>
                <!-- <p class="font">klik untuk mencopy nominal</p> -->
            </div>
        </div>

        <div class="row-about">
            <div class="col-about">
                <form method="POST" action="" id="form" class="form">
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">Nama Pemesan</label>
                            </div>
                            <input type="text" id="namapemesan" name="namapemesan" height="200px" class="form-control" placeholder="sofia" required="">
                        </div>
                    </div>
                    <!--  -->
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">E-mail</label>
                            </div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="sofia@gmail.com" required="">
                        </div>
                    </div>
                    <!--  -->
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">No.WhatsApp Anda</label>
                            </div>
                            <input type="text" id="whatsapp" name="whatsapp" class="form-control" placeholder="081xxxxxx" required="">
                        </div>
                    </div>
                    <!--  -->
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">Masukan Kota </label>
                            </div>
                            <!-- <option></option> -->
                            <select class="col-sm-8 form-control" id="kota_tujuan" name="kota_tujuan" required="">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">Alamat Lengkap Anda</label>
                            </div>
                            <textarea id="alamat" name="alamat" class="form-control" placeholder="Jl.Merdeka Raya xxxx" required=""></textarea>
                        </div>
                    </div>
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <label for="nama">Jumlah</label>
                            </div>
                            <input type="text" oninput="inputJumlah();hargaBarang()" id="jumlah" name="jumlah" class="form-control" placeholder="1" required="">
                        </div>
                    </div>
                    <!--  -->
                    <hr class="biasa">
                    <tr>
                        <h2 class="font">
                            <th width='20%' class="font">Rincian Biaya</th>
                            <th></th>
                        </h2>
                    </tr>
                    <hr class="biasa">
                    <table>
                        <div>
                            <tr>
                                <th width='20%' class="font">Harga Barang :</th>
                                <th width='10%' class="font"><?= $format ?></th>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <th width='20%' class="font">Jumlah Barang :</th>
                                <th width='10%' class="font" aria-placeholder="0">
                                    <p id="jmlh"></p>
                                </th>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <th width='20%' class="font">Sub total :</th>
                                <th width='10%' class="font" aria-placeholder="0">
                                    <p id="totalharga"></p>
                                </th>
                            </tr>
                        </div>
                        <div>
                            <tr>
                                <th width='20%' class="font">Biaya COD:</th>
                                <th width='10%' class="font"><?= $biayacod ?></th>
                            </tr>
                        </div>
                    </table>
                    <div id="tampil">
                    </div>
                    <hr class="biasa">
                    <div class="font form-group">
                        <div class="row">
                            <div class="col-about">
                                <a class="link" href="contoh.php"></a>
                                <button class="btnsubmit" id="nominal">Cek Total Bayar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        function inputJumlah() {
            var x = document.getElementById("jumlah").value;
            document.getElementById("jmlh").innerHTML = x + " pcs";
        }

        function hargaBarang() {
            var harga = 12500;
            var jumlah = parseInt(document.getElementById("jumlah").value);
            var hargatotal = harga * jumlah;
            var reverse = hargatotal.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            document.getElementById("totalharga").innerHTML = "Rp " + ribuan + ",00";
        }

        // function pemberitahuanResponse() {

        var nama = document.getElementById("namapemesan").value;
        var whatsapp = document.getElementById("whatsapp").value;
        var kota = document.getElementById("kota_tujuan").value;
        var alamat = document.getElementById("alamat").value;

        // document.getElementById("pemberitahuan").innerHTML = "Data invoice akan dikirimkan ke email anda, jika anda telah mengisi form dengan benar."
        // if (nama != "" && whatsapp != "" && kota != "" && alamat != "") {

        // } else {
        //     alert('Anda harus mengisi data dengan lengkap !');
        // }
        // }

        $('.btnsubmit').on('click', function() {
            var nama = document.getElementById("namapemesan").value;
            var whatsapp = document.getElementById("whatsapp").value;
            var kota = document.getElementById("kota_tujuan").value;
            var alamat = document.getElementById("alamat").value;
            if (nama != "" && whatsapp != "" && kota != "" && alamat != "") {
                $('.btnsubmit').removeClass("btnsubmit");
                $(this).addClass("btncheckout");
                $('.btncheckout').html("<a class='font' href='terimakasih.php'>Lanjutkan</a>");
                $('.form').removeAttr('id');
                $('.form').attr('id', 'formselesai');
            } else {
                alert('kosong');
            }
        });


        // } else {
        //     alert('Anda harus mengisi data dengan lengkap !');
        // }
    </script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {

            $('#tampil').load("insert.php");

            $("#nominal").submit(function() {
                var data = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: "insert.php",
                    data: data,

                    cache: false,
                    success: function(data) {
                        document.getElementById("tampil").innerHTML = data;;
                    }
                });
            });
        });
    </script> -->

</body>

</html>