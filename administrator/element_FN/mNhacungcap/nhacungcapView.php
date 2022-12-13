<div>Quản lý nhà cung cấp</div>
<hr>
<div>Nhà cung cấp</div>
<div class="content_user">
    <form name="newuser" id="formreg" method="post" action="./element_FN/mNhacungcap/nhacungcapAct.php?reqact=addnew">
        <table>          
            <tr>
                <td>Tên nhà cung cấp:</td>
                <td><input type="text" name="tennhacungcap"/></td>
            </tr>
            <tr>
                <td>Liên hệ:</td>
                <td><input type="text" name="lienhe"/></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td>
                    <input type="number" name="soluong"/>
                </td>
            </tr>
            <tr>
                <td>Ngày cung cấp:</td>
                <td>
                    <input type="text" name="ngaycungcap" value="<?php $today = date("d/m/Y");echo $today; ?>"/>
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
require './element_FN/mod/nhacungcapCls.php';
?>
<div class="title_user">Danh sách nhà cung cấp</div>
<div class="content_user">
    <?php
    $obj = new nhacungcap();
    $list = $obj->NhaCungCapGetAll();
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
                    <th>Tên nhà cung cấp</th>                   
                    <th>liên hệ</th>
                    <th>Số lương hàng cung cấp</th>
                    <th>Ngày cung cấp</th>
                    <th>Edit</th>            
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDNHACUNGCAP; ?></td>
                        <td><?php echo $v->TENNHACUNGCAP; ?></td>
                        <td><?php echo $v->LIENHE; ?></td>
                        <td><?php echo $v->SOLUONG; ?></td>
                        <td><?php echo $v->NGAYCUNGCAP; ?></td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mNhacungcap/nhacungcapAct.php?reqact=delete&idnhacungcap=<?php echo $v->IDNHACUNGCAP; ?>">
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
                    <tempsnhacungcap class="btnupdate" value="<?php echo $v->IDNHACUNGCAP; ?>">
                        <img class="iconimg" src="./img_FN/update.png"/>
                    </tempsnhacungcap>
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
