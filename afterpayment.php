<?php
session_start();
error_reporting(E_ERROR);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang sản phẩm hàng hóa tiêu dùng giải trí</title>
        <link type="text/css" rel="stylesheet" href="public_files/pmycss.css"/>
    </head>
    <body>
        <div id="lvOne">
            <?php
            require './apart/top.php';
            ?>
            <div>
                <?php
                if (isset($_SESSION['USER'])) {
                    $namelogin = $_SESSION['USER'];
                }

                if (isset($_SESSION['ADMIN'])) {
                    $namelogin = $_SESSION['ADMIN'];
                }

                if (isset($_COOKIE[$namelogin])) {
                    ?>
                    <span class="span_name"><?php echo "Hello " . $namelogin; ?></span>
                    <?php
                }
                ?>             
            </div>
            <div id="signoutbutton">
                <a href="./administrator/element_FN/mKhachhang/userAct.php?reqact=userlogout">
                    <img src="./administrator/img_FN/logout.png" class="iconbutton"/>
                </a>
            </div>

        </div>
        <div id="lvTwo"><?php require './apart/menuLoaihang.php'; ?></div>

        <div id="lvThree">
            <?php require './apart/filterNSX.php'; ?>
            <?php
            if (!isset($_GET['reqHanghoa'])) {

                require './apart/viewListLoaiHang.php';
            } else {
                require './apart/viewHangHoa.php';
            }
            ?>
        </div>
        <div id="lvThree_afterpayment">
            <div class="modal_afteroverlay"></div>
            <div class="modal_message">
                <a class="message">ĐƠN HÀNG CỦA BẠN ĐÃ GHI<br>
                    VUI LÒNG CHỜ XÁC NHẬN !
                </a>
                <a href="./index.php" class="message">CONTINUE</a>
            </div>
        </div>
    </body>

</html>