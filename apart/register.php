<link href="../public_files/pmycss.css" rel="stylesheet" type="text/css"/>
<script src="../javascript/javascript.js" type="text/javascript"></script>

<div class="content_rg">

    <div class="rg_overlay"></div>
    <div class="rs_list">
        <tempsclose id="close_cart"><img id="img_close_cart" src="./administrator/img_FN/close.png"/></tempsclose>
        <div class="mess_rg">Đăng ký</div>
            <form name="newuser" id="" method="post" action="./administrator/element_FN/mKhachhang/userAct.php?reqact=addnew">
                <table class="table_rg">
                    <tr>
                        <td>Tên đăng nhập:</td>
                        <td><input type="text" name="username"/></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu:</td>
                        <td><input type="password" name="password"/></td>
                    </tr>
                    <tr>
                        <td>Họ tên:</td>
                        <td><input type="text" name="hoten"/></td>
                    </tr>
                    <tr>
                        <td>Giới tính:</td>
                        <td>Nam<input type="radio" name="gioitinh" value="1" checked="true"/>
                            Nữ<input type="radio" name="gioitinh" value="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh:</td>
                        <td><input type="date" name="ngaysinh"/></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><input type="text" name="diachi"/></td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td><input type="tel" name="dienthoai"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                        <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
                    </tr>
                </table>
            </form>
    </div>
</div>
