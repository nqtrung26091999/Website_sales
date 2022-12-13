<?php
session_start();
error_reporting(E_ERROR);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang sản phẩm hàng hóa tiêu dùng giải trí</title>
        <link type="text/css" rel="stylesheet" href="public_files/pmycss.css"/>
        <script src="administrator/js_FN/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="javascript/javascript.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="div_ajax"></div>
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
                    <a class="item_filter" href="status.php">
                        <span class="span_name"><?php echo "Hello " . $namelogin; ?></span>
                    </a>
                    <?php
                }
                ?>             
            </div>
            <div id="signoutbutton">
                <?php
                if (isset($_SESSION['USER']) || isset($_SESSION['ADMIN'])) {
                    ?>
                    <a href="./administrator/element_FN/mKhachhang/userAct.php?reqact=userlogout">
                        <img src="./administrator/img_FN/logout.png" class="iconbutton"/>
                    </a>                    
                    <?php
                } else {
                    ?>
                    <a></a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div id="lvTwo"><?php require './apart/menuLoaihang.php'; ?></div>

        <div id="lvThree">
            <?php
            require './apart/filterNSX.php';
            require './apart/userinformation.php';
            require './apart/order.php';
            ?>
        </div>
    </body>
</html>