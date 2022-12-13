<div>Quản lý người dùng</div>
<hr>
<div>Người dùng mới</div>
<div class="content_user">
    <form name="newuser" id="formreg" method="post" action="./element_FN/mKhachhang/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true"/>
                    Nữ<input type="radio" name="gioitinh" value="0"/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai"/></td>
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
require './element_FN/mod/khachhangCls.php';
?>
<div class="title_user">Danh sách người dùng</div>
<div class="content_user">
    <?php
    $obj_User = new khachhang();
    $list_User = $obj_User->UserGetAll();
    $l = count($list_User);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày Sinh</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Loai tài khoản</th>
                    <th>Ngày đăng ký</th>
                    <th>Hoạt động</th>
                    <th>Edit</th>            
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_User as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDUSER; ?></td>
                        <td><?php echo $v->USERNAME; ?></td>
                        <td><?php echo $v->PASSWORD; ?></td>
                        <td><?php echo $v->HOTEN; ?></td>
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
                        <td><?php echo $v->NGAYSINH; ?></td>
                        <td><?php echo $v->DIACHI; ?></td>
                        <td><?php echo $v->DIENTHOAI; ?></td>
                        <td><?php echo$v->LOAITAIKHOAN?></td>
                        <td><?php echo $v->NGAYDANGKY; ?></td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                if ($v->ABILITY == 0) {
                                    ?>
                                    <a href="./element_FN/mKhachhang/userAct.php?reqact=setlock&iduser=<?php echo $v->IDUSER; ?>&ability=<?php echo $v->ABILITY; ?>">
                                        <img class="iconimg" src="./img_FN/lock.png"/>
                                    </a>                                
                                    <?php
                                } else {
                                    ?>
                                    <a href="./element_FN/mKhachhang/userAct.php?reqact=setlock&iduser=<?php echo $v->IDUSER; ?>&ability=<?php echo $v->ABILITY; ?>">
                                        <img class="iconimg" src="./img_FN/unlock.png"/>
                                    </a>                              
                                    <?php
                                }
                            } else {
                                if ($v->ABILITY == 0) {
                                    ?>
                                    <img class="iconimg" src="./img_FN/lock.png"/>
                                    <?php
                                } else {
                                    ?>
                                    <img class="iconimg" src="./img_FN/unlock.png"/>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mKhachhang/userAct.php?reqact=deleteuser&iduser=<?php echo $v->IDUSER; ?>">
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
                    <temps class="btnupdate" value="<?php echo $v->IDUSER; ?>">
                        <img class="iconimg" src="./img_FN/update.png"/>
                    </temps>
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
