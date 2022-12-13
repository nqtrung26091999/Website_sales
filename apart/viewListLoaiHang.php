<?php
require $_SERVER['localhost'] . './administrator/element_FN/mod/hanghoaCls.php';
//$a = '../../elements/mod/hanghoaCls.php';
//$s = '../administrator/elements/mod/hanghoaCls.php';
//if (file_exists($s)) {
//    $f = $s;
//}
//if (!file_exists($s)) {
//    $f = $a;
//}
//if (!file_exists($s) && !file_exists($a))
//    $f = './administrator/elements/mod/hanghoaCls.php';
//require_once $f;
$hanghoa = new hanghoa();

if (!isset($_GET['reqView'])) {
    $list_hanghoa = $hanghoa->HanghoaGetAll();
    $s = count((array) $list_hanghoa);
} else {
    $idloaihang = $_GET['reqView'];
    $list_hanghoa = $hanghoa->HanghoaGetbyIdloaihang($idloaihang);
    $s = count((array) $list_hanghoa);
}

if (isset($_GET['reqFilter'])) {
    $idnhasanxuat = $_GET['reqFilter'];
    $list_hanghoa = $hanghoa->HanghoaGetbyIdNSX($idnhasanxuat);
}
?>

<div>
    <?php
    foreach ($list_hanghoa as $v) {
        ?>
        <a href="./index.php?reqHanghoa=<?php echo $v->IDHANGHOA; ?>">
            <div class="itemsHanghoa">
                <img class="imgHanghoa" src='data:image/png;base64,<?php echo ($v->HINHANH); ?>'/><br/>
                Sản phẩm: <?php echo $v->TENHANGHOA; ?><br/>
                <div class="corlor_gb">Giá bán: <?php echo $v->GIATHAMKHAO; ?>đ</div>
            </div>
        </a>
        <?php
    }
    ?>
</div>