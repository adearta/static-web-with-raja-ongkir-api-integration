<?php
session_start();
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

    <div class="container mt-3 justify-content-center ">
        <div class="d-flex flex-column mb-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form class="container mt-5" id="ongkir" method="POST">
                        <h2 class="font">Form Pemesanan</h2>
                        <hr class="biasa">
                        <p class="font">Silahkan isi data pemesananan produk anda</p>
                        <!-- <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="sofia" required="">
                            </div>
                        </div> -->
                        <!-- form baru -->
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">Nama Pemesan</label>
                                <input type="text" id="namapemesan" name="namapemesan" class="form-control" placeholder="sofia" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">E-mail</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="sofia@gmail.com" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="whatsapp">No. Whatsapp</label>
                                <input type="text" id="whatsapp" name="whatsapp" class="col-sm-8 form-control" placeholder="081234xxxxxx" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <label class="control-label col-sm-8">Masukan Kota</label>
                            <div class="col-sm-9">
                                <select class="col-sm-8 form-control" id="kota_tujuan" name="kota_tujuan" required="">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">Alamat Lengkap Anda</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Jl.bunga" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="item">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="col-sm-2 form-control" placeholder="0" required="">
                            </div>
                        </div>
                        <!-- <div class="font form-group">
                    <label class="control-label col-sm-8">Berat (Kg)</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-sm-8 form-control" id="berat" readonly value="tidak peru diisi"name="berat">
                    </div>
                </div> -->
                        <!-- <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="submit" name="submit" class="btn btn-default" onclick='pemberitahuanResponse()'>Submit</button>
                                <h4 class="font" id="pemberitahuan"></h4>

                            </div>
                        </div> -->
                        <hr class="biasa">
                        <tr>
                            <h2 class="font">
                                <th width='20%' class="font">Qty</th>
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
                    <div class="col-md-7" id="response_ongkir">

                    </div>
                </div>
            </div>
            <!-- buton submit data -->
            <!-- <div class="form-group">
                <div class="col-md-7">
                    <a class="cta" href="checkout.php"><button>Purchase</button></a>
                </div>
            </div> -->
            <!-- <div class="ml-3 col-sm-9">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form> -->

        </div>
    </div>
    <script>
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
                $('.btncheckout').html("<a class='font' href='terimakasih.php'>Bayar</a>");
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