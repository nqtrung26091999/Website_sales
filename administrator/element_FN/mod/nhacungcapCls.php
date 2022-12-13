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

class nhacungcap extends Database {

    public function NhaCungCapGetAll() {
        $getAll = $this->connect->prepare("select * from nhacungcap");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function NhaCungCapAdd($tennhacungcap, $lienhe, $soluong, $ngaycungcap) {
        $add = $this->connect->prepare("INSERT INTO nhacungcap(tennhacungcap, lienhe, soluong, ngaycungcap) VALUES (?,?,?,?)");

        $add->execute(array($tennhacungcap, $lienhe, $soluong, $ngaycungcap));

        return $add->rowCount();
    }

    public function NhaCungCapDelete($idnhacungcap) {
        $del = $this->connect->prepare("delete from nhacungcap where idnhacungcap=?");
        $del->execute(array($idnhacungcap));

        return $del->rowCount();
    }

    public function NhaCungCapUpdate($tennhacungcap, $lienhe, $soluong, $ngaycungcap, $idnhacungcap) {
        $update = $this->connect->prepare("UPDATE nhacungcap SET "
                . "tennhacungcap = ?, lienhe = ?, soluong = ?, ngaycungcap = ?"
                . " WHERE idnhacungcap = ?");
        $update->execute(array($tennhacungcap, $lienhe, $soluong, $ngaycungcap, $idnhacungcap));

        return $update->rowCount();
    }
    public function NhaCungCapGetbyId($idnhacungcap) {
        $getTk = $this->connect->prepare("select * from nhacungcap where idnhacungcap=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idnhacungcap));
        return $getTk->Fetch(); 
    }

}

?>
