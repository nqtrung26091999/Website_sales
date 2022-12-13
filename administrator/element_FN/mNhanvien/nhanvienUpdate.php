<div>Cập nhật thông tin</div>
<?php
require '../mod/nhanvienCls.php';
$idnhanvien = $_GET['idnhanvien'];
$nhanvien = new nhanvien();
$get = $nhanvien->NhanVienGetbyId($idnhanvien)
?>
<div class="title_user">Nhân viên mới</div>
<div class="content_user">
    <form name="update" id="formupdate" method="post" action="./element_FN/mNhanvien/nhanvienAct.php?reqact=update">
        <input type="hidden" name="idnhanvien" value="<?php echo $idnhanvien; ?>"/>
        <table>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" value="<?php echo $get->HOTEN; ?>"/></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" value="<?php echo $get->NGAYSINH; ?>"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" <?php if ($get->GIOITINH == 1) echo 'checked'; ?>/>
                    Nữ<input type="radio" name="gioitinh" value="0" <?php if ($get->GIOITINH == 0) echo 'checked'; ?>/>
                </td>
            </tr>
            
            <tr>
                <td>Loại nhân viên:</td>
                <td>
                    ADMIN<input type="radio" name="loainhanvien" value="ADMIN" <?php if ($get->LOAINHANVIEN == "ADMIN") echo 'checked'; ?>/>
                    BẢO TRÌ<input type="radio" name="loainhanvien" value="BẢO TRÌ" <?php if ($get->LOAINHANVIEN == "BẢO TRÌ") echo 'checked'; ?>/>
                    THANH TOÁN<input type="radio" name="loainhanvien" value="THANH TOÁN" <?php if ($get->LOAINHANVIEN == "THANH TOÁN") echo 'checked'; ?>/>
                </td>
                </td>
            </tr>
           
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cật nhật"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>