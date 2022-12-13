<?php
require './element_FN/mod/hoadonCls.php';
$hoadon = new hoadon();
$or_obj = $hoadon->HoadonGetAll();

$s = count((array) $or_obj);
?>
<!--action-->
<form class="formTK" action="./element_FN/mThongke/thongkeAct.php?reqtk=add" method="post">
    <input type="hidden" name="soluongdonhang" value="<?php echo $s; ?>" />
    <?php
    foreach ((array) $or_obj as $value) {
        ?>
        <input type="hidden" name="soluonghanghoa" value="<?php
        $soluonghanghoa = $value->SOLUONGHANGHOA;
        $totalsl += $soluonghanghoa;
        echo $totalsl;
        ?>">
        <input type="hidden" name="tongdoanhthu" value="<?php
        $tongdoanhthu = $value->GIAHOADON;
        $totaldt += $tongdoanhthu;
        echo $totaldt;
        ?>"/>
               <?php
           }
           ?>


    <input type="submit" value="Thống kê" />
</form>

<?php
require './element_FN/mod/thongkeCls.php';

$thongke = new thongke();
$thongke_obj = $thongke->ThongKeGetAll();
?>

<!--view-->
<div class="main_table">
    <?php
    foreach ($thongke_obj as $v) {
        ?>
        <table border="1" align="center">
            <thead>
            <th>ID</th>
            <th>Số lượng đơn hàng</th>
            <th>Số lượng hàng hoá</th>
            <th>Tổng doanh thu</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Xoá</th>
            </thead>
            <tbody align="center">
                <tr>
                    <td><?php echo $v->IDTHONGKE ?></td>
                    <td><?php echo $v->SOLUONGDONHANG ?></td>
                    <td><?php echo $v->SOLUONGHANGHOA ?></td>
                    <td><?php echo $v->TONGDOANHTHU ?></td>
                    <td><?php
                        $mon = $v->MONTH;
                        echo substr($mon, 6, -3);
                        ?></td>
                    <td><?php
                        $mon = $v->MONTH;
                        echo substr($mon, 0, -6);
                        ?></td>
                    <td align="center">
                        <?php
                        if (isset($_SESSION['ADMIN'])) {
                            ?>
                            <a href="./element_FN/mThongke/thongkeAct.php?reqtk=delete&idthongke=<?php echo $v->IDTHONGKE; ?>">
                                <img class="iconimg" src="./img_FN/idelete.png"/>
                            </a>
                            <?php
                        } else {
                            ?>
                            <img class="iconimg" src="./img_FN/idelete.png"/>
                            <?php
                        }
                        ?>
                </tr>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>

