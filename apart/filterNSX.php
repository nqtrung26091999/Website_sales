
<?php
//require '../administrator/element_FN/mod/nhasanxuatCls.php';
//require './administrator/element_FN/mod/loaihangCls.php';
$s = '../administrator/element_FN/mod/nhasanxuatCls.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './administrator/element_FN/mod/nhasanxuatCls.php';
}
require_once $f;

$nhansanxuat = new nhasanxuat();
$list = $nhansanxuat->NhaSanXuatGetAll();
?>
<div class="content_filter">
    <a class="head_filter">THƯƠNG HIỆU</a><hr>
    <?php
    foreach ($list as $l) {
        ?>
        <a class="item_filter" href="index.php?reqFilter=<?php echo $l->IDNHASANXUAT ?>">
            <?php echo $l->TENNHASANXUAT; ?>
        </a>
        <br>
        <br>
        <?php
    }
    ?>
</div>

