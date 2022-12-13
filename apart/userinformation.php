
<?php
require './administrator/element_FN/mod/khachhangCls.php';
$iduser = $_GET['iduser'];
$user = new khachhang();
$getuser = $user->UserGetbyId($iduser);
?>

<div class="content_info">
    <h2 align="center">Thông tin người dùng</h2>
    <form name="updateuser" id="formupdate" method="post" action="./administrator/element_FN/mKhachhang/userAct.php?reqact=updateuser">
        <input type="hidden" name="iduser" value="<?php echo $iduser; ?>"/>
        <input type="hidden" name="password" value="<?php echo $getuser->PASSWORD; ?>"/>
        <input type="hidden" name="username" value="<?php echo $getuser->USERNAME; ?>"/>
        <table>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" value="<?php echo $getuser->HOTEN; ?>"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" <?php if ($getuser->GIOITINH == 1) echo 'checked'; ?>/>
                    Nữ<input type="radio" name="gioitinh" value="0" <?php if ($getuser->GIOITINH == 0) echo 'checked'; ?>/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getuser->NGAYSINH; ?>"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi" value="<?php echo $getuser->DIACHI; ?>"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai" value="<?php echo $getuser->DIENTHOAI; ?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cật nhật"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>

    </form>
    <div>
        <tempschangepass>
            <a class="changepass">Đổi mật khẩu</a>
        </tempschangepass>
    </div>
</div>
