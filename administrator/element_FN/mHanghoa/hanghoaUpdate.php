<?php
require './element_FN/mod/hanghoaCls.php';
require 'element_FN/mod/nhacungcapCls.php';
require 'element_FN/mod/nhasanxuatCls.php';

$idnhacungcap = $_GET['idnhacungcap'];
$idnhasanxuat = $_GET['idnhasanxuat'];
$idhanghoa = $_GET['idhanghoa'];

$hanghoa = new hanghoa();
$gethanghoa = $hanghoa->HanghoaGetbyId($idhanghoa);

$nhacungcap = new nhacungcap();
$getncc = $nhacungcap->NhaCungCapGetbyId($idnhacungcap);
$list_ncc = $nhacungcap->NhaCungCapGetAll();

$nhasanxuat = new nhasanxuat();
$getnsx = $nhasanxuat->NhaSanXuatGetbyId($idnhasanxuat);
$list_nsx = $nhasanxuat->NhaSanXuatGetAll();

require './element_FN/mod/loaihangCls.php';
$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();
?>
<div class="title_mod"><img class="iconimg" src="./img_FN/update2.png"/>Cập nhật loại hàng</div>
<div class="content_mod">
    <form name="updatehanghoa" id="formupdate" method="post" enctype="multipart/form-data"
          action="./element_FN/mHanghoa/hanghoaAct.php?reqact=updatehanghoa">
        <input type="hidden" name="idhanghoa" value="<?php echo $idhanghoa; ?>"/>
        <input type="hidden" name="hinhanh" value="<?php echo ($gethanghoa->HINHANH); ?>"/>
        <table border="1">
            <tr>
                <td>Tên hàng hoá:</td>
                <td><input type="text" name="tenhanghoa" value="<?php echo $gethanghoa->TENHANGHOA;
?>"/></td>
            </tr>

            <tr>
                <td>Mô tả:</td>
                <td> <textarea name="mota" cols="30" rows="10"><?php echo $gethanghoa->MOTA;
?></textarea> </td>
                </td>
            </tr>
            <tr>
                <td>Giá tham khảo:</td>
                <td><input type="text" name="giathamkhao" value="<?php echo $gethanghoa->GIATHAMKHAO;
?>"/></td>
            </tr>
            <tr>
                <td>Tên hình ảnh:</td>
                <td><input type="text" name="tenhinhanh" value="<?php echo $gethanghoa->TENHINHANH;
?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td>
                    <input type="file" name="fileimage"/>
                    <img class="imgtable" src='data:image/png;base64,<?php echo ($gethanghoa->HINHANH);
?>'/>
                </td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_loaihang as $l) {
                        ?>
                        <input type="radio" name="idloaihang" <?php
                        if ($l->IDLOAIHANG == $gethanghoa->IDLOAIHANG)
                            echo "checked";
                        ?> value="<?php echo $l->IDLOAIHANG; ?>"/>
                        <img class="iconimg" src='data:image/png;base64,<?php echo ($l->HINHANH); ?>'/>
                        <?php echo ($l->TENHINHANH); ?><br>
                        <?php
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td>Chọn nhà cung cấp:</td>
                <td>
                    <?php
                    foreach ($list_ncc as $l) {
                        ?>
                        <input type="radio" name="idnhacungcap" <?php
                        if ($l->IDNHACUNGCAP == $gethanghoa->IDNHACUNGCAP)
                            echo "checked";
                        ?>
                               value="<?php echo $l->IDNHACUNGCAP; ?>"/>                       
                        <?php echo ($l->TENNHACUNGCAP); ?><br>
                        <?php
                    }
                    ?>
                </td>               
            </tr>
            <tr>
                <td>Chọn nhà sản xuất:</td>
                <td>
                    <?php
                    foreach ($list_nsx as $l) {
                        ?>
                        <input type="radio" name="idnhasanxuat"
                            <?php
                        if ($l->IDNHASANXUAT == $gethanghoa->IDNHASANXUAT)
                            echo "checked";
                        ?>
                               value="<?php echo $l->IDNHASANXUAT; ?>"/>                       
                        <?php echo ($l->TENNHASANXUAT); ?><br>
                        <?php
                    }
                    ?>
                </td>               
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Cật nhật"/></td>
                <td><button onClick="window.location.reload();">cancel</button><b
                        id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
