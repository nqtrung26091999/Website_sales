<?php

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

class thongke extends Database {

    public function ThongKeGetAll() {
        $getAll = $this->connect->prepare("select * from thongke");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function ThongKeAdd($soluongdonhang, $soluonghanghoa, $tongdoanhthu) {
        $add = $this->connect->prepare("INSERT INTO thongke(soluongdonhang, soluonghanghoa, tongdoanhthu) VALUES (?,?,?)");

        $add->execute(array($soluongdonhang, $soluonghanghoa, $tongdoanhthu));

        return $add->rowCount();
    }

    public function ThongKeDelete($idthongke) {
        $del = $this->connect->prepare("delete from thongke where idthongke=?");

        $del->execute(array($idthongke));

        return $del->rowCount();
    }
}

?>
