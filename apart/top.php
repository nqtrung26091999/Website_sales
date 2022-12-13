<div class="content_top">
    <?php
    if (isset($_SESSION['USER']) || isset($_SESSION['ADMIN'])) {
    } else {
        ?>
        <div class="content_top__item">
            <div class="content_top__item"><a href="./administrator/userLogin.php" class="item_top">Đăng nhập</a></div>
        </div>
        <?php
    }
    ?>
    
    <div class="content_top__item">
        <tempsrg>
            <a class="item_top">Đăng ký</a>
        </tempsrg>
    </div>
    <?php
    if (isset($_SESSION['USER'])) {
        
    } else {
        ?>
        <div class="content_top__item">
            <a href="./administrator/index.php" class="item_top">Quản lý</a>
        </div>
        <?php
    }
    ?>


    <div class="content_top__item">
        <tempscart>
            <a class="item_top_cart">Giỏ hàng</a>
        </tempscart>
    </div>
    <div class="content_top__item"><a class="item_top">Liên hệ</a></div>
</div>