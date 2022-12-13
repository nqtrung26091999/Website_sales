<?php

session_start();
require '../../element_FN/mod/nhacungcapCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
////            xử lí thêm
            $tennhacungcap = $_POST['tennhacungcap'];
            $lienhe = $_POST['lienhe'];
            $soluong = $_POST['soluong'];
            $ngaycungcap = $_POST['ngaycungcap'];
            $nhacungcap = new nhacungcap();
            $rs = $nhacungcap->NhaCungCapAdd($tennhacungcap, $lienhe, $soluong, $ngaycungcap);
            if ($rs) {
                header('location:../../index.php?req=nhacungcapView&result=ok');
            } else {
                header('location:../../index.php?req=nhacungcapView&result=notok');
            }
            break;

        case 'delete':
            $idnhacungcap = $_GET['idnhacungcap'];
            $nhacungcap = new nhacungcap();
            $rs = $nhacungcap->NhaCungCapDelete($idnhacungcap);
            if ($rs) {
                header('location:../../index.php?req=nhacungcapView&result=ok');
            } else {
                header('location:../../index.php?req=nhacungcapView&result=notok');
            }
            break;

        case 'update':
            $tennhacungcap = $_POST['tennhacungcap'];
            $lienhe = $_POST['lienhe'];
            $soluong = $_POST['soluong'];
            $ngaycungcap = $_POST['ngaycungcap'];
            $idnhacungcap = $_POST['idnhacungcap'];

            $nhacungcap = new nhacungcap();
            $rs = $nhacungcap->NhaCungCapUpdate($tennhacungcap, $lienhe, $soluong, $ngaycungcap, $idnhacungcap);
            if ($rs) {
                header('location:../../index.php?req=nhacungcapView&result=ok');
            } else {
                header('location:../../index.php?req=nhacungcapView&result=notok');
            }
            break;
    }
} else {
    header('location:../../index.php');
}
      