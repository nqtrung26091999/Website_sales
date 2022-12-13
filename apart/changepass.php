<?php
session_start();
require '../administrator/element_FN/mod/khachhangCls.php';
$user = new khachhang();
if (isset($_SESSION['USER'])) {
    $namelogin = $_SESSION['USER'];
}
if (isset($_SESSION['ADMIN'])) {
    $namelogin = $_SESSION['ADMIN'];
}
if (isset($_COOKIE[$namelogin])) {
    $iduser = $user->UserGetbyUserName($namelogin);
}
?>  

<link href="../public_files/pmycss.css" rel="stylesheet" type="text/css"/>
<script src="../javascript/javascript.js" type="text/javascript"></script>

<div class="content_rg">
    <div class="rg_overlay"></div>
    <div class="rs_list">
        <tempsclose id="close_cart"><img id="img_close_cart" src="./administrator/img_FN/close.png"/></tempsclose>
        <div class="mess_rg">Đổi mật khẩu</div>
        <form name="newuser" id="" method="post" action="./administrator/element_FN/mKhachhang/userAct.php?reqact=changepass">
            <table class="table_rg">
                <tr>
                    <td>Nhập Username:</td>
                    <td><input type="text" name="username" value="<?php echo $namelogin;?>"/></td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ:</td>
                    <td><input type="password" name="passwordold"/></td>
                </tr>
                <tr>
                    <td>Mật khẩu mới:</td>
                    <td><input type="password" name="passwordnew"/></td>
                </tr>
                <tr>
                    <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                    <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
                </tr>
            </table>
        </form>
    </div>
</div>
