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

class nhasanxuat extends Database {

    public function NhaSanXuatGetAll() {
        $getAll = $this->connect->prepare("select * from nhasanxuat");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function NhaSanXuatAdd($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang) {
        $add = $this->connect->prepare("INSERT INTO nhasanxuat(tennhasanxuat, lienhe, ngaysanxuat, loaihang) VALUES (?,?,?,?)");

        $add->execute(array($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang));

        return $add->rowCount();
    }

    public function NhaSanXuatDelete($idnhasanxuat) {
        $del = $this->connect->prepare("delete from nhasanxuat where idnhasanxuat=?");
        $del->execute(array($idnhasanxuat));

        return $del->rowCount();
    }

    public function NhaSanXuatUpdate($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang, $idnhasanxuat) {
        $update = $this->connect->prepare("UPDATE nhasanxuat SET "
                . "tennhasanxuat = ?, lienhe = ?, ngaysanxuat = ?, loaihang = ?"
                . " WHERE idnhasanxuat = ?");
        $update->execute(array($tennhasanxuat, $lienhe, $ngaysanxuat, $loaihang, $idnhasanxuat));

        return $update->rowCount();
    }
    public function NhaSanXuatGetbyId($idnhasanxuat) {
        $getTk = $this->connect->prepare("select * from nhasanxuat where idnhasanxuat=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idnhasanxuat));
        return $getTk->Fetch(); 
    }

}

?>
