<script>
    function goBack() {
        window.history.back();
    }
</script>

<?php
session_start();
//require './administrator/element_FN/mod/hanghoaCls.php';
$s = '../administrator/element_FN/mod/hanghoaCls.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './administrator/element_FN/mod/hanghoaCls.php';
}
require_once $f;
$hanghoa = new hanghoa();
if (isset($_GET['reqHanghoa'])) {
    $idhanghoa = $_GET['reqHanghoa'];
    $obj = $hanghoa->HanghoaGetbyId($idhanghoa);
}
?>
<div class="main_content">
    <div class="itemsViewHanghoa">
        <center><img class="imgViewHanghoa" src='data:image/png;base64,<?php echo ($obj->HINHANH); ?>'/></center><br/>
        Sản Phẩm: <?php echo $obj->TENHANGHOA; ?><br/><hr>
        Mô tả: <?php echo $obj->MOTA; ?><br/><hr>
        Giá Bán: <?php echo $obj->GIATHAMKHAO; ?>đ<br/><hr>
        <button onclick="goBack()">Go Back</button>
    </div>
    <div class="content_order">

        <div class="content_order_item">
            <?php
            if (isset($_SESSION['USER']) || isset($_SESSION['ADMIN'])) {
                ?>
                <a class="item" href="payment.php?idhanghoa=<?php echo $idhanghoa; ?>">THANH TOÁN</a>
                <?php
            } else {
                ?>
                <a class="item" href="./administrator/userLogin.php">THANH TOÁN</a>
                <?php
            }
            ?>
        </div>
        <div class="content_order_item"><a class="item" href="./administrator/element_FN/mGiohang/giohangAct.php?reqcart=addcart&idhanghoa=<?php echo $idhanghoa; ?>">BỎ VÀO GIỎ HÀNG</a></div>
    </div>
</div>
