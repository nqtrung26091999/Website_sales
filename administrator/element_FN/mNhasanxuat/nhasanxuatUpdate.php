<div>Cập nhật thông tin</div>
<?php
require '../mod/nhasanxuatCls.php';
$idnhasanxuat = $_GET['idnhasanxuat'];
$nhasanxuat = new nhasanxuat();
$get = $nhasanxuat->NhaSanXuatGetbyId($idnhasanxuat);
?>
<div class="title_user">Nhà cung sản xuất</div>
<div class="content_user">
    <form name="update" id="formupdate" method="post" action="./element_FN/mNhasanxuat/nhasanxuatAct.php?reqact=update">
        <input type="hidden" name="idnhasanxuat" value="<?php echo $idnhasanxuat; ?>"/>
        <table>
            <tr>
                <td>Tên nhà sản xuất:</td>
                <td><input type="text" name="tennhasanxuat" value="<?php echo $get->TENNHASANXUAT; ?>"/></td>
            </tr>
            <tr>
                <td>Liên hệ:</td>
                <td><input type="text" name="lienhe" value="<?php echo $get->LIENHE; ?>"/></td>
            </tr>
            <tr>
                <td>Ngày sản xuất:</td>
                <td><input type="date" name="ngaysanxuat" value="<?php echo $get->NGAYSANXUAT; ?>"/></td>
            </tr>
            <tr>
                <td>Loại hàng:</td>
                <td><input type="text" name="loaihang" value="<?php echo $get->LOAIHANG; ?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cật nhật"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>