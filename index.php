<?php
session_start();
require "conn.php";

if(isset($_SESSION['id'])){
    $id_user = $_SESSION['id'];
    $nama = $_SESSION['user'];
    $isLogin = TRUE;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai KopiKu | Home</title>
</head>

<body>

<?php
    include("layout/navbar.php");

    ?>
<section id="banner">
        <div class="shape"></div>
        <div class="text">
            <div class="title">
                SELAMAT DATANG DI KEDAI <u>Kopi<i>Ku</i></u>
            </div>
            <div class="subtitle">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat id eum voluptate esse quod, officia
                consequatur aut fugit tenetur eaque.
            </div>
        </div>
    </section>

    <section id="about-us">

        <img src="assets/coffe.jpg" alt="" width="650px">

        <div class="text">
            <div class="title">
                SELAMAT DATANG DI KEDAI <u>Kopi<i>Ku</i></u>
            </div>
            <div class="subtitle">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat id eum voluptate esse quod, officia
                consequatur aut fugit tenetur eaque.
            </div>
        </div>

    </section>
    <section id="layanan">
        <div class="title">Produk Kami</div>

        <div class="main">
            <?php
            $q = "SELECT * FROM tb_produk";
            $res = mysqli_query($conn, $q);
            $count = 1;
            while($data = mysqli_fetch_assoc($res)){
                $id = $data['id_produk'];
            ?>

            <a href="detail.php?id=<?= $id?>" class="card">
                <img src="assets/img/produk/<?= $data['foto']?>" alt="">
            </a>

            <?php
             }
            ?>
        </div>
    </section>

    <?php
    include("layout/footer.php");
    ?>


</body>

</html>