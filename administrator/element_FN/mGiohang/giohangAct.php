<?php

require '../../element_FN/mod/giohangCls.php';

$reqcart = $_GET['reqcart'];
if (isset($reqcart)) {
    switch ($reqcart) {
        case 'addcart':
            $idhanghoa = $_GET['idhanghoa'];
            $cart = new giohang();
            $rs = $cart->GioHangAdd($idhanghoa);
            if ($rs) {
                header('location:../../../index.php?cart=ok');
            } else {
                header('location:../../../index.php?cart=notok');
            }
            break;
        case 'delete':
            $idgiohang = $_GET['idgiohang'];
            $cart = new giohang();
            $rs = $cart->GioHangDelete($idgiohang);
            if ($rs) {
                header('location:../../../index.php?cart=ok');
            } else {
                header('location:../../../index.php?cart=notok');
            }
            break;
        case 'deleteall':
            $idgiohang = $_GET['idgiohang'];
            $cart = new giohang();
            $rs = $cart->GioHangDeleteAll($idgiohang);
            if ($rs) {
                header('location:../../../index.php?cart=ok');
            } else {
                header('location:../../../index.php?cart=notok');
            }
            break;
    }
} else {
    header('location:../../../index.php');
}
?>