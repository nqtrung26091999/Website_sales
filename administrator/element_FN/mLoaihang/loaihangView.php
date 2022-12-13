<div><img class="iconimg" src="./img_FN/cate.png"/>Quản Lí Loại Hàng></div>
<hr>
<div class="title_mod"><img class="iconimg" src="./img_FN/insert.png"/>Thêm loại hàng </div>
<div class="content_mod">
    <form name="newloaihang" id="formadd loaihang" method="post"
          enctype="multipart/form-data"
          action="./element_FN/mLoaihang/loaihangAct.php?reqact=addnew">
        <table>
            <tr>
                <td> Tên loại hàng:</td>
                <td><input type="text" name="tenloaihang"/></td>
            </tr>
            <tr>
                <td> Tên hình ảnh:</td>
                <td><input type="text" name="tenhinhanh"/></td>
            </tr>
            <tr>
                <td> Hình ảnh:</td>
                <td><input type="file" name="fileimage"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<!--giaodien-->
<hr/>
<?php
require './element_FN/mod/loaihangCls.php';
?>
<div class="title_mod"><img class="iconimg" src="./img_FN/list.png"/>Danh sách loại hàng</div>
<div class="content_mod">
    <?php
    $obj = new loaihang();
    $list_loaihang = $obj->LoaihangGetAll();
    $l = count($list_loaihang);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên loại hàng</th>
                    <th><img src="./img_FN/nameimg.png" class="iconimg"/></th>
                    <th><img src="./img_FN/image.png" class="iconimg"/></th>
                    <th><img src="./img_FN/tool.png" class="iconimg"/></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_loaihang as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDLOAIHANG; ?></td>
                        <td><?php echo $v->TENLOAIHANG; ?></td>
                        <td><?php echo $v->TENHINHANH; ?></td>
                        <td><img class="imgtable" src='data:image/png;base64,<?php echo ($v->HINHANH); ?>'/></td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $v->idloaihang; ?>">
                                    <img class="iconimg" src="./img_FN/idelete.png"/>
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/idelete.png"/>
                                <?php
                            }
                            ?>
                    <a href="index.php?req=loaihangUpdate&idloaihang=<?php echo $v->IDLOAIHANG;?>">
                    <img class="iconimg" src="./img_FN/update2.png"/>
                    </a>

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