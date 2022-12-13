<?php 
//require './administrator/element_FN/mod/loaihangCls.php';
$s = '../administrator/element_FN/mod/loaihangCls.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './administrator/element_FN/mod/loaihangCls.php';
}
require_once $f;
?>
<a href="./index.php">
    <div class="itemsmenu">
        <img class="imgmenu" src="./administrator/img_FN/home.png"/>Home
    </div>
</a>
<?php 
$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();

foreach ($list_loaihang as $v){
    ?>
<a href="index.php?reqView=<?php echo $v->IDLOAIHANG;?>">
    <div class="itemsmenu">
        <img class="imgmenu" src='data:image/png;base64,<?php echo ($v->HINHANH);?>'/>
        <?php echo ($v->TENLOAIHANG);?>
    </div>
</a>
<?php
}
?>
