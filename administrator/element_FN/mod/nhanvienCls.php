
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

class nhanvien extends database {

    
    public function NhanVienGetAll() {
        $getAll = $this->connect->prepare("select * from nhanvien");
        $getAll->setFetchMode(PDO:: FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function NhanVienDelete($idnhanvien) {
        $del = $this->connect->prepare("delete from nhanvien where idnhanvien=?");

        $del->execute(array($idnhanvien));

        return $del->rowCount();
    }

    public function NhanVienAdd($hoten, $ngaysinh, $gioitinh, $loainhanvien) {
        $add = $this->connect->prepare("INSERT INTO nhanvien(hoten, ngaysinh, gioitinh, loainhanvien)
                VALUES (?,?,?,?)");

        $add->execute(array($hoten, $ngaysinh, $gioitinh, $loainhanvien));
        return $add->rowCount();
    }

    public function NhanVienUpdate($hoten, $ngaysinh, $gioitinh, $loainhanvien,$idnhanvien) {
        $update = $this->connect->prepare("UPDATE nhanvien SET " . "hoten = ?, ngaysinh = ?, gioitinh = ?, loainhanvien = ?" . "WHERE idnhanvien = ?");
        $update->execute(array($hoten, $ngaysinh, $gioitinh, $loainhanvien,$idnhanvien));
        return $update->rowCount();
    }

    public function NhanVienGetbyId($idnhanvien) {
        $getTk = $this->connect->prepare("select * from nhanvien where idnhanvien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idnhanvien));
        return $getTk->Fetch(); 
    }
    
    public function NhanVienGetbyLoaiNhanVien($loainhanvien) {
        $getTk = $this->connect->prepare("select * from nhanvien where loainhanvien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($loainhanvien));
        return $getTk->Fetch(); 
    }
}

