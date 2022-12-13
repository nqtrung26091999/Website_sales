<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
    <tltle></tltle>
    <script src="js_FN/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="js_FN/jscript.js" type="text/javascript"></script>
    <link href="stylecss/mycss.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="img_bg">
        <img src="img_FN/Computer-hardware-brand-logos_1920x1080.jpg"/>
    </div>
    <div class="modal">
        <div class="modal__overlay"></div>
        <div id="loginBody">
            <h4 align="center"> ĐĂNG NHẬP HỆ THỐNG </h4>
            <form name="frmLogin" method="post" action="element_FN/mKhachhang/userAct.php?reqact=checkLogin">
                <table>
                    <tr><td>Tên tài khoản:</td>
                        <td><input type="text" name="username" id="username"/></td></tr>
                    <tr><td>Mật khẩu: </td>
                        <td><input type="password" name="password" id="password"/></td></tr>
                    <tr><td></td>
                        <td><input type="submit" value="Đăng nhập"/></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>

