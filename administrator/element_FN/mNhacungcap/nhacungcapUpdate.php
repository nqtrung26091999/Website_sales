<div>Cập nhật thông tin</div>
<?php
require '../mod/nhacungcapCls.php';
$idnhacungcap = $_GET['idnhacungcap'];
$nhacungcap = new nhacungcap();
$get = $nhacungcap->NhaCungCapGetbyId($idnhacungcap);
?>
<div class="title_user">Nhà cung cấp mới</div>
<div class="content_user">
    <form name="update" id="formupdate" method="post" action="./element_FN/mNhacungcap/nhacungcapAct.php?reqact=update">
        <input type="hidden" name="idnhacungcap" value="<?php echo $idnhacungcap; ?>"/>
        <table>
            <tr>
                <td>Tên nhà cung cấp:</td>
                <td><input type="text" name="tennhacungcap" value="<?php echo $get->TENNHACUNGCAP; ?>"/></td>
            </tr>
            <tr>
                <td>Liên hệ:</td>
                <td><input type="text" name="lienhe" value="<?php echo $get->LIENHE; ?>"/></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="text" name="soluong" value="<?php echo $get->SOLUONG; ?>"/></td>
            </tr>
            <tr>
                <td>Ngày cung cấp:</td>
                <td><input type="text" name="ngaycungcap" value="<?php echo $get->NGAYCUNGCAP; ?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cật nhật"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>