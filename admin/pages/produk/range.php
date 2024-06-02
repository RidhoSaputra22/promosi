<?php
require "../conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '$id'");
    $data = mysqli_fetch_assoc($req);

    $isProdukExist = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");

    if (mysqli_num_rows($isProdukExist) < 1) {
        echo '<script>window.location.replace("index.php?page=produk")</script>';
    }
} else {
    echo '<script>window.location.replace("index.php?page=produk")</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section id="detail-product">

        <div class="detail">


            <div class="text p-2">

                <div class="title">Range Harga </div>

                <div class="subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores nesciunt
                    blanditiis mollitia totam odio voluptates repellendus facere, maxime at fuga?
                </div>
            </div>
            <div class="actions">
                <button class="btn btn-outline-primary  py-2 px-3" data-bs-toggle="modal" data-bs-target="#tambah-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                    </svg> Tambah
                </button>
            </div>
            <div class="image-wraper ">

                <?php
                $q = "SELECT * FROM `tb_range` WHERE id_produk = $id ORDER BY range1 DESC ";
                $res = mysqli_query($conn, $q);
                $count = 1;
                while ($data = mysqli_fetch_assoc($res)) {
                ?>


                    <div class=" m-1 d-flex align-items-center w-100 ">
                        <input class="p-2 m-1 flex-grow-1 " type="text" value="<?= number_format($data['range1'])?> - <?= number_format($data['range2'])?>" readonly>
                         <!-- EDIT BTN -->
                         <button type="button" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit-modal" data-range1="<?= $data['range1'] ?>"
                            data-range2="<?= $data['range2'] ?>" data-id="<?= $data['id_range'] ?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil " viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg></i>EDIT
                        </button>
                        <!-- DELETE BTN -->
                        <button type="button" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal" data-id="<?= $data['id_range'] ?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></i>HAPUS
                        </button>

                    </div>

                <?php
                }
                ?>

            </div>


        </div>

    </section>




</body>

</html>


<!-- Tambah Range-->
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">modal
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Range</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" value="<?= $id ?>" id="tid" hidden>

                <div class="row">
                    <div class="col">
                        <label for="">From</label>
                        <input type="number" class="form-control"  value="" id="tfrom">
                    </div>
                    <div class="col">
                        <label for="" class="mt-">to</label>
                        <input type="number" class="form-control" value="" id="tto">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="tambah()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Range -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Range</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" id="uid" value="" hidden>
                <div class="row">
                    <div class="col">
                        <label for="">From</label>
                        <input type="number" class="form-control" value="" id="ufrom">
                    </div>
                    <div class="col">
                        <label for="" class="mt-">to</label>
                        <input type="number" class="form-control"  value="" id="uto">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="edit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Hapus Range -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Range</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
                <input type="number" id="did" value="" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="hapus()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script src="pages/produk/range.js"></script>