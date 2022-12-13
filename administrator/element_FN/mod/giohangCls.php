<?php

//
//$s = '../../elements/mod/database.php';
//if (file_exists($s)) {
//    $f = $s;
//} else {
//    $f = './elements/mod/database.php';
//}
//require_once ($f);
$a = '../administrator/element_FN/mod/database.php';
$h = './element_FN/mod/database.php';
$t = './administrator/element_FN/mod/database.php';
$s = '../../element_FN/mod/database.php';
if (file_exists($s)) {
    $f = $s;
}
if (!file_exists($s)) {
    $f = $t;
}
if (!file_exists($t) && !file_exists($s)) {
    $f = $h;
}
if (!file_exists($t) && !file_exists($s) && !file_exists($h)) {
    $f = $a;
}
if (!file_exists($t) && !file_exists($s) && !file_exists($h) && !file_exists($a)) {
    $f = '../element_FN/mod/database.php';
}
require_once $f;

class giohang extends Database {

    public function GioHangGetAll() {
        $getAll = $this->connect->prepare("select * from giohang");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function GioHangAdd($idhanghoa) {
        $add = $this->connect->prepare("INSERT INTO giohang(idhanghoa) VALUES (?)");

        $add->execute(array($idhanghoa));

        return $add->rowCount();
    }

    public function GioHangDelete($idgiohang) {
        $del = $this->connect->prepare("delete from giohang where idgiohang=?");
        $del->execute(array($idgiohang));

        return $del->rowCount();
    }
    public function GioHangDeleteAll($idgiohang) {
        $del = $this->connect->prepare("delete from giohang");
        $del->execute(array($idgiohang));

        return $del->rowCount();
    }


}

?>
