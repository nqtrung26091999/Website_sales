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

class khachhang extends database {

    public function UserCheckLogin($username, $password) {
        $select = $this->connect->prepare("select * from khachhang "
                . "where username = ? and password = ? and ability=1");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username, $password));

        if (count($select->fetchAll()) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function UserCheckUsername($username) {
        $select = $this->connect->prepare("select * from khachhang where username = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));

        if (count($select->fetchAll()) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function UserGetAll() {
        $getAll = $this->connect->prepare("select * from khachhang");
        $getAll->setFetchMode(PDO:: FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function UserDelete($iduser) {
        $del = $this->connect->prepare("delete from khachhang where iduser=?");

        $del->execute(array($iduser));

        return $del->rowCount();
    }

    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
        $add = $this->connect->prepare("INSERT INTO khachhang(username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai)
                VALUES (?,?,?,?,?,?,?)");

        $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));

        return $add->rowCount();
    }

    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser) {
        $update = $this->connect->prepare("UPDATE khachhang SET " . "username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ? ,dienthoai = ?" . "WHERE iduser = ?");
        $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
        return $update->rowCount();
    }

    public function UserGetbyId($iduser) {
        $getTk = $this->connect->prepare("select * from khachhang where iduser=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($iduser));
        return $getTk->Fetch();
    }

    public function UserGetbyUserName($username) {
        $getTk = $this->connect->prepare("select * from khachhang where username=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($username));
        return $getTk->Fetch();
    }

    public function UserSetPassword($iduser, $password) {
        $update = $this->connect->prepare("update khachhang set password=? where iduser=?");

        $update->execute(array($password, $iduser));

        return $update->rowCount();
    }

    public function UserSetActive($iduser, $ability) {
        $update = $this->connect->prepare("update khachhang set ability=? where iduser=?");

        $update->execute(array($ability, $iduser));

        return $update->rowCount();
    }

    public function UserChangePassword($username, $passwordold, $passwordnew) {
        $selectMK = $this->connect->prepare("select password from khachhang where username =?");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($username));

        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($passwordold == $temp->password) {
                $update = $this->connect->prepare("update khachhang set password=? where username =?");

                $update->execute(array($passwordnew, $username));
                return $update->rowCount();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
  

}
