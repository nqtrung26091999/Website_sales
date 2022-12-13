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

class hoadon extends Database {

    public function HoadonGetAll() {
        $getAll = $this->connect->prepare("select * from hoadon");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function HoadonAdd($iduser, $idnhanvien, $idhanghoa, $tenhanghoa, $phuongthucthanhtoan, $giahoadon, $ghichu, $soluonghanghoa) {
        $add = $this->connect->prepare("INSERT INTO hoadon(iduser, idnhanvien, idhanghoa, tenhanghoa, phuongthucthanhtoan, giahoadon, ghichu, soluonghanghoa) VALUES (?,?,?,?,?,?,?,?)");

        $add->execute(array($iduser, $idnhanvien, $idhanghoa, $tenhanghoa, $phuongthucthanhtoan, $giahoadon, $ghichu, $soluonghanghoa));

        return $add->rowCount();
    }

    public function HoadonDelete($idhoadon) {
        $del = $this->connect->prepare("delete from hoadon where idhoadon=?");

        $del->execute(array($idhoadon));

        return $del->rowCount();
    }

    public function HoadonSetActive($idhoadon, $ability) {
        $update = $this->connect->prepare("update hoadon set ability=? where idhoadon=?");

        $update->execute(array($ability, $idhoadon));

        return $update->rowCount();
    }

}

?>
