<?php

//$s = '../../element_FN/mod/database.php';
//if (file_exists($s)) {
//    $f = $s;
//} else {
//    $f = './element_FN/mod/database.php';
//}
//require_once $f;
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

class loaihang extends database {

    public function LoaihangGetAll() {
        $getAll = $this->connect->prepare("select * from loaihang");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh) {
        $add = $this->connect->prepare("INSERT INTO loaihang(tenloaihang, tenhinhanh, hinhanh) VALUES(?,?,?)");
        $add->execute(array($tenloaihang, $tenhinhanh, $hinhanh));

        return $add->rowCount();
    }

    public function LoaihangDelete($idloaihang) {
        $del = $this->connect->prepare("delete from loaihang where idloaihang=?");

        $del->execute(array($idloaihang));

        return $del->rowCount();
    }

    public function LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang) {
        $update = $this->connect->prepare("UPDATE loaihang SET " . "tenloaihang = ?, tenhinhanh = ?, hinhanh = ?" . " WHERE idloaihang = ?");

        $update->execute(array($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang));
        return $update->rowCount();
    }

    public function LoaihangGetbyId($idloaihang) {
        $getTk = $this->connect->prepare("select * from loaihang where idloaihang=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idloaihang));

        return $getTk->fetch();
    }

}

?>