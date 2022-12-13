<div>Quản lý nhân viên</div>
<hr>
<div>Nhân viên</div>
<div class="content_user">
    <form name="newuser" id="formreg" method="post" action="./element_FN/mNhanVien/nhanvienAct.php?reqact=addnew">
        <table>          
            <tr>
                <td>Họ tên nhân viên:</td>
                <td><input type="text" name="hoten"/></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true"/>
                    Nữ<input type="radio" name="gioitinh" value="0"/>
                </td>
            </tr>

            <tr>
                <td>Loại nhân viên:</td>
                <td>
                    ADMIN<input type="radio" name="loainhanvien" value="ADMIN"/>
                    THANH TOÁN<input type="radio" name="loainhanvien" value="THANH TOÁN"/>
                    BẢO TRÌ<input type="radio" name="loainhanvien" value="BẢO TRÌ"/>
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
require './element_FN/mod/nhanvienCls.php';
?>
<div class="title_user">Danh sách nhân viên</div>
<div class="content_user">
    <?php
    $obj = new nhanvien();
    $list = $obj->NhanVienGetAll();
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
                    <th>Họ tên nhân viên</th>                   
                    <th>Ngày Sinh</th>
                    <th>Giới tính</th>
                    <th>Loại nhân viên</th>
                    <th>Edit</th>            
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDNHANVIEN; ?></td>
                        <td><?php echo $v->HOTEN; ?></td>
                        <td><?php echo $v->NGAYSINH; ?></td>
                        <td align="center">
                            <?php
                            if ($v->GIOITINH == 0) {
                                ?>
                                <img class="iconimg" src="./img_FN/nu.png"/>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/nam.png"/>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $v->LOAINHANVIEN; ?></td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mNhanvien/nhanvienAct.php?reqact=delete&idnhanvien=<?php echo $v->IDNHANVIEN; ?>">
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
                    <tempsnhanvien class="btnupdate" value="<?php echo $v->IDNHANVIEN; ?>">
                        <img class="iconimg" src="./img_FN/update.png"/>
                    </tempsnhanvien>
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
