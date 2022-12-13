<?php

require '../../element_FN/mod/hanghoaCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            //xử lí thêm
            $idnhacungcap = $_POST['idnhacungcap'];
            $idnhasanxuat = $_POST['idnhasanxuat'];
            $tenhanghoa = $_POST['tenhanghoa'];
            $mota = $_POST['mota'];
            $giathamkhao = $_POST['giathamkhao'];
            $tenhinhanh = $_POST['tenhinhanh'];
            $idloaihang = $_POST['idloaihang'];
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaAdd($idnhacungcap, $idnhasanxuat, $idloaihang, $tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh);
            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
        case 'deletehanghoa':
            $idhanghoa = $_GET['idhanghoa'];
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaDelete($idhanghoa);
            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
       case 'updatehanghoa' :
            $idhanghoa = $_POST['idhanghoa'];
            $tenhanghoa = $_POST['tenhanghoa'];
            $mota = $_POST['mota'];
            $giathamkhao = $_POST['giathamkhao'];
            $idloaihang = $_POST['idloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];

            //kiểm tra có đổi hình ảnh hay không?
            if (getimagesize($_FILES['fileimage']['tmp_name']) == false) {
                
            } else {
                $hinhanh = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            }
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa);
            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
    }
} else {
    header('location:../../index.php?req=hanghoaView');
}
