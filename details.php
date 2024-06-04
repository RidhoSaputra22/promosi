<?php
session_start();
require "conn.php";


if (isset($_GET['id']) && $_GET['id'] != '') {
  $id_produk = $_GET['id'];
} else {
  header("Location: index.php");
}

$data_produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id_produk"));
$data_galeri = mysqli_query($conn, "SELECT foto FROM tb_galeri WHERE id_produk = $id_produk");
$foto = mysqli_fetch_assoc($data_galeri)['foto']

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Produk</title>
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="frontend/libraries/xzoom/xzoom.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="frontend/styles/main.css" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/DataTables/datatables.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/DataTables/datatables.js"></script>

    <!-- JQUERY -->
    <script src="assets/jquery/dist/jquery.min.js"></script>

    <!-- SWEETALERT -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <?php
    include('layouts/navbar.php')
    ?>
    </div>

    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1><?= $data_produk['nama'] ?></h1>
                            <p><?= $data_produk['deskripsi'] ?></p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="assets/img/produk/<?= $foto ?>" class="xzoom" id="xzoom-default"
                                        xoriginal="assets/img/produk/<?= $foto ?>" style="height: 500px;" />
                                </div>
                                <div class="xzoom-thumbs">
                                    <?php

                  while ($data = mysqli_fetch_assoc($data_galeri)) {

                  ?>

                                    <a href="assets/img/produk/<?= $data['foto'] ?>">
                                        <img src="assets/img/produk/<?= $data['foto'] ?>" class="xzoom-gallery"
                                            width="128" xpreview="assets/img/produk/<?= $data['foto'] ?>"
                                            style="height: 150px;" />
                                    </a>
                                    <?php
                  }
                  ?>
                                </div>
                            </div>
                            <h2>About Tourism</h2>
                            <p>
                                Nusa Penida is an island southeast of Indonesia’s island Bali
                                and a district of Klungkung Regency that includes the
                                neighbouring small island of Nusa Lembongan. The Badung Strait
                                separates the island and Bali. The interior of Nusa Penida is
                                hilly with a maximum altitude of 524 metres. It is drier than
                                the nearby island of Bali.
                            </p>
                            <p>
                                Bali and a district of Klungkung Regency that includes the
                                neighbouring small island of Nusa Lembongan. The Badung Strait
                                separates the island and Bali.
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="frontend/images/ic_event.png" alt="" class="features-image" />
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>Tari Kec</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="frontend/images/ic_language.png" alt="" class="features-image" />
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>Bahasa Indonesia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                        <img src="frontend/images/ic_foods.png" alt="" class="features-image" />
                                        <div class="description">
                                            <h3>Foods</h3>
                                            <p>Local Foods</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Anggaran</h2>

                            <hr />
                            <form action="">
                                <label for="inputVisa" class="sr-only">Visa</label>
                                <select id="anggaran" class="custom-select mb-2 mr-sm-2">
                                    <?php
                  $q = "SELECT * FROM tb_range WHERE id_produk = $id_produk";
                  $res = mysqli_query($conn, $q);
                  while ($data = mysqli_fetch_assoc($res)) {

                  ?>
                                    <option value="<?= $data['id_range'] ?>"><?= number_format($data['range1']) ?> -
                                        <?= number_format($data['range2']) ?></option>

                                    <?php

                  } ?>
                                </select>
                            </form>
                        </div>
                        <div class="join-container">
                            <button class="btn btn-block btn-join-now mt-3 py-2" onclick="showModal()">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>FEATURES</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Social Media Kit</a></li>
                                <li><a href="#">Affiliate</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>ACCOUNT</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Refund</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Rewards</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>COMPANY</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Carer</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Media</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>GET CONNECTED</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Makassar</a></li>
                                <li><a href="#">Indonesia</a></li>
                                <li><a href="#">0812-4263-4183</a></li>
                                <li><a href="#">support@odhii9671.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-content-center pt-4">
                <div class="col-auto-text-gray-500 font-weight-light">
                    2021 Copyright Nodsill • All rights reserved • Made in Makassar
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="number" id="id_produk" value="<?= $id_produk?>" hidden>
                    <input type="text" id="hp_produk" value="<?= $data_produk['hp']?>" hidden>

                    <label for="">Deskripsi Proyek</label>
                    <textarea name="" id="deskripsi" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" onclick="buy()">Kirim</button>
                </div>
            </div>
        </div>
    </div>

    <script src="buy.js"></script>
    <script src="frontend/libraries/jquery/jquery.js.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="frontend/libraries/xzoom/xzoom.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 500,
            title: false,
            tint: "#333",
            Xoffset: 15,
        });
    });

    function showModal() {
        $("#staticBackdrop").modal("show");
    }
    </script>
</body>

</html>