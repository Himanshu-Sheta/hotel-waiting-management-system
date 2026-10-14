<?php
require_once 'conect.php';
$_SESSION[page] = "index";
?>

<!doctype html>

<html lang="en">
    <?php
    require_once 'head.php';
    ?>
    <body class="cms-index-index cms-wendy-home" >
        <div class="wrapper">

            <div class="page">
                <?php
                require_once 'header1.php';
                ?>

                <?php
                require_once 'header2.php';
                ?>


                <div class="banner7-container">
                    <div class="flexslider nivoslider">
                        <div class="loading"></div>
                        <div id="inivoslider-banner7" class="slides">
                            <a href="#" title="Read more">
                                <img src="images/2.jpg" alt="" title="#banner7-caption1"  />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/5.jpg" alt="" title="#banner7-caption2" />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/6.jpg" alt="" title="#banner7-caption3" />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/bg1.jpg" alt="" title="#banner7-caption4" />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/bg2.jpg" alt="" title="#banner7-caption5" />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/bg3.jpg" alt="" title="#banner7-caption6" />
                            </a>
                            <a href="#" title="Read more">
                                <img src="images/bg4.jpg" alt="" title="#banner7-caption7" />
                            </a>

                        </div>
                        <div id="banner7-caption1" class="banner7-caption nivo-html-caption nivo-caption">
                            <div class="timethai" style=" position:absolute;top:0;left:0;background-color: rgba(49, 56, 72, 0.298);height:5px;-webkit-animation: myfirst 6000ms ease-in-out;-moz-animation: myfirst 6000ms ease-in-out;-ms-animation: myfirst 6000ms ease-in-out;animation: myfirst 6000ms ease-in-out;">
                            </div>
                            <div class="banner7-content slider-1">
                                <div class="bannerslideshow">
                                    <h1 class="title1">celebrate life</h1>
                                    <h2 class="title2">beauty  world on my life</h2>
                                    <div class="banner7-readmore">
                                        <a href="allhotel.php" title="Read more">book now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="banner7-caption2" class="banner7-caption nivo-html-caption nivo-caption">
                            <div class="timethai" style=" position:absolute;top:0;left:0;background-color: rgba(49, 56, 72, 0.298);height:5px;-webkit-animation: myfirst 6000ms ease-in-out;-moz-animation: myfirst 6000ms ease-in-out;-ms-animation: myfirst 6000ms ease-in-out;animation: myfirst 6000ms ease-in-out;">
                            </div>
                            <div class="banner7-content slider-2">
                                <div class="bannerslideshow">
                                    <h1 class="title1">hotel world</h1>
                                    <h2 class="title2">enhancing life around greet food </h2>
                                    <div class="banner7-readmore">
                                        <a href="#" title="Read more">shop now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="banner7-caption3" class="banner7-caption nivo-html-caption nivo-caption">
                            <div class="timethai" style=" position:absolute;top:0;left:0;background-color: rgba(49, 56, 72, 0.298);height:5px;-webkit-animation: myfirst 6000ms ease-in-out;-moz-animation: myfirst 6000ms ease-in-out;-ms-animation: myfirst 6000ms ease-in-out;animation: myfirst 6000ms ease-in-out;">
                            </div>
                            <div class="banner7-content slider-3">
                                <div class="bannerslideshow">
                                    <h1 class="title1">food world</h1>
                                    <h2 class="title2">stay with us feel at home</h2>
                                    <div class="banner7-readmore">
                                        <a href="#" title="Read more">shop now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





                <div class="container">
                    <div class="row">



                        <div>
                            <div class="title title-group">
                                <h2>POPULAR hotel</h2>
                            </div>
                        </div>


                        <?php
