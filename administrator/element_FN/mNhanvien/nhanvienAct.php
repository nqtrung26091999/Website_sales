<?php

session_start();
require '../../element_FN/mod/nhanvienCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
////            xử lí thêm
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $loainhanvien = $_POST['loainhanvien'];
            $nhanvien = new nhanvien();
            $rs = $nhanvien->NhanVienAdd($hoten, $ngaysinh, $gioitinh, $loainhanvien);
            if ($rs) {
                header('location:../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location:../../index.php?req=nhanvienView&result=notok');
            }
            break;

        case 'delete':
            $idnhanvien = $_GET['idnhanvien'];
            $nhanvien = new nhanvien();
            $rs = $nhanvien->NhanVienDelete($idnhanvien);
            if ($rs) {
                header('location:../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location:../../index.php?req=nhanvienView&result=notok');
            }
            break;

        case 'update':
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $loainhanvien = $_POST['loainhanvien'];
            $idnhanvien = $_POST['idnhanvien'];

            $nhanvien = new nhanvien();
            $rs = $nhanvien->NhanVienUpdate($hoten, $ngaysinh, $gioitinh, $loainhanvien, $idnhanvien);
            if ($rs) {
                header('location:../../index.php?req=nhanvienView&result=ok');
            } else {
                header('location:../../index.php?req=nhanvienView&result=notok');
            }
            break;
    }
} else {
    header('location:../../index.php');
}
      