<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <link href="stylecss/mycss.css" rel="stylesheet" type="text/css"/>
    <script src="js_FN/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="js_FN/jscript.js" type="text/javascript"></script>
</head>
<body>
    <?php
    if (!isset($_SESSION['USER']) and!isset($_SESSION['ADMIN'])) {
        header('location:userLogin.php');
    }
    ?>
    <div id="main_content">
        <div id="top_div">
            <?php require './element_FN/top.php'; ?>
        </div>
        <div id="left_div">
            <?php
            require './element_FN/left.php';
            ?>
        </div>

        <div id="center_div">

            <?php
            require './element_FN/center.php';
            ?>

        </div>

        <div id="right_div">
            <?php
            require './element_FN/right.php';
            ?>
        </div>

        <div id="bottom_div">

        </div>
    </div>
    <div id="signoutbutton">
        <a href="element_FN/mKhachhang/userAct.php?reqact=userlogout">
            <img src="img_FN/logout.png" class="iconbutton"/>
        </a>
    </div>
</body>
</html>