//hotel
                        $hodata = $con->query("SELECT h.*, avg(hr.rate) FROM hotel.hotelregister h,hotel.hotelrate hr where h.hotelid=hr.hotelid and adminconfirmstatus=1 and packageconfirmstatus=0 group by h.hotelid order by avg(rate) desc limit 0,6;");



                        while ($horow = mysqli_fetch_array($hodata)) {
                            ?>

                            <div class="col-md-4 animate-box">
                                <div class="dish-wrap">

                                    <div class="indoffer">


                                        <?php
                                        $inhodt = $con->query("select * from hoteloffer where hotelid=$horow[2] and offerrunningstatus=1");
                                        while ($inhrow = mysqli_fetch_array($inhodt)) {
                                            ?>

                                            <h3 class="animated swing infinite" style="color: white; position: absolute;z-index:1;margin-top: 49px;margin-left: 18px;">offer &nbsp;&nbsp;&nbsp;%</h3>
                                            <img src="images/offer.png" width="70px"  style="position: absolute;margin-top: -1px;width: 90px;" class="animated swing infinite" />
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="wrap">

                                        <div>
                                            <img alt="" src="<?php echo $horow[12] ?>"  class="dish-img  "style="background-size:cover;     background-color: rgba(0,0,0,0.5);" />


                                            <form action="" method="post" style="position: absolute; margin-top: -35px;">



                                                <?php
                                                $cr = $con->query("select count(userid),sum(rate) from hotelrate where hotelid=$_SESSION[hotelid]");
                                                $crr = mysqli_fetch_array($cr);
                                                // echo $crr[0]."=".$crr[1];
                                                $avg = round($crr[1] / $crr[0]);

                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $avg) {
                                                        ?>

                                                        <a><span><i class="fa fa-star"style="color:yellow; font-size: 30px;letter-spacing: 3px;" ></i></span></a>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a><span><i class="ti-star"style="color:yellow; font-size: 30px;"  ></i></span></a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </form>


                                        </div>

                                        <div>
                                            <a href="javascript:void(0);" style="position: absolute; margin-top: -50px; margin-left: 300px;"  title="waiting list   " ><i class="fa fa-eye" onclick="finddata('waitingg','','<?php echo $horow[2]; ?>');" data-target="#test" data-toggle="modal" style="font-size: 30px; margin-left: 15px; color: white;"></i></a>
                                        </div>


                                        <div class="desc">

                                            <h2 style="margin-top: -5px; "><a style="color:#eb4a5f;font-size: 20px;"href="hoteldetail.php?id=<?php echo $horow[2]; ?>"><?php echo $horow[3]; ?></a></h2>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <?php
                        }
                        ?>






                    </div>
                </div>



                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4" >

                        </div>
                        <div class="col-md-4 viewmore" >
                            <div class="vw1" style="">
                                <a href="allhotel.php"><button  type="submit" style="">view more&nbsp;&nbsp;<i class="fa fa-eye"></i></button></a>
                            </div> 
                        </div>
                    </div>

                </div>





                <div class="section services-section wording4">
                    <div class="container-fluid" style="background-color: #f3f3f3;margin-top: 100px;height: 350px;">

                        <div class="row">
                            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                                <div class="media feature-icon d-block text-center">
                                    <div class="icon">
                                        <span class="flaticon-soup"><i class="ti-user"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <h3>fresh food</h3>
                                        <p style="">“Healthy does NOT mean starving yourself EVER. Healthy means eating the right food in the right amount”</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="media feature-icon d-block text-center">
                                    <div class="icon">
                                        <span class="flaticon-vegetables"><i class="fa fa-cutlery"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <h3>Quality Cuisine</h3>
                                        <p>
                                            My work has also motivated me to put a lot of time into seeking out good food and to spend more money on it.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                                <div class="media feature-icon d-block text-center">
                                    <div class="icon">
                                        <span class="flaticon-pancake"><i class="fa fa-umbrella"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <h3>Friendly Staff</h3>
                                        <p>"To give without any reward, or any notice, has a special quality of its own."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                                <div class="media feature-icon d-block text-center">
                                    <div class="icon">
                                        <span class="flaticon-tray"><i class="fa fa-bookmark"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <h3>Easy Reservation</h3>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non pariatur suscipit repudiandae facilis incidunt unde saepe</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="margin-left: 150px;margin-top: 50px;">
                                <h1 style="font-size: 50px;">the restaurant</h1>
                                <p style="text-align: justify;margin-top: 50px;font-size: 20px;">"We just don't make and sell food.” “A good restaurant isn't that delivers good food but the one that provides a good place to eat.” “People often come to enjoy and not eat at a restaurant.” “Your restaurant should make people not just full but happy.”</p>
                                <br/>
                                <p style="text-align: justify;font-size: 20px;">“The location of a restaurant is as important as its food.”</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="bgheroimg"style="margin-left: -400px;margin-top: 60px;">
                                <img src="images/bghero.png"  />
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">


                        <div>
                            <div class="title title-group">
                                <h2>latest hotel</h2>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div>
                                <?php
                                //latest hotel
                                $lh = $con->query("SELECT h.* FROM hotel.hotelregister h where h.hotelid and adminconfirmstatus=1 and packageconfirmstatus=0 order by hotelid desc limit 0,6");
                                while ($lhrow = mysqli_fetch_array($lh)) {
                                    ?>

                                    <div class="col-md-4 animate-box" style="margin-top: 40px;">
                                        <div class="dish-wrap">


                                            <div class="wrap">

                                                <div>
                                                    <img alt="" src="<?php echo $lhrow[12]; ?>"  class="dish-img  "style="background-size:cover;     background-color: rgba(0,0,0,0.5);" />

                                                </div>
                                                <div class="desc">

                                                    <form action="" method="post" style="position: absolute; margin-top: -65px;">



                                                        <?php
                                                        $cr = $con->query("select count(userid),sum(rate) from hotelrate where hotelid=$_SESSION[hotelid]");
                                                        $crr = mysqli_fetch_array($cr);
                                                        // echo $crr[0]."=".$crr[1];
                                                        $avg = round($crr[1] / $crr[0]);

                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $avg) {
                                                                ?>

                                                                <a><span><i class="fa fa-star"style="color:yellow; font-size: 30px;letter-spacing: 3px;" ></i></span></a>

                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a><span><i class="ti-star"style="color:yellow; font-size: 30px;"  ></i></span></a>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </form>

                                                    <h2 style="margin-top: -5px; "><a style="color:#eb4a5f;font-size: 20px;"href="hoteldetail.php?id=<?php echo $lhrow[2]; ?>"><?php echo $lhrow[3]; ?></a></h2>
                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4" id="">

                        </div>
                        <div class="col-md-4" id="">
                            <div class="vw1">
                                <a href="allhotel.php"><button  type="submit" >view more&nbsp;&nbsp;-<i class="fa fa-eye"></i></button></a>
                            </div> 
                        </div>
                    </div>

                </div>






                <div class="banner-static3">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-sms-4 col-smb-12">
                                <div class="banner-box banner-box1">
                                    <img alt="" src="images/style/free_shipping.png" /> 
                                    <span>Worldwide</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-sms-4 col-smb-12">
                                <div class="banner-box banner-box2">
                                    <img alt="" src="images/style/money_back_2.png" /> 
                                    <span>hotel</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-sms-4 col-smb-12">
                                <div class="banner-box banner-box3">
                                    <img alt="" src="images/style/support_2.png" /> 
                                    <span>Online Support 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                

                <?php
                require_once 'footer1.php';
                ?>
                <?php
                require_once 'footer2.php';
                ?>
                <?php
                require_once 'footer3.php';
                ?>
            </div>
        </div>

        <div id="newsletter_pop_up" style="background:url(images/style/newsletter_poup.jpg);width:790px;height:390px">
            <span class="button b-close"><span>X</span></span>
            <div class="subscribe">
                <div class="title_subscribe">
                    <h1>NEWSLETTER</h1>
                </div>
                <form action="#" method="post" id="newsletter-validate-details">
                    <div class="content_subscribe">
                        <div class="form-subscribe-header">
                            <label>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</label>
                        </div>
                        <div class="input-box">
                            <input type="text" name="email" id="newsletter_subscribe" title="Sign up for our newsletter" class="input-text required-entry validate-email" />
                        </div>
                        <div class="actions">
                            <button type="submit" title="Subscribe" class="button_subscribe"><span><span>Subscribe</span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="quickview-wrapper" id="quickview-wrapper">

    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-product">
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="closeqv"><i class="fa fa-times"></i></span>
                        </button>
                        <div id="quickview-content">
                            <div class="bootexpert product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="image1xxl" src="images/product/4.jpg">
                                    </div>
                                    <div class="quick-thumbnails">
                                        <div class="slick-slide">
                                            <a href="images/product/4.jpg">
                                                <img alt="image1xxl" class="attachment-shop_thumbnail" src="images/product/s_4.jpg">
                                            </a>
                                        </div>
                                        <div class="slick-slide">
                                            <a class="zoom first" href="images/product/13_2.jpg">
                                                <img alt="image1xxl" class="attachment-shop_thumbnail" src="images/product/s_13_3.jpg">
                                            </a>
                                        </div>
                                        <div class="slick-slide">
                                            <a class="zoom" href="images/product/11_5.jpg">
                                                <img alt="image4xxl" class="attachment-shop_thumbnail" src="images/product/s_11_7.jpg">
                                            </a>
                                        </div>
                                        <div class="slick-slide">
                                            <a class="zoom" href="images/product/12_1.jpg">
                                                <img alt="image1xxl" class="attachment-shop_thumbnail" src="images/product/s_12_3.jpg">
                                            </a>
                                        </div>
                                        <div class="slick-slide">
                                            <a class="zoom" href="images/product/7_3.jpg">
                                                <img alt="image1xxl" class="attachment-shop_thumbnail" src="images/product/s_7_3.jpg">
                                            </a>
                                        </div>
                                        <div class="slick-slide">
                                            <a class="zoom" href="images/product/10.jpg">
                                                <img alt="image1xxl" class="attachment-shop_thumbnail" src="images/product/s_10_3.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-shop product-info">
                                    <div class="product-name">
                                        <h1>Nunc facilisis</h1>
                                    </div>
                                    <div class="short-description">
                                        <div class="std">Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. </div>
                                    </div>
                                    <div class="box-container2">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:67%"></div>
                                            </div>
                                            <span class="amount"><a href="#">1 Review(s)</a></span>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price">
                                                <span class="price">$222.00</span> </span>
                                        </div>
                                    </div>
                                    <div class="box-container1">
                                        <p class="availability in-stock">Availability: <span>In stock</span></p>
                                        <div class="sku">
                                            <label>product code:</label>10
                                        </div>
                                    </div>
                                    <div class="add-to-box-cart">
                                        <div class="add-to-cart">
                                            <label for="qty">Quantity:</label>
                                            <div class="qty-button">
                                                <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" />
                                                <div class="button-icon">
                                                    <input class="qty-decrease" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) qty_el.value--;return false;">
                                                    <input class="qty-increase " onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;">
                                                </div>
                                            </div>
                                            <button title="Add to Cart" class="button btn-cart">
                                                <em class="tooltip">add to cart</em><span><span>Add to Cart</span></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-box">
                                        <ul class="add-to-links">
                                            <li><a href="#" class="link-wishlist"> add to Wishlist</a></li>
                                            <li><span class="separator">|</span> 
                                                <a href="#" class="link-compare">add to Compare</a>
                                            </li>
                                        </ul>
                                        <p class="email-friend" title="Email"><a href="#">Email to a Friend</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
require_once 'allscript.php';
?>


<div class="modal fade" id="test" style="margin-top: 300px;">
    <div class="modal-dialog">
        <div class="modal-content" id="rrdata">

        </div>
    </div>
</div>


</body>



</html>