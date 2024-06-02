<?php
session_start();
require "conn.php";

// if(isset($_SESSION['id'])){
//     $id_user = $_SESSION['id'];
//     $nama = $_SESSION['user'];
//     $isLogin = TRUE;

// }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="frontend/libraries/bootstrap/css/bootstrap.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="frontend/styles/main.css" />
  </head>
  <body>
    <!-- Navbar -->
    <div class="container">
      <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="#" class="navbar-brand">
          <img src="frontend/images/logoo.jpg" alt="Logo NODSILL" />
        </a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navb"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
          <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item mx-md-2">
              <a href="#" class="nav-link active">Home</a>
            </li>
            <li class="nav-item mx-md-2">
              <a href="#" class="nav-link">Produk</a>
            </li>
            <li class="nav-item mx-md-2">
              <a href="#" class="nav-link">Profil</a>
            </li>
          </ul>

          <!-- Mobile Button -->
          <form action="login.php" class="form-inline d-sm-block d-md-none">
            <button class="btn btn-login my-2 my-sm-0 px-4">Login</button>
          </form>

          <!-- Desktop Button -->
          <form action="login.php"  class="form-inline my-2 my-lg-0 d-none d-md-block">
            <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
              Login
            </button>
          </form>
        </div>
      </nav>
    </div>

    <!-- Header -->
    <header class="text-center">
      <h1>
        Explore The Beautiful World
        <br />
        As Easy One Click
      </h1>
      <p class="mt-3">
        You will see beautiful
        <br />
        moment you never see before
      </p>
      <a href="#" class="btn btn-get-started px-4 mt-4"> Get Started </a>
    </header>

    <main>
      <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
          <div class="col-3 col-md-2 stats-detail">
            <h2>20K</h2>
            <p>Members</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>12K</h2>
            <p>City</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>Organizing</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>72</h2>
            <p>Partners</p>
          </div>
        </section>
      </div>

      <section class="section-popular" id="popular">
        <div class="container">
          <div class="row">
            <div class="col text-center section-popular-heading">
              <h2>Produk</h2>
              <p>
                Something that you never try
                <br />
                before in this developer
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="section-popular-content" id="popularContent">
    <div class="container">
        <div class="section-popular-travel row justify-content-center">

        <?php
        $q = "SELECT * FROM view_produk";
        $res = mysqli_query($conn, $q);
        while($data = mysqli_fetch_assoc($res)){
            // Ambil hanya satu gambar untuk setiap produk
            $q_single_image = "SELECT foto FROM view_produk WHERE id_produk = " . $data['id_produk'] . " LIMIT 1";
            $res_single_image = mysqli_query($conn, $q_single_image);
            $single_image = mysqli_fetch_assoc($res_single_image);
        ?>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div
            class="card-travel text-center d-flex flex-column"
            style="background-image: url('assets/img/produk/<?= $single_image['foto'] ?>')"
            >
            <div class="travel-country">INDONESIA</div>
            <div class="travel-location-toraja">
                TANA TORAJA, SOUTH SULAWESI
            </div>
            <div class="travel-button mt-auto">
                <a href="details.html" class="btn btn-travel-details px-4">
                View Details
                </a>
            </div>
            </div>
        </div>

        <?php
        }
        ?>

        </div>
    </div>
</section>


      <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>They Are Loving Us</h2>
              <p>
                Moments were giving them
                <br />
                the best experience
              </p>
            </div>
          </div>
        </div>
      </section>

      <section
        class="section section-testimonial-content"
        id="testimonialContent"
      >
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img
                    src="frontend/images/Mask Group 3.png"
                    alt="user"
                    class="mb-4 rounded-circle"
                  />
                  <h3 class="mb-4">Jelini</h3>
                  <p class="testimonial">
                    “ The trip was amazing and I saw something beautiful in that
                    Island that makes me want to learn more “
                  </p>
                </div>
                <hr />
                <p class="trip-to mt-2">Trip To Nusa Penida</p>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img
                    src="frontend/images/testimonial2.png"
                    alt="user"
                    class="mb-4 rounded-circle"
                  />
                  <h3 class="mb-4">Odi</h3>
                  <p class="testimonial">
                    “ It was glorious and I could not stop to say wohooo for
                    every single moment Dankeeeeee “
                  </p>
                </div>
                <hr />
                <p class="trip-to mt-2">Trip To Lolai</p>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img
                    src="frontend/images/avatar-1.png"
                    alt="user"
                    class="mb-4 rounded-circle"
                  />
                  <h3 class="mb-4">Julian</h3>
                  <p class="testimonial">
                    “ I loved it when the waves was shaking harder — I was
                    scared too “
                  </p>
                </div>
                <hr />
                <p class="trip-to mt-2">Trip To Karimun Jawa</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                I Need Help
              </a>
              <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">
                Get Started
              </a>
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
        <div
          class="row border-top justify-content-center align-content-center pt-4"
        >
          <div class="col-auto-text-gray-500 font-weight-light">
            2024 Copyright Trikamedia • All rights reserved • Made in Makassar
          </div>
        </div>
      </div>
    </footer>

    <script src="frontend/libraries/jquery/jquery.js.js"></script>
    <script src="frontend/libraries/bootstrap/js/bootstrap.js"></script>
  </body>
</html>
