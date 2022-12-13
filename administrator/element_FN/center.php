<?php
    if (isset($_GET['req'])) {
        $request = $_GET['req'];
        switch ($request) {
            case 'exjs':
                require './pageJS/exjs.php';
                break;
            case 'exjs2';
                require './pageJS/exjs2.php';
                break;
            case 'exjs3':
                require './pageJS/exjs3.php';
                break;
            case 'userView':
                require './element_FN/mKhachhang/userView.php';
                break;
            case 'updateuser';
                require './element_FN/mKhachhang/userUpdate.php';
                break;
            case 'loaihangView':
                require './element_FN/mLoaihang/loaihangView.php';
                break;
            case 'hanghoaView':
                require './element_FN/mHanghoa/hanghoaView.php';
                break;
            case 'hanghoaUpdate':
                require './element_FN/mHanghoa/hanghoaUpdate.php';
                break;
            case 'loaihangUpdate':
                require './element_FN/mLoaihang/loaihangUpdate.php';
                break;
            case 'nhanvienView':
                require './element_FN/mNhanvien/nhanvienView.php';
                break;
            case 'nhacungcapView':
                require './element_FN/mNhacungcap/nhacungcapView.php';
                break;
            case 'hoadonView':
                require './element_FN/mHoadon/hoadonView.php';
                break;
            case 'nhasanxuatView':
                require './element_FN/mNhasanxuat/nhasanxuatView.php';
                break;
            case 'thongkedonhangView':
                require './element_FN/mThongke/thongkedonhangView.php';
                break;
            
        }
    } else {
        require './element_FN/default.php';
    }
?>