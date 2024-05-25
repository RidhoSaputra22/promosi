<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

<?php 
    include 'layout/link.php';

    require '../conn.php'
?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'layout/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'layout/navbar.php'; ?>

            <section class="contents">
        <?php
            // require_once "layouts/sidebar.php"
        ?>
        <div>
            <?php
        // require_once "layouts/navbar.php";

        if(isset($_GET['page'])){
            $page = $_GET['page'];

            switch($page){
                case 'user':
                    include "pages/user.php";
                break;
                case 'produk':
                    include "pages/produk.php";
                break;
                case 'galeri':
                    include "pages/galeri.php";
                break;
                case 'list_order':
                    include "pages/list_order.php";
                break;
            }

        }else{
            include "pages/user.php";
        }
        ?>
        </div>
    </section>

            </div>
            <!-- End of Main Content -->

            <?php include'layout/footer.php' ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php include 'layout/js.php' ?>
</body>

</html>