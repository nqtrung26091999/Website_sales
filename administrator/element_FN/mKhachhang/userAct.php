<?php

session_start();
require '../../element_FN/mod/khachhangCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
////            xử lí thêm
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $user = new khachhang();
            $rs = $user->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
            if ($rs) {
                if ($_SESSION['USER'] || $_SESSION['ADMIN']) {
                    header('location:../../../index.php');
                } else {
                    header('location:../../index.php?req=userView&result=ok');
                }
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'deleteuser':
            $iduser = $_GET['iduser'];
            $user = new khachhang();
            $rs = $user->UserDelete($iduser);
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'setlock':
            $iduser = $_GET['iduser'];
            $ability = $_GET['ability'];
            $objuser = new khachhang();
            if ($ability == 0) {
                $rs = $objuser->UserSetActive($iduser, 1);
            }
            if ($ability == 1) {

                $rs = $objuser->UserSetActive($iduser, 0);
            }
            if ($rs) {
                header('location:../../index.php?req=userView&result=ok');
            } else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'updateuser':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $iduser = $_POST['iduser'];

            $user = new khachhang();
            $rs = $user->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);
            if ($rs) {
                header('location:../../../index.php?rg=ok');
            } else {
                header('location:../../../index.php?rg=notok');
            }
            break;

        case 'checkLogin':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new khachhang();

            $rs = $user->UserCheckLogin($username, $password);
            if ($rs) {
                if ($username == "admin") {
                    $_SESSION['ADMIN'] = $username;
                } else {
                    $_SESSION['USER'] = $username;
                }
                if (isset($_SESSION['USER']) || isset($_SESSION['ADMIN'])) {
                    header('location:../../../index.php');
                }
            } else {
                header('location:../../userLogin.php');
            }
            break;

        case 'userlogout':
            $timelogin = date('h:i - d/m/Y');
            if (isset($_SESSION['USER'])) {
                $namelogin = $_SESSION['USER'];
            }
            if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
            }
            setcookie($namelogin, $timelogin, time() + (86400 * 30), "/");
            session_destroy();
            header('location:../../index.php?');
            break;
        case 'changepass':
            $username = $_POST['username'];
            $passwordold = $_POST['passwordold'];
            $passwordnew = $_POST['passwordnew'];

            echo $username . $passwordold . $passwordnew;
            $password = $passwordnew;
            $objuser = new khachhang();
            $getiduser = $objuser->UserGetbyUserName($username);
            $iduser = $getiduser->IDUSER;
            echo $iduser;
            if ($passwordold == $getiduser->PASSWORD) {
                $rs = $objuser->UserSetPassword($iduser, $password);
                if ($rs) {
                    header('location:../../../changepasssuccess.php?result=ok');
                } else {
                    header('location:../../../status.php?result=notok');
                }
            } else {
                header('location:../../../changepassfail.php?result=changefail');
            }
        default :
//            header('location:../../index.php?req=userView');
            break;
    }
} else {
//    header('location:../../index.php');
}
      