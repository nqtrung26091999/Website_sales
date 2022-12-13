<?php

session_start();
require '../../element_FN/mod/nhasanxuatCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
////            xử lí thêm
            $tennhasanxuat = $_POST['tennhasanxuat'];
            $lienhe = $_POST['lienhe'];
            $ngaysanxuat = $_POST['ngaysanxuat'];
            $loaihang = $_POST['loaihang'];
            $nhasanxuat = new nhasanxuat();
            $rs = $nhasanxuat->NhaSanXuatAdd($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang);
            if ($rs) {
                header('location:../../index.php?req=nhasanxuatView&result=ok');
            } else {
                header('location:../../index.php?req=nhasanxuatView&result=notok');
            }
            break;

        case 'delete':
            $idnhasanxuat = $_GET['idnhasanxuat'];
             $nhasanxuat = new nhasanxuat();
            $rs = $nhasanxuat->NhaSanXuatDelete($idnhasanxuat);
            if ($rs) {
                header('location:../../index.php?req=nhasanxuatView&result=ok');
            } else {
                header('location:../../index.php?req=nhasanxuatView&result=notok');
            }
            break;

        case 'update':
            $tennhasanxuat = $_POST['tennhasanxuat'];
            $lienhe = $_POST['lienhe'];
            $ngaysanxuat = $_POST['ngaysanxuat'];
            $loaihang = $_POST['loaihang'];
            $idnhasanxuat = $_POST['idnhasanxuat'];

            $nhasanxuat = new nhasanxuat();
            $rs = $nhasanxuat->NhaSanXuatUpdate($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang, $idnhasanxuat);
            if ($rs) {
                header('location:../../index.php?req=nhasanxuatView&result=ok');
            } else {
                header('location:../../index.php?req=nhasanxuatView&result=notok');
            }
            break;
    }
} else {
    header('location:../../index.php');
}
      
