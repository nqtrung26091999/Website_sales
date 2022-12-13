<link href="../public_files/pmycss.css" rel="stylesheet" type="text/css"/>

<div class="content_cart">

    <div class="cart_overlay"></div>
    <div class="cart_list">
        <tempsclose id="close_cart"><img id="img_close_cart" src="./administrator/img_FN/close.png"/></tempsclose>
        <table class="table_cart">
            <thead>
                <tr>
                    <th>Tên sẩn phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá tham khảo</th>
                    <th>Thanh toán/xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../administrator/element_FN/mod/giohangCls.php';
                require '../administrator/element_FN/mod/hanghoaCls.php';
                $cart = new giohang();
                $list = $cart->GioHangGetAll();
                $s = count((array) $list);
                $hanghoa = new hanghoa();
                foreach ($list as $v) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $idhanghoa = $v->IDHANGHOA;
                            $get = $hanghoa->HanghoaGetbyId($idhanghoa);
                            echo $get->TENHANGHOA;
                            ?>
                        </td>
                        <td>
                            <?php
                            $idhanghoa = $v->IDHANGHOA;
                            $get = $hanghoa->HanghoaGetbyId($idhanghoa);
                            ?>
                            <img class="iconimg" src='data:image/png;base64,<?php echo ($get->HINHANH); ?>'/>
                            <?php
                            ?>
                        </td>
                        <td>
                            <?php
                            $idhanghoa = $v->IDHANGHOA;
                            $get = $hanghoa->HanghoaGetbyId($idhanghoa);
                            echo $get->GIATHAMKHAO;
                            $s_money = $s_money + $get->GIATHAMKHAO;
                            ?>đ
                        </td>
                        <td>
                            <a href="payment.php?idhanghoa=<?php echo $idhanghoa; ?>">
                                <img src="./administrator/img_FN/credit-card.png" class="iconcart"/>
                            </a>
                            <a href="./administrator/element_FN/mGiohang/giohangAct.php?reqcart=delete&idgiohang=<?php echo $v->IDGIOHANG; ?>">
                                <img src="./administrator/img_FN/idelete.png" class="iconcart"/> 
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="content_bottom">
        <div class="cart_list_bottom">
            <div class="cart_list_bottom_item">
                TỔNG SẢN PHẨM
                <div class="item_mess"><?php echo $s ?></div>
            </div>
            <div class="cart_list_bottom_item">
                TỔNG GIÁ SẢN PHẨM
                <div class="item_mess"><?php echo $s_money; ?>đ</div>
            </div>
            <div class="cart_list_bottom_item">
                THANH TOÁN TẤT CẢ<br>
                <a href="paymentcart.php?idgiohang=<?php echo $v->IDGIOHANG; ?>">
                    <img class="img_all" src="./administrator/img_FN/credit-card.png"/>
                </a>
            </div>
            <div class="cart_list_bottom_item">
                XOÁ TẤT CẢ SẢN PHẨM<br>
                <a href="./administrator/element_FN/mGiohang/giohangAct.php?reqcart=deleteall&idgiohang=<?php echo $v->IDGIOHANG; ?>">
                    <img class="img_all" src="./administrator/img_FN/close.png"/>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="../javascript/javascript.js" type="text/javascript"></script>