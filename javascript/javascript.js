$(document).ready(function () {
    $("tempscart").click(function () {
        $("#div_ajax").load("./apart/cart.php");
    });
// đóng trang
    $('body').on('click', '#img_close_cart', function () {
        $('.content_cart').remove();
    });
    
    $("tempsrg").click(function () {
        $("#div_ajax").load("./apart/register.php");
    });
// đóng trang
    $('body').on('click', '#img_close_cart', function () {
        $('.content_rg').remove();
    });
    
    $("tempschangepass").click(function () {
        var iduser = $(this).attr("value");
        $("#div_ajax").load("./apart/changepass.php?iduser=" + iduser);
    });
   
});