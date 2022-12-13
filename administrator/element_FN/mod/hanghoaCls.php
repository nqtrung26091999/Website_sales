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

class hanghoa extends Database {

    public function HanghoaGetAll() {
        $getAll = $this->connect->prepare("select * from hanghoa");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function HanghoaAdd($idnhacungcap, $idnhasanxuat, $idloaihang, $tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh) {
        $add = $this->connect->prepare("INSERT INTO hanghoa(idnhacungcap, idnhasanxuat, idloaihang, tenhanghoa, mota, giathamkhao, tenhinhanh, hinhanh) VALUES (?,?,?,?,?,?,?,?)");

        $add->execute(array($idnhacungcap, $idnhasanxuat, $idloaihang, $tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh));

        return $add->rowCount();
    }

    public function HanghoaDelete($idhanghoa) {
        $del = $this->connect->prepare("delete from hanghoa where idhanghoa=?");
        $del->execute(array($idhanghoa));

        return $del->rowCount();
    }

    public function HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa) {
        $update = $this->connect->prepare("UPDATE hanghoa SET "
                . "tenhanghoa = ?, mota = ?, giathamkhao = ?, tenhinhanh = ?, hinhanh = ?,idloaihang = ?"
                . " WHERE idhanghoa = ?");
        $update->execute(array($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa));

        return $update->rowCount();
    }

    public function HanghoaGetbyId($idhanghoa) {
        $getTk = $this->connect->prepare("select * from hanghoa where idhanghoa=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idhanghoa));

        return $getTk->fetch();
    }

    public function HanghoaGetbyIdloaihang($idloaihang) {
        $getTk = $this->connect->prepare("select * from hanghoa where idloaihang=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idloaihang));

        return $getTk->fetchAll();
    }
    
    public function HanghoaGetbyIdNSX($idnhasanxuat) {
        $getTk = $this->connect->prepare("select * from hanghoa where idnhasanxuat=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idnhasanxuat));

        return $getTk->fetchAll();
    }
    
    public function HanghoaGetbyImg($idhanghoa) {
        $getTk = $this->connect->prepare("select hinhanh from hanghoa where idhanghoa=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idhanghoa));

        return $getTk->fetch();
    }

}

?>
