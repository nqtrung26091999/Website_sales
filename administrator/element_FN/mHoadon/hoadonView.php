<div>Quản lý hoá đơn</div>
<?php
require './element_FN/mod/hoadonCls.php';
require './element_FN/mod/khachhangCls.php';
require './element_FN/mod/hanghoaCls.php';
require './element_FN/mod/nhanvienCls.php';
?>
<div class="content_user">
    <?php
    $obj = new hoadon();
    $list_order = $obj->HoadonGetAll();
    $l = count($list_order);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IDUSER</th>
                    <th>IDNHANVIEN</th>
                    <th>IDHANGHOA</th>
                    <th>Tên hàng hoá</th>
                    <th>Phương thức thanh toán</th>
                    <th>Giá hoá đơn</th>
                    <th>Ghi chú</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Ngày lập hoá đơn</th>
                    <th>Tình trạng</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_order as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->IDHOADON; ?></td>
                        <td><?php echo $v->IDUSER; ?></td>
                        <td><?php echo $v->IDNHANVIEN; ?></td>
                        <td><?php echo $v->IDHANGHOA; ?></td>
                        <td><?php echo $v->TENHANGHOA; ?></td>
                        <td><?php echo $v->PHUONGTHUCTHANHTOAN; ?></td>
                        <td><?php echo $v->GIAHOADON; ?></td>
                        <td><?php echo $v->GHICHU; ?></td>
                        <td><?php echo $v->SOLUONGHANGHOA; ?></td>
                        <td><?php echo $v->NGAYLAPHOADON; ?></td>
                        <td align="center">
                            <?php
                            if ($v->ABILITY == 0) {
                                ?>
                                <a href="./element_FN/mHoadon/hoadonAct.php?request=setlock&idhoadon=<?php echo $v->IDHOADON; ?>&ability=<?php echo $v->ABILITY; ?>">
                                    <img class="iconimg" src="./img_FN/lock.png"/>
                                </a>                                
                                <?php
                            } else {
                                ?>
                                <a href="./element_FN/mHoadon/hoadonAct.php?request=setlock&idhoadon=<?php echo $v->IDHOADON; ?>&ability=<?php echo $v->ABILITY; ?>">
                                    <img class="iconimg" src="./img_FN/unlock.png"/>
                                </a>                              
                                <?php
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element_FN/mHoadon/hoadonAct.php?request=delete&idhoadon=<?php echo $v->IDHOADON; ?>">
                                    <img class="iconimg" src="./img_FN/idelete.png"/>
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./img_FN/idelete.png"/>
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
