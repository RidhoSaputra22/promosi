<?php

require '../../conn.php';
session_start();



// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'reservasi':
        if (isset($_SESSION['id'])) {
            $id_user = $_SESSION['id'];
        } else {
            exit("NOT-LOGIN");
        }
        
        $id_produk = $_POST['id_produk'];
        $nama = $_POST['nama'];
        $hp = $_POST['hp'];
        $jumlah = $_POST['jumlah'];
        
        $harga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM tb_produk WHERE id_produk = '$id_produk'"))['harga'];

        $total_harga = $harga * $jumlah;


        $sql = "INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_produk`, `total_harga`,  `jumlah`,  `tanggal`) VALUES (NULL, '$id_user', '$id_produk', '$total_harga', '$jumlah', NOW())";

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
