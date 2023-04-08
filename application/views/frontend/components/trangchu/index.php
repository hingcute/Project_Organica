<section id="menu-slider">
    <div class="slider">
        <div class="container">
           <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 list-menu pull-left" style="height: 321px;">
             <img style="width: 100%; height: 160px;" src="public/images/Right-banner.png">
             <img style="width: 100%; height: 160px;" src="public/images/banner2.png">
         </div>
         <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 slider-main pull-left">
            <?php 
            $this->load->view('frontend/modules/slider');
            ?>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span><img src="http://localhost/organica/public/images/hot.gif" alt=""> KHUYẾN MÃI HOT <img src="http://localhost/organica/public/images/hot.gif" alt=""></span>
    </div>
</div>
<div class="container" style="margin-bottom: 20px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #0fd872;">
        <?php 
        $product_sale = $this->Mproduct->product_sale(10);
        foreach ($product_sale as $row) :?>
            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                        </a>

                        <?php if($row['sale'] > 0) :?>
                            <div class="giam-percent">
                                <span class="text-giam-percent">Giảm <?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="lt-product-group-info">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" style="text-align: left;">
                            <h3><?php echo $row['name'] ?></h3>
                        </a>
                        <div class="price-box">
                            <?php if($row['sale'] > 0) :?>

                                <p class="old-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                                </p>
                                <?php else: ?>
                                 <p class="old-price">
                                    <span class="price" style="color: #fff"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                            <?php endif;?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span><img src="http://localhost/organica/public/images/hot.gif" alt=""> SẢN PHẨM BÁN CHẠY NHẤT <img src="http://localhost/organica/public/images/hot.gif" alt=""></span>
    </div>
</div>
<div class="container" style="margin-bottom: 20px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #0fd872;">
        <?php 
        $product_sale = $this->Mproduct->product_selling(10);
        foreach ($product_sale as $row) :?>
            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                        </a>
                        <?php if($row['sale'] > 0) :?>
                            <div class="giam-percent">
                                <span class="text-giam-percent">Giảm <?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="lt-product-group-info">
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" style="text-align: left;">
                            <h3><?php echo $row['name'] ?></h3>
                        </a>
                        <div class="price-box">
                            <?php if($row['sale'] > 0) :?>

                                <p class="old-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                                </p>
                                <?php else: ?>
                                 <p class="old-price">
                                    <span class="price" style="color: #fff"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                </p>
                            <?php endif;?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

