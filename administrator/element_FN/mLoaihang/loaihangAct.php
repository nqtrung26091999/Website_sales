<?php

require '../../element_FN/mod/loaihangCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            //xử lí thêm
            $tenloaihang = $_POST['tenloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            $loaihang = new loaihang();
            $rs = $loaihang->LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=loaihangView');
            break;

        case 'deleteloaihang':
            $idloaihang = $_GET['idloaihang'];
            $loaihang = new loaihang();
            $rs = $loaihang->LoaihangDelete($idloaihang);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;

        case 'updateloaihang':
            $idloaihang = $_POST['idloaihang'];
            $tenloaihang = $_POST['tenloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];
//            kiểm tra có đổi hình ảnh không
            if (getimagesize($_FILES['fileimage']['tmp_name']) == false) {
                $hinhanh = $_POST['hinhanh'];
            } else {
                $hinhanh = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            }

            $loaihang = new loaihang();
            $rs = $loaihang->LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
        case 'updatehanghoa':
            $idhanghoa = $_POST['idhanghoa'];
            $tenhanghoa = $_POST['tenhanghoa'];
            $mota = $_POST['mota'];
            $giathamkhao = $_POST['giathamkhao'];
            $idloaihang = $_POST['idloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];
//            kiếm tra có đổi hình ảnh không?
            if (getimagesize($_FILES['fileimage']['tmp_name']) ==false){
                $hinhanh = $_POST['hinhanh'];
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
    header('location:../../index.php?req=loaihangView');
}
?>