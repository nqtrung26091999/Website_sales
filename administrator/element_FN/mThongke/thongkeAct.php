<?php

require '../../element_FN/mod/thongkeCls.php';
$reqtk = $_GET['reqtk'];

if (isset($reqtk)) {
    switch ($reqtk) {
        case 'add':
            $soluongdonhang = $_POST['soluongdonhang'];
            $soluonghanghoa = $_POST['soluonghanghoa'];
            $tongdoanhthu = $_POST['tongdoanhthu'];

            $thongke = new thongke();
            $rs = $thongke->ThongKeAdd($soluongdonhang, $soluonghanghoa, $tongdoanhthu);
            if ($rs) {
                header('location:../../index.php?req=thongkedonhangView&result=ok');
            } else {
                header('location:../../index.php?req=thongkedonhangView&result=notok');
            }
            break;
        case 'delete';
            $idthongke = $_GET['idthongke'];

            $thongke = new thongke();
            $rs = $thongke->ThongKeDelete($idthongke);
            if ($rs) {
                header('location:../../index.php?req=thongkedonhangView&result=ok');
            } else {
                header('location:../../index.php?req=thongkedonhangView&result=notok');
            }
            break;
        default:
            break;
    }
} else {
    
}
