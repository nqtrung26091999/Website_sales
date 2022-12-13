<div>Quản lý nhà sản xuất</div>
<hr>
<div>Nhà sản xuất</div>
<div class="content_user">
    <form name="newuser" id="formreg" method="post" action="./element_FN/mNhasanxuat/nhasanxuatAct.php?reqact=addnew">
        <table>          
            <tr>
                <td>Tên nhà sản xuất:</td>
                <td><input type="text" name="tennhasanxuat"/></td>
            </tr>
            <tr>
                <td>Liên hệ:</td>
                <td><input type="text" name="lienhe"/></td>
            </tr>
            <tr>
                <td>Ngày sản xuất:</td>
                <td>
                    <input type="date" name="ngaysanxuat"/>
                </td>
            </tr>
            <tr>
                <td>Loại hàng:</td>
                <td>
                    <input type="text" name="loaihang"/>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr/>
<?php
require './element_FN/mod/nhasanxuatCls.php';
?>
<div class="title_user">Danh sách nhà sản xuất</div>
<div class="content_user">
    <?php
    $obj = new nhasanxuat();
    $list = $obj->NhaSanXuatGetAll();
    $l = count($list);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên nhà sản xuất</th>                   
                    <th>liên hệ</th>                   
                    <th>Ngày sản xuất</th>
                    <th>Loại hàng</th>
                    <th>Edit</th>            
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDNHASANXUAT; ?></td>
                        <td><?php echo $v->TENNHASANXUAT; ?></td>
                        <td><?php echo $v->LIENHE; ?></td>
                        <td><?php echo $v->NGAYSANXUAT; ?></td>
                        <td><?php echo $v->LOAIHANG; ?></td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mNhasanxuat/nhasanxuatAct.php?reqact=delete&idnhasanxuat=<?php echo $v->IDNHASANXUAT; ?>">
                                    <img class="iconimg" src="./img_FN/idelete.png"/>
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/idelete.png"/>
                                <?php
                            }
                            ?>
                            <!--hình cập nhật-->
                            <?php
                            if (isset($_SESSION['USER']) and $v->USERNAME == 'admin') {
                                ?>
                                <img class="iconimg" src="./img_FN/update.png"/>
                                <?php
                            } else {
                                ?>
                    <tempsnhasanxuat class="btnupdate" value="<?php echo $v->IDNHASANXUAT; ?>">
                        <img class="iconimg" src="./img_FN/update.png"/>
                    </tempsnhasanxuat>
                    <?php
                }
                ?>
                </td>
                <?php
            }
            ?> </tr>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
