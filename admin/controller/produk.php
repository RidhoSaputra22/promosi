<?php

require '../../conn.php';

$location = "../../assets/img/produk/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':

        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];

        $sql = "INSERT INTO `tb_produk` (`id_produk`, `nama`, `deskripsi`) VALUES (NULL, '$nama', '$deskripsi');";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];

        $id = $_POST['id'];

        $sql = "UPDATE tb_produk set nama = '$nama', deskripsi = '$deskripsi' where id_produk ='$id'";
        if (mysqli_query($conn, $sql)) {
            exit('sukses');
        }
        break;
    case 'hapus':
        $id = $_POST['id'];

        // hapusFoto($location, $id, "tb_produk", "id_produk");

        $imgs = mysqli_query($conn, "SELECT * FROM `tb_galeri` WHERE id_produk = $id;");

        if(mysqli_num_rows($imgs)){
            while($img = mysqli_fetch_assoc($imgs)){
                unlink($location.$img['foto']);
            }

        }


        
        if(mysqli_query($conn,"DELETE FROM tb_produk WHERE `tb_produk`.`id_produk` = $id")){
            exit('sukses');
        }else{
            exit('gagal');
        }


        break;



        // echo "sukses";


}
