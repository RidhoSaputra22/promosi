<?php

require '../../conn.php';

$location = "../../assets/img/produk/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':

        $id = $_POST['id'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        $sql = "INSERT INTO `tb_range` (`id_range`, `id_produk`, `range1`, `range2`) VALUES (NULL, '$id', $from, $to)";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        
        $id = $_POST['id'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        $sql = "UPDATE `tb_range` SET `range1` = '$from', `range2` = '$to' WHERE `tb_range`.`id_range` = $id";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }

        break;
    case 'hapus':
        $id = $_POST['id'];
        
        if(mysqli_query($conn,"DELETE FROM tb_range WHERE `tb_range`.`id_range` = $id")){
            exit('sukses');
        }else{
            exit('gagal');
        }


        break;



        // echo "sukses";


}