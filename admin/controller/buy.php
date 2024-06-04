<?php

require '../../conn.php';
session_start();



// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'buy':
        if (isset($_SESSION['id'])) {
            $id_user = $_SESSION['id'];
        } else {
            exit("NOT-LOGIN");  
        }
        
        $id_produk = $_POST['id_produk'];
        $anggaran = $_POST['anggaran'];
        $deskripsi = $_POST['deskripsi'];
      
        $sql = "INSERT INTO `tb_order` (`id_order`, `id_user`, `id_produk`, `id_range`, `tanggal`, `deskripsi`) VALUES (NULL, '$id_user', '$id_produk', '$anggaran', NOW(), '$deskripsi')";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }

        break;

    case 'confirm':
        $id = $_POST['id'];

        $sql = "UPDATE `tb_reservasi` SET `status` = 'Selesai' WHERE `tb_reservasi`.`id_reservasi` = $id";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        

        break;


    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_users", "id_user");

        if (mysqli_query($conn, "DELETE FROM tb_users WHERE `tb_users`.`id_user` = $id")) {
            exit('sukses');
        } else {
            exit('gagal');
        }


        break;



        // echo "sukses";


}
