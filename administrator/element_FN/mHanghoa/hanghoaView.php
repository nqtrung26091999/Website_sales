<?php
require './element_FN/mod/loaihangCls.php';
require './element_FN/mod/nhasanxuatCls.php';
require './element_FN/mod/nhacungcapCls.php';

$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();

$obj_nsx = new nhasanxuat();
$list_nsx = $obj_nsx->NhaSanXuatGetAll();


$obj_ncc = new nhacungcap();
$list_ncc = $obj_ncc->NhaCungCapGetAll();
?>
<div><img class="iconimg" src="./img_FN/goods.png"/>Quản lý Hàng hóa</div>
<hr>
<div class="title_mod"><img class="iconimg" src="./img_FN/insert.png"/>Thêm hàng hóa</div>
<div class="content_mod">
    <form name="newhanghoa" id="formadd_hanghoa" method="post"
          enctype="multipart/form-data"
          action="./element_FN/mHanghoa/hanghoaAct.php?reqact=addnew">
        <table border="1">
            <tr>
                <td>Tên loại hàng:</td>
                <td><input type="text" name="tenhanghoa"/></td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td> <textarea name="mota" cols="30" rows="10"></textarea> </td>
            </tr>
            <tr>
                <td>Giá tham khảo:</td>
                <td> <input type="text" name="giathamkhao"/> </td>
            </tr>
            <tr>
                <td>Tên hình ảnh:</td>
                <td><input type="text" name="tenhinhanh"/></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input type="file" name="fileimage"/></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_loaihang as $l) {
                        ?>
                        <input type="radio" name="idloaihang" value="<?php echo $l->IDLOAIHANG; ?>"/>
                        <img class="iconimg" src='data:image/png;base64,<?php echo ($l->HINHANH); ?>'/>
                        <?php echo ($l->TENLOAIHANG); ?><br>
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
                        <input type="radio" name="idnhacungcap" value="<?php echo $l->IDNHACUNGCAP; ?>"/>                       
                        <?php echo ($l->TENNHACUNGCAP); ?><br>
                        <?php
                    }
                    ?>
                </td>               
            </tr>
            <tr>
                <td>Chọn hãng sản xuất:</td>
                <td>
                    <?php
                    foreach ($list_nsx as $l) {
                        ?>
                        <input type="radio" name="idnhasanxuat" value="<?php echo $l->IDNHASANXUAT; ?>"/>                       
                        <?php echo ($l->TENNHASANXUAT); ?><br>
                        <?php
                    }
                    ?>
                </td>               
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<!--bổ sung thêm code-->
<hr/>
<div class="title_mod"><img class="iconimg" src="./img_FN/list.png"/>Danh sách hàng hóa</div>
<div class="content_mod">
    <?php
    require './element_FN/mod/hanghoaCls.php';
    $obj_hanghoa = new hanghoa();
    $list_hanghoa = $obj_hanghoa->HanghoaGetAll();
    $l = count($list_hanghoa);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên hàng hóa</th>
                    <th>Tên nhàn sả xuất</th>
                    <th><img src="./img_FN/moneys.png" class="iconimg"/></th>
                    <th><img src="./img_FN/nameimg.png" class="iconimg"/></th>
                    <th><img src="./img_FN/image.png" class="iconimg"/></th>
                    <th><img src="./img_FN/tool.png" class="iconimg"/></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_hanghoa as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDHANGHOA; ?></td>
                        <td><?php echo $v->TENHANGHOA; ?></td>
                        <td><?php
                        $idnhasanxuat =$v->IDNHASANXUAT;
                        $tennhasanxuat = $obj_nsx->NhaSanXuatGetbyId($idnhasanxuat);
                        echo $tennhasanxuat->TENNHASANXUAT;
                        ?>
                        <td><?php echo $v->GIATHAMKHAO; ?></td>
                        <td><?php echo $v->TENHINHANH; ?></td>
                        <td><img class="imgtable" src='data:image/png;base64,<?php echo ($v->HINHANH); ?>'/></td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>

                                <a href="./element_FN/mHanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->IDHANGHOA; ?>">
                                    <img class="iconimg" src="./img_FN/idelete.png"/>
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/idelete.png"/>
                                <?php
                            }
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./index.php?req=hanghoaUpdate&idhanghoa=<?php echo $v->IDHANGHOA; ?>">
                                    <img class="iconimg" src="./img_FN/update2.png"/>
                                </a>                                             
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/update2.png"/>
                                <?php
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
<hr/>
