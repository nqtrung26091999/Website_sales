<?php
require './administrator/element_FN/mod/hoadonCls.php';
require './administrator/element_FN/mod/hanghoaCls.php';
$order = new hoadon();
$listor = $order->HoadonGetAll();
$hanghoa = new hanghoa();
?>
<div class="content_orderView">
    <div class="orderView">
        <div class="titleor">Đơn hàng của tôi</div>
        <table class="tableor" border="1">
            <thead>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Phương thức thanh toán</th>
            <th>Giá sản phẩm</th>
            <th>Ghi chú</th>
            <th>Ngày mua</th>
            <th>Tình trạng</th>
            </thead>
            <tbody>
                <?php
                foreach ($listor as $value) {
                    ?>
                    <tr>
                        <td><?php
                            echo $value->TENHANGHOA;
                            ?></td> 
                        <td>
                    <?php
                    $arrayidhanghoa = explode('&', $value->IDHANGHOA);
                    foreach ($arrayidhanghoa as $v) {
                        $hinhanh = $hanghoa->HanghoaGetbyId($v)
                        ?><img class="imgor" src='data:image/png;base64,<?php echo ($hinhanh->HINHANH); ?>'/><br><?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    echo $value->PHUONGTHUCTHANHTOAN;
                    ?>
                </td>
                <td>
                    <?php
                    echo $value->GIAHOADON;
                    ?>đ
                </td>
                <td>
                    <?php
                    echo $value->GHICHU;
                    ?>
                </td>
                <td>
                    <?php
                    echo $value->NGAYLAPHOADON;
                    ?>
                </td>
                <td>
                    <?php
                    if($value->ABILITY == 0){
                        echo 'Đợi xác nhận';
                    } else {
                        echo 'Đã xác nhận';
                    }
                    
                    ?>
                </td>
                    </tr>

                

                <?php
            }
            ?>

            </tbody>
        </table>
    </div>

</div>