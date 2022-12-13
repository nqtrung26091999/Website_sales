<?php
session_start();
?>
<?php
require './administrator/element_FN/mod/khachhangCls.php';
require './administrator/element_FN/mod/hanghoaCls.php';
require './administrator/element_FN/mod/nhanvienCls.php';
require './administrator/element_FN/mod/giohangCls.php';

if (isset($_SESSION['USER'])) {
    $username = $_SESSION['USER'];
}
if (isset($_SESSION['ADMIN'])) {
    $username = $_SESSION['ADMIN'];
}
$khachhang = new khachhang();
$name = $khachhang->UserGetbyUserName($username);

$hanghoa = new hanghoa();
$idhanghoa = $_GET['idhanghoa'];
$getgia = $hanghoa->HanghoaGetbyId($idhanghoa);

$nhanvien = new nhanvien();
$loainhanvien = "THANH TOÁN";
$idnhanvien = $nhanvien->NhanVienGetbyLoaiNhanVien($loainhanvien);

$giohang = new giohang();
$list_cart = $giohang->GioHangGetAll();
$s_cart = count((array) $list_cart);
?>
<meta charset="UTF-8">
<title>Trang sản phẩm hàng hóa tiêu dùng giải trí</title>
<link type="text/css" rel="stylesheet" href="public_files/pmycss.css"/>
<div id="lvThree_p">
    <div class="row_div">
        <div class="left_div">
            <h1>THANH TOÁN</h1>
            <div class="left_form">
                <form name="form_payment" method="post" action="./administrator/element_FN/mHoadon/hoadonAct.php?request=addorder">
                    <input type="hidden" name="iduser" value="<?php echo $name->IDUSER; ?>"/>
                    <input type="hidden" name="ngaylaphoadon" value="<?php
                    $today = date("d/m/Y");
                    echo $today;
                    ?>"/>
                    <input type="hidden" name="idnhanvien" value="<?php echo $idnhanvien->IDNHANVIEN; ?>"/>
                    <table>
                        <tr>
                            <td>Họ tên:</td>
                            <td><input type="text" name="hoten" value="<?php echo $name->HOTEN; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán:</td>
                            <td><input type="radio" name="phuongthucthanhtoan" value="Trả tiền mặt">Trả tiền mặt</td>
                            <td><input type="radio" name="phuongthucthanhtoan" value="Chuyển khoản">Chuyển khoản</td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm:</td>                                                          
                            <td><input type="text" name="tenhanghoa" value="<?php
                                foreach ($list_cart as $value) {
                                    $idhanghoa = $value->IDHANGHOA;
                                    $tenhanghoa = $hanghoa->HanghoaGetbyId($idhanghoa);
                                    echo $tenhanghoa->TENHANGHOA . "+";
                                }
                                ?>">
                            </td>



                        </tr>
                        <tr>
                            <td>Ảnh sản phẩm:</td>
                            <td>
                                <?php
                                foreach ($list_cart as $val) {
                                    $idhanghoa = $val->IDHANGHOA;
                                    $hinhanh = $hanghoa->HanghoaGetbyId($idhanghoa);
                                    ?><img class="iconimg" src='data:image/png;base64,<?php echo ($hinhanh->HINHANH); ?>'/><?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giá sản phẩm:</td>
                            <td>
                                <?php
                                foreach ($list_cart as $v) {
                                    $idhanghoa = $v->IDHANGHOA;
                                    $giacart = $hanghoa->HanghoaGetbyId($idhanghoa);
                                    $tong += $giacart->GIATHAMKHAO;
                                }
                                ?>
                                <input type="text" name="giahoadon" value="<?php echo $tong; ?>đ">
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ giao hàng:</td>
                            <td><textarea name="diachigiaohang" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td>Ghi chú:</td>
                            <td><textarea name="ghichu" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="dienthoai"></td>
                        </tr>
                        <tr>
                            <td>Số lượng:</td>
                            <td><input type="hidden" name="soluonghanghoa" value="1"><?php echo $s_cart; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Thanh toán"></td>
                        </tr>
                    </table>
                </form>              
            </div>
        </div>
        <div class="right_div"></div>
    </div>
    <div class="bottom_div"></div>
</div>

