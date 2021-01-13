<!DOCTYPE html>
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
</head>

<body class="bg-dark">

    <div class="container mt-3 justify-content-center ">
        <div class="d-flex flex-column mb-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <form class="container mt-5 " id="invoice" method="POST">
                <h2 class="font">Form Pemesanan</h2>
                <hr class="biasa">
                <p class="font">Silahkan isi data pemesananan produk anda</p>
                <div class="font form-group">
                    <div class="col-sm-9">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="sofia">
                    </div>
                </div>
                <div class="font form-group">
                    <div class="col-sm-9">
                        <label for="whatsapp">No. Whatsapp</label>
                        <input type="text" id="whatsapp" class="col-sm-8 form-control" placeholder="081234xxxxxx">
                    </div>
                </div>
                <div class="font form-group">
                    <div class="col-sm-9">
                        <label for="nama">Alamat</label>
                        <input type="text" id="alamat" class="form-control" placeholder="Jl.bunga">
                    </div>
                </div>
                <div class="font form-group">
                    <div class="col-sm-9">
                        <label for="item">Jumlah</label>
                        <input type="number" id="jumlah" class="col-sm-2 form-control" placeholder="10">
                    </div>
                </div> -->
                    <!-- form cek ongkir -->
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
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="sofia" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">Atas Nama Pemilik Rekening</label>
                                <input type="text" id="pemilik-rekening" name="pemilikrekening" class="form-control" placeholder="Pemilik Rekening" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="nama">Nomor Rekening</label>
                                <input type="text" id="nomor-rekening" name="nomorrekening" class="form-control" placeholder="nomor rekening yang digunakan" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <label class="control-label col-sm-8">Via BANK</label>
                            <div class="col-sm-9">
                                <select class="col-sm-8 form-control" id="bank" name="bank" required="" placeholder="Bank yang digunakan untuk transfer">
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                        </div>
                        <!-- form baru -->
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
                            <div class="col-sm-9">
                                <label for="nama">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Jl.bunga" required="">
                            </div>
                        </div>
                        <div class="font form-group">
                            <div class="col-sm-9">
                                <label for="item">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="col-sm-2 form-control" placeholder="0" required="">
                            </div>
                        </div> -->
                        <div class="font form-group">
                            <label class="control-label col-sm-8">Kota Tujuan</label>
                            <div class="col-sm-9">
                                <select class="col-sm-8 form-control" id="kota_tujuan" name="kota_tujuan" required="">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="font form-group">
                            <label class="control-label col-sm-8">Kurir</label>
                            <div class="col-sm-9">
                                <select class="col-sm-8 form-control" id="kurir" name="kurir" required="">
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="font form-group">
                    <label class="control-label col-sm-8">Berat (Kg)</label>
                    <div class="col-sm-9">
                        <input type="text" class="col-sm-8 form-control" id="berat" readonly value="tidak peru diisi"name="berat">
                    </div>
                </div> -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="submit" name="submit" class="btn btn-default" onclick='pemberitahuanResponse()'>Submit</button>
                                <h4 class="font" id="pemberitahuan"></h4>

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

    <!-- <button class="btn btn-primary btn-lg" id="contohBtn">Contoh</button>
    <input type="hidden" id="contoh" value="halohalo"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- <script src="asset/js/app.js"></script> -->
    <!-- <script src="asset/jquery/jquery-3.3.1.min.js"></script> -->
    <script>
        function myFunction(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }

        function pemberitahuanResponse() {
            var nama = document.getElementById("nama").value;
            var pemilikrekening = document.getElementById("pemilik-rekening").value;
            var norekening = document.getElementById("nomor-rekening").value;
            var namabank = document.getElementById("bank").value;
            var email = document.getElementById("email").value;
            var nowhatsapp = document.getElementById("whatsapp").value;
            var alamat = document.getElementById("alamat").value;
            var jumlah = document.getElementById("jumlah").value;
            var kotatujuan = document.getElementById("kota_tujuan").value;
            var kurir = document.getElementById("kurir").value;

            // document.getElementById("pemberitahuan").innerHTML = "Data invoice akan dikirimkan ke email anda, jika anda telah mengisi form dengan benar."
            if (nama != "" && pemilikrekening != "" && norekening != "" && namabank != "" && email != "" && nowhatsapp != "" && alamat != "" && jumlah != "" && kota_tujuan != "" && kurir != "") {
                document.getElementById("pemberitahuan").innerHTML = "Data invoice akan tampil dibawah ini, serta dikirimkan ke email anda.";
            } else {
                alert('Anda harus mengisi data dengan lengkap !');
            }
        }
        // karena tidak satu file
        // $(document).ready(function() {
        // $('#contohBtn').click(function() {
        //     // var copyText = document.getElementById("contoh").value;
        //     // # -> untuk id
        //     // . -> untuk class
        //     // console.log("masuk");
        //     var copyText = $("#contoh").val();
        //     // copyText.select();
        //     // copyText.setSelectionRange(0, 99999)
        //     // document.execCommand("copy");
        //     alert("Copied the text: " + copyText);

        // });
        // });
    </script>

</body>

</html>