</section>
<div id="content">
    <div class="container">
        <?php 
        $listCategory=$this->Mcategory->category_list(0,'10');
        foreach ($listCategory as $rowCategory):
            // row dien thoai
            $subCategory=$this->Mcategory->category_list($rowCategory['id'],'10');
            // Id dien thoai
            $catId=$this->Mcategory->category_id($rowCategory['link']);
            // list id dt ss, apple,...
            $listCatId=$this->Mcategory->category_listcat($catId);
            // list dt ss, apple
            $listProducts=$this->Mproduct->product_home_limit($listCatId,10);
            if((count($listProducts) >= 3)):?>
                <div class="list-product">
                    <div class="list-header-z">
                        <h2><a href="<?php echo  $rowCategory['link']?>"> <img src="http://localhost/organica/public/images/hot.gif" alt=""> <?php echo  $rowCategory['name']?> nổi bật <img src="http://localhost/organica/public/images/hot.gif" alt=""></a></h2>
                        <b><ul class="sub-category">
                            <?php foreach ($subCategory as $rowSubCategory) :?>
                                <li>
                                    <a href="san-pham/<?php echo $rowSubCategory['link'] ?>"
                                        title="<?php echo $rowSubCategory['name'] ?>"
                                        class="ws-nw overflow ellipsis"
                                        >
                                        <?php echo $rowSubCategory['name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul></b>
                    </div>
                    <div class="product-container">
                        <?php foreach ($listProducts as $sp) :?>
                            <div class="p-box-5">
                                <div class="product-lt">
                                    <div class="lt-product-group-image">
                                        <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" >
                                            <img class="img-p"src="public/images/products/<?php echo $sp['avatar'] ?>" alt="">
                                        </a>

                                        <?php if($sp['sale'] > 0) :?>
                                            <div class="giam-percent">
                                                <span class="text-giam-percent">Giảm <?php echo $sp['sale'] ?>%</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="lt-product-group-info">
                                        <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" style="text-align: left;">
                                            <h3><?php echo $sp['name'] ?></h3>
                                        </a>
                                        <div class="price-box">
                                            <?php if($sp['sale'] > 0) :?>

                                                <p class="old-price">
                                                    <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price"><?php echo(number_format($sp['price_sale'])); ?>₫</span>
                                                </p>
                                                <?php else: ?>
                                                 <p class="old-price">
                                                    <span class="price" style="color: #fff"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                                <p class="special-price">
                                                    <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                                </p>
                                            <?php endif;?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>

<div class="home-blog">
    <div class="container">
        <div class="row-p">
            <div class="text-center">
                <h2 class="sectin-title title title-blue"> <img src="http://localhost/organic/upload/icon/hot.gif" alt=""> Tin tức <img src="http://localhost/organic/upload/icon/hot.gif" alt=""></h2>
            </div>
        </div>
        <div class="blog-content">
            <?php  
            $listBaiViet=$this->Mcontent->content_list_home(6, 'all');
            foreach ($listBaiViet as $rowPost) :?>
                <div class="col-xs-12 col-12 col-sm-6 col-md-4 col-lg-4" style="margin: 5px;">
                    <div class="latest">
                        <a href="tin-tuc/<?php echo $rowPost['alias'] ?>">
                            <div class="tempvideo">
                                <img width="98%" src="public/images/posts/<?php echo $rowPost['img'] ?>">
                            </div>
                            <h3 style="color: #999;"><?php echo $rowPost['title'] ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="adv">
    <section id="service" style="margin: 20px;">
        <div class="container">
            <div class="row">
                <div id="service_home" class="clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/icon_142e7.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Miễn phí giao hàng
                                </span>
                                <span class="small-text">
                                    Cho hóa đơn từ 500,000 đ
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/icon_242e7.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Giao hàng trong ngày
                                </span>
                                <span class="small-text">
                                    Với tất cả đơn hàng
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                        <div class="service_item">
                            <div class="icon icon_product">
                                <img src="public/images/icon_342e7.png" alt="">
                            </div>
                            <div class="description_icon">
                                <span class="large-text">
                                    Sản phẩm an toàn
                                </span>
                                <span class="small-text">
                                    Cam kết chính hãng
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Begin-->
    <!--End-->
</div>
<!--=== BEGIN: SITE PHẢI ===-->
<style type="text/css">
    .alo-ph-img-circle{width:30px;height:30px;top:35px;left:35px;position:absolute;background:rgba(30,30,30,0.1) url(https://1.bp.blogspot.com/-UbTOXZnLovo/V9kU1RLbX4I/AAAAAAAAGYA/4qQQ0CBifcM8IlNe7f-aVL2Ln-wzLcF4wCLcB/s1600/alo.png) no-repeat center center;background-size:contain;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;opacity:.7;-webkit-animation:alo-circle-img-anim 1s infinite ease-in-out;-moz-animation:alo-circle-img-anim 1s infinite ease-in-out;-ms-animation:alo-circle-img-anim 1s infinite ease-in-out;-o-animation:alo-circle-img-anim 1s infinite ease-in-out;animation:alo-circle-img-anim 1s infinite ease-in-out;-webkit-transform-origin:50% 50%;-moz-transform-origin:50% 50%;-ms-transform-origin:50% 50%;-o-transform-origin:50% 50%;transform-origin:50% 50%}.alo-phone{position:fixed;visibility:hidden;background-color:transparent;width:100px;height:100px;cursor:pointer;z-index:999;-webkit-backface-visibility:hidden;-webkit-transform:translateZ(0);-webkit-transition:visibility .5s;-moz-transition:visibility .5s;-o-transition:visibility .5s;transition:visibility .5s;right:0;top:0}.alo-phone.alo-show{visibility:visible}.alo-phone:hover{opacity:1}.alo-ph-circle{width:100px;height:100px;top:0;left:0;position:absolute;background-color:transparent;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid rgba(30,30,30,0.4);border:2px solid #bfebfc ;opacity:.1;-webkit-animation:alo-circle-anim 1.2s infinite ease-in-out;-moz-animation:alo-circle-anim 1.2s infinite ease-in-out;-ms-animation:alo-circle-anim 1.2s infinite ease-in-out;-o-animation:alo-circle-anim 1.2s infinite ease-in-out;animation:alo-circle-anim 1.2s infinite ease-in-out;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;-webkit-transform-origin:50% 50%;-moz-transform-origin:50% 50%;-ms-transform-origin:50% 50%;-o-transform-origin:50% 50%;transform-origin:50% 50%}.alo-phone:hover .alo-ph-circle,.hotline&gt;a:hover .alo-ph-circle{border-color:#00aff2;opacity:.5}.alo-phone.alo-green:hover .alo-ph-circle,.hotline&gt;a:hover .alo-ph-circle{border-color:#04AFEF;border-color:#baf5a7 ;opacity:.5}.alo-phone.alo-green .alo-ph-circle{border-color:#ffbc0a;border-color:#bfebfc ;opacity:.5}.alo-ph-circle-fill{width:60px;height:60px;top:20px;left:20px;position:absolute;background-color:#000;-webkit-border-radius:100%;-moz-border-radius:100%;border-radius:100%;border:2px solid transparent;opacity:.1;-webkit-animation:alo-circle-fill-anim 2.3s infinite ease-in-out;-moz-animation:alo-circle-fill-anim 2.3s infinite ease-in-out;-ms-animation:alo-circle-fill-anim 2.3s infinite ease-in-out;-o-animation:alo-circle-fill-anim 2.3s infinite ease-in-out;animation:alo-circle-fill-anim 2.3s infinite ease-in-out;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;-webkit-transform-origin:50% 50%;-moz-transform-origin:50% 50%;-ms-transform-origin:50% 50%;-o-transform-origin:50% 50%;transform-origin:50% 50%}.alo-phone:hover .alo-ph-circle-fill,.hotline&gt;a:hover .alo-ph-circle-fill{background-color:rgba(0,175,242,0.5);background-color:#00aff2 ;opacity:.75!important}.alo-phone.alo-green:hover .alo-ph-circle-fill,.hotline&gt;a:hover .alo-ph-circle-fill{background-color:rgba(4,175,239,0.5);background-color:#baf5a7 ;opacity:.75!important}.alo-phone.alo-green .alo-ph-circle-fill{background-color:rgba(255,188,10,0.5);background-color:#ffbc0a ;opacity:.75!important}.alo-phone:hover .alo-ph-img-circle,.hotline&gt;a:hover .alo-ph-img-circle{background-color:#00aff2}.alo-phone.alo-green.alo-hover .alo-ph-img-circle,.alo-phone.alo-green:hover .alo-ph-img-circle,.hotline&gt;a:hover .alo-ph-img-circle{background-color:#04AFEF;background-color:#04AFEF}.alo-phone.alo-green .alo-ph-img-circle{background-color:#ffbc0a;background-color:#ffbc0a }@-moz-keyframes alo-circle-anim{0%{transform:rotate(0) scale(.5) skew(1deg);opacity:.1}30%{transform:rotate(0) scale(.7) skew(1deg);opacity:.5}100%{transform:rotate(0) scale(1) skew(1deg);opacity:.1}}@-webkit-keyframes alo-circle-anim{0%{transform:rotate(0) scale(.5) skew(1deg);opacity:.1}30%{transform:rotate(0) scale(.7) skew(1deg);opacity:.5}100%{transform:rotate(0) scale(1) skew(1deg);opacity:.1}}@-o-keyframes alo-circle-anim{0%{transform:rotate(0) scale(.5) skew(1deg);opacity:.1}30%{transform:rotate(0) scale(.7) skew(1deg);opacity:.5}100%{transform:rotate(0) scale(1) skew(1deg);opacity:.1}}@keyframes alo-circle-anim{0%{transform:rotate(0) scale(.5) skew(1deg);opacity:.1}30%{transform:rotate(0) scale(.7) skew(1deg);opacity:.5}100%{transform:rotate(0) scale(1) skew(1deg);opacity:.1}}@-moz-keyframes alo-circle-fill-anim{0%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}50%{transform:rotate(0) scale(1) skew(1deg);opacity:.2}100%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}}@-webkit-keyframes alo-circle-fill-anim{0%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}50%{transform:rotate(0) scale(1) skew(1deg);opacity:.2}100%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}}@-o-keyframes alo-circle-fill-anim{0%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}50%{transform:rotate(0) scale(1) skew(1deg);opacity:.2}100%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}}@keyframes alo-circle-fill-anim{0%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}50%{transform:rotate(0) scale(1) skew(1deg);opacity:.2}100%{transform:rotate(0) scale(.7) skew(1deg);opacity:.2}}@-moz-keyframes alo-circle-img-anim{0%{transform:rotate(0) scale(1) skew(1deg)}10%{transform:rotate(-25deg) scale(1) skew(1deg)}20%{transform:rotate(25deg) scale(1) skew(1deg)}30%{transform:rotate(-25deg) scale(1) skew(1deg)}40%{transform:rotate(25deg) scale(1) skew(1deg)}50%{transform:rotate(0) scale(1) skew(1deg)}100%{transform:rotate(0) scale(1) skew(1deg)}}@-webkit-keyframes alo-circle-img-anim{0%{transform:rotate(0) scale(1) skew(1deg)}10%{transform:rotate(-25deg) scale(1) skew(1deg)}20%{transform:rotate(25deg) scale(1) skew(1deg)}30%{transform:rotate(-25deg) scale(1) skew(1deg)}40%{transform:rotate(25deg) scale(1) skew(1deg)}50%{transform:rotate(0) scale(1) skew(1deg)}100%{transform:rotate(0) scale(1) skew(1deg)}}@-o-keyframes alo-circle-img-anim{0%{transform:rotate(0) scale(1) skew(1deg)}10%{transform:rotate(-25deg) scale(1) skew(1deg)}20%{transform:rotate(25deg) scale(1) skew(1deg)}30%{transform:rotate(-25deg) scale(1) skew(1deg)}40%{transform:rotate(25deg) scale(1) skew(1deg)}50%{transform:rotate(0) scale(1) skew(1deg)}100%{transform:rotate(0) scale(1) skew(1deg)}}@keyframes alo-circle-img-anim{0%{transform:rotate(0) scale(1) skew(1deg)}10%{transform:rotate(-25deg) scale(1) skew(1deg)}20%{transform:rotate(25deg) scale(1) skew(1deg)}30%{transform:rotate(-25deg) scale(1) skew(1deg)}40%{transform:rotate(25deg) scale(1) skew(1deg)}50%{transform:rotate(0) scale(1) skew(1deg)}100%{transform:rotate(0) scale(1) skew(1deg)}}#alo-fixed{visibility:visible;opacity:0;position:fixed;right:-100px;top:100px}#alo-fixed.show{right:10px;visibility:visible;opacity:1}

</style>

<a href="tel:0398031130" rel="nofollow" > <div class="alo-phone alo-green alo-show"> <div class="alo-ph-circle"></div> <div class="alo-ph-circle-fill"></div> <div class="alo-ph-img-circle"></div> </div></a>
<!--=== CALL LIÊN HỆ ĐỘNG ===-->

<!--=== FOOTER LIÊN HỆ NGANG ===-->


<div class="bottom_support" style="z-index:999px;"> <div class="wrap_bottom">   <div class="hotline_bottom">           <span class="ico"><img src="https://1.bp.blogspot.com/-2t8Fkz-XcxY/V34e6T2c2zI/AAAAAAAAFTU/TljIpi_TLjs1HttVtsWB-mEsS1fPrAhpwCLcB/s1600/bottom_support_ico_phone.png"/></span>          <div class="txt">Hotline: <strong>0398.031.130</strong> <span>(kỹ thuật)</span> - <strong>039.222.0884</strong> <span>(CSKH)</span></div>         </div>         <div class="guide_payment">          <a target="_blank" href="http://localhost/organica/tin-tuc/huong-dan-thanh-toan-khi-mua-hang">              <span class="ico"><img src="https://4.bp.blogspot.com/-HcT7Kt4C8VA/V34fL1DNrWI/AAAAAAAAFTc/UI3fSHd7TesOTyf94TjnShxvy8quhImLACLcB/s1600/bottom_support_ico_guidepayment.png"/></span>                 <span class="txt">Hướng dẫn thanh toán</span>             </a>         </div>         <div class="advisory_online">          <a target="_blank" href="https://www.facebook.com/hingcutehiuhok/">              <span class="ico"><img src="https://2.bp.blogspot.com/-C5F14CaOBhc/V34fL7_9p8I/AAAAAAAAFTY/QaXidsUV5xk_GaKaDZY8XW2lHMNT0XUkwCLcB/s1600/bottom_support_ico_advisoryonline.png"/></span>                 <span class="txt">Tư vấn online</span>             </a>         </div>     </div> </div>
<style type="text/css">
  /* contact B1909922 start */.bottom_support{height:45px;width:100%;position:fixed;bottom:0;background:#32a22d;font-family:'Roboto Condensed', sans-serif;color:#fff;line-height:45px;z-index:9999} .bottom_support a{font-family:'Roboto Condensed', sans-serif;color:#fff;line-height:45px;font-size:18px} .wrap_bottom{max-width:1380px;margin:0 auto} .bottom_support .hotline_bottom{background:#32a22d;width:40%;float:left;font-size:16px;margin-left:5%;position:relative} .bottom_support .hotline_bottom .ico{width:16%;position:absolute;bottom:0} .bottom_support .hotline_bottom .txt{margin-left:16%} .bottom_support .hotline_bottom .ico img{max-width:100%} .bottom_support .hotline_bottom strong{font-weight:bold;font-size:19px} .bottom_support .hotline_bottom span{font-size:13px} .bottom_support .guide_payment{background:linear-gradient(-60deg, #177814 90%, #32a22d 50%) no-repeat;width:25%;float:left;position:relative} .bottom_support .guide_payment .ico{width:20%;position:absolute;bottom:-25%;left:15%} .bottom_support .guide_payment .ico img{max-width:100%} .bottom_support .guide_payment .txt{margin-left:35%} .bottom_support .advisory_online{background:linear-gradient(-60deg, #014f01 90%, #177814 50%) no-repeat;width:30%;float:left;position:relative} .bottom_support .advisory_online .ico{width:20%;position:absolute;bottom:-10%;left:15%} .bottom_support .advisory_online .ico img{max-width:100%;float:left;margin-top:-20px} .bottom_support .advisory_online .txt{margin-left:35%} @media screen and (max-width:1200px){.bottom_support .hotline_bottom{width:45%} .bottom_support .hotline_bottom .ico{width:12%} .bottom_support .hotline_bottom .txt{margin-left:12%} .bottom_support .guide_payment{width:25%} .bottom_support .guide_payment .ico{bottom:-15%} .bottom_support .advisory_online{width:25%} .bottom_support .advisory_online .ico{bottom:0} } @media screen and (max-width:1000px){.bottom_support{height:40px;line-height:40px} .bottom_support a{font-size:17px;line-height:40px} .bottom_support .hotline_bottom{margin-left:2%;width:48%} .bottom_support .guide_payment .ico{bottom:0;left:7%} .bottom_support .guide_payment .txt{margin-left:27%} .bottom_support .advisory_online .ico{bottom:10%;left:10%} .bottom_support .advisory_online .txt{margin-left:30%} } @media screen and (max-width:820px){.bottom_support{height:30px;line-height:30px} .bottom_support a{font-size:15px;line-height:30px} .bottom_support .hotline_bottom{font-size:15px} .bottom_support .hotline_bottom strong{font-size:18px} .bottom_support .hotline_bottom span{font-size:12px} } @media screen and (max-width:720px){.bottom_support a,.bottom_support .hotline_bottom{font-size:13px} .bottom_support .hotline_bottom strong{font-size:15px} } @media screen and (max-width:620px){.bottom_support{height:25px;line-height:25px} .bottom_support a{font-size:11px;line-height:25px} .bottom_support .hotline_bottom{margin-left:0;width:50%;font-size:11px} .bottom_support .hotline_bottom strong{font-size:15px} .bottom_support .hotline_bottom span{font-size:11px} } @media screen and (max-width:560px){.bottom_support{height:20px;line-height:20px} .bottom_support img{display:none} .bottom_support a{font-size:10px;line-height:20px} .bottom_support .hotline_bottom,.bottom_support .hotline_bottom span{font-size:10px} .bottom_support .hotline_bottom strong{font-size:13px} .bottom_support .hotline_bottom .txt{margin-left:1%} .bottom_support .guide_payment .txt,.bottom_support .advisory_online .txt{margin-left:15%}} @media screen and (max-width:440px){.bottom_support .hotline_bottom{width:55%} .bottom_support .guide_payment{width:27%} .bottom_support .advisory_online{width:18%}} @media screen and (max-width:400px){.bottom_support a,.bottom_support .hotline_bottom,.bottom_support .hotline_bottom span{font-size:9px} .bottom_support .hotline_bottom strong{font-size:12px}} @media screen and (max-width:340px){.bottom_support a,.bottom_support .hotline_bottom,.bottom_support .hotline_bottom span{font-size:8px} }

</style>
</footer>

<!--=== ĐÓNG LIÊN HỆ NGANG ===-->

<!--=== CHATBOX ===-->
<script id="chatBroEmbedCode">
/* Chatbro Widget Embed Code Start */
function ChatbroLoader(chats,async){async=!1!==async;var params={embedChatsParameters:chats instanceof Array?chats:[chats],lang:navigator.language||navigator.userLanguage,needLoadCode:'undefined'==typeof Chatbro,embedParamsVersion:localStorage.embedParamsVersion,chatbroScriptVersion:localStorage.chatbroScriptVersion},xhr=new XMLHttpRequest;xhr.withCredentials=!0,xhr.onload=function(){eval(xhr.responseText)},xhr.onerror=function(){console.error('Chatbro loading error')},xhr.open('GET','//www.chatbro.com/embed.js?'+btoa(unescape(encodeURIComponent(JSON.stringify(params)))),async),xhr.send()}
/* Chatbro Widget Embed Code End */
ChatbroLoader({encodedChatId: '67RR7'});
</script>
<!--=== ĐÓNG CHATBOX ===-->
