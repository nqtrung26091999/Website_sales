$(document).ready(function () {
//    alert("JQ đã chạy rồi !");

    $("p").mouseenter(function () {
        $(this).css("color", "#00FF00");
    });
    $("p").mouseleave(function () {
        $(this).css("color", "#000066");
    });

    $(".cls01").mouseenter(function () {
        $(this).css("color", "#FF0000");
    });
    $(".cls01").mouseleave(function () {
        $(this).css("color", "#0000FF");
    });


    $("#id01").mouseenter(function () {
        $(this).css("color", "#AA00BB");
        $(this).css("font-weight", "bold");
    });
    $("#id01").mouseleave(function () {
        $(this).css("color", "#BB0000");
        $(this).css("font-weight", "normal");
    });
////menu

    $(".itemOrder").hide();
    $(".cateOrder").click(function () {
        $(this).next().slideDown();
    });
    $(".itemOrder").mouseleave(function () {
        $(this).slideUp();
    });

//     slide image
    $(".imgCls").mouseover(function () {
        var s = $(this).attr('src');
//        alert(s);
        $("#imgView").attr('src', s);

        var s = $("#DivList").children();
        var l = s.length;
        var i = 0;
        setInterval(function () {
            if (i === l)
                i = 0;
            var p = $(s[i]).attr('src');
            $("#imgView").attr('src', p);
            i++;
        }, 3000);
    });


//    menudangnhap
    $('#formreg').submit(function () {
        var username = $("input[name*='username']").val();
        if (username.length === 0 || username.length < 6) {
            $("input[name*='username']").focus();
            $('#noteForm').html("Username chưa hợp lệ!");
            return false;
        }
        var password = $("input[name*='password']").val();
        if (password.length === 0 || password.length < 6) {
            $("input[name*='password']").focus();
            $('#noteForm').html("Password chưa hợp lệ!");
            return false;
        }
        var hoten = $("input[name*='hoten']").val();
        if (hoten.length === 0 || hoten.length < 6) {
            $("input[name*='hoten']").focus();
            $('#noteForm').html("Họ tên chưa hợp lệ!");
            return false;
        }
        var ngaysinh = $("input[name*='ngaysinh']").val();
        if (ngaysinh.length === 0) {
            $("input[name*='ngaysinh']").focus();
            $('#noteForm').html("Ngày sinh chưa hợp lệ!");
            return false;
        }
        var diachi = $("input[name*='diachi']").val();
        if (diachi.length === 0) {
            $("input[name*='diachi']").focus();
            $('#noteForm').html("Địa chỉ chưa hợp lệ!");
            return false;
        }
        var dienthoai = $("input[name*='dienthoai']").val();
        if (dienthoai.length === 0) {
            $("input[name*='dienthoai']").focus();
            $('#noteForm').html("Điện thoại chưa hợp lệ!");
            return false;
        }
        return true;
    });
//btnupdate
    $("temps").click(function () {
        var iduser = $(this).attr("value");
        $("#right_inner").load("./element_FN/mUser/userUpdate.php?iduser=" + iduser);
    });
//    btnupdateloaihang
        $("tempsloaihang").click(function () {
        var idloaihang = $(this).attr("value");
        $("#right_inner").load("./element_FN/mLoaihang/loaihangUpdate.php?idloaihang=" + idloaihang);
    });
    $("temphanghoa").click(function () {
        var idhanghoa = $(this).attr("value");
        $("#right_inner").load("./element_FN/mHanghoa/hanghoaUpdate.php?idhanghoa=" + idhanghoa);
    });
    //nhanvienview
    $("tempsnhanvien").click(function () {
        var idnhanvien = $(this).attr("value");
        $("#right_inner").load("./element_FN/mNhanvien/nhanvienUpdate.php?idnhanvien=" + idnhanvien);
    });
    //NHACUNGCAP
    $("tempsnhacungcap").click(function () {
        var idnhacungcap = $(this).attr("value");
        $("#right_inner").load("./element_FN/mNhacungcap/nhacungcapUpdate.php?idnhacungcap=" + idnhacungcap);
    });
    //nhan san xuat
    $("tempsnhasanxuat").click(function () {
        var idnhasanxuat = $(this).attr("value");
        $("#right_inner").load("./element_FN/mNhasanxuat/nhasanxuatUpdate.php?idnhasanxuat=" + idnhasanxuat);
    });
    
    
});
