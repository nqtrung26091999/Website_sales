<?php

require '../mod/hoadonCls.php';
require '../mod/hanghoaCls.php';

$request = $_GET['request'];

if (isset($request)) {
    switch ($request) {
        case 'addorder':
            $iduser = $_POST['iduser'];
            $idnhanvien = $_POST['idnhanvien'];
            $idhanghoa = rtrim($_POST['idhanghoa'], "&");
            $tenhanghoa = rtrim($_POST['tenhanghoa'], "+");
            $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
            $soluonghanghoa = $_POST['soluonghanghoa'];
            $giahoadon = $_POST['giahoadon'] * $soluonghanghoa;
            $diachigiaohang = $_POST['diachigiaohang'];
            $ghichu = $_POST['ghichu'];
            $ngaylaphoadon = $_POST['ngaylapdhoadon'];

            $hoadon = new hoadon();
            $rs = $hoadon->HoadonAdd($iduser, $idnhanvien, $idhanghoa, $tenhanghoa, $phuongthucthanhtoan, $giahoadon, $ghichu, $soluonghanghoa, $ngaylaphoadon);
            if (rs) {
                header('location:../../../afterpayment.php');
            }
            break;
        case 'delete':
            $idhoadon = $_GET['idhoadon'];
            $hoadon = new hoadon();
            $rs = $hoadon->HoadonDelete($idhoadon);

            if ($rs) {
                header('location:../../index.php?req=hoadonView&result=ok');
            } else {
                header('location:../../index.php?req=hoadonView&result=notok');
            }
            break;
        case 'setlock':
            $idhoadon = $_GET['idhoadon'];
            $ability = $_GET['ability'];
            $hoadon = new hoadon();
            if ($ability == 0) {
                $rs = $hoadon->HoadonSetActive($idhoadon, 1);
            }
            if ($ability == 1) {
                $rs = $hoadon->HoadonSetActive($idhoadon, 0);
            }
            if ($rs) {
                header('location:../../index.php?req=hoadonView&result=ok');
            } else {
                header('location:../../index.php?req=hoadonView&result=notok');
            }
            break;
        default:
            break;
    }
} else {
    
}
?>