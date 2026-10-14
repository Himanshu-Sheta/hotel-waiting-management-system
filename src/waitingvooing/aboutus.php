<?php
require_once 'conect.php';
$_SESSION[page] = "aboutus"
?>

<!doctype html>
<html lang="en">



    <?php
    require_once 'head.php';
    ?>

    <body class="cms-index-index">

        <?php
        require_once 'header1.php';
        ?>

        <?php
        require_once 'header2.php';
        ?>


        <div class="container-fluid">
            <div class="row mainn1">
                <div class="col-md-12">

                    <div>
                        <h1>about us</h1>

                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page">Home</a>
                                    <span>/ </span>
                                </li>
                                <li class="cms_page">
                                    <strong class="animated swing infinite">about us</strong>
                                </li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>

        </div>



        <div class="container about1">
            <div class="row ">
                <div class="col-md-6">

                    <div class="ab1">
                        <img src="images/hotel1.jpg"/>
                    </div>

                </div>
                <div class="col-md-6 abc1">
                    <h3>The waitingvooing Way</h3>
                    vooing's secret sauce?</br>
                    We offer tasteful spaces,</br> whenever you need them, at unbeatable prices.
                </div>
            </div>

            <div class="row ">
                <div class="col-md-6">

                    <div class="abc1">
                        <h3>How to book</h3>
                        waitingvooing is a hotel search with an extensive price comparison. The prices shown come from numerous hotels and booking websites. This means that while users decide on waitingvooing which hotel best suits their needs, the booking process itself is completed through the booking sites (which are linked to our website). 

                        Let waitingvooing help you to find the right price from over 400 booking sites!
                    </div>

                </div>
                <div class="col-md-6 ab2">
                    <img src="images/hotel2.jpg"/>
                </div>



            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="world1">
                        <img src="images/world.png"/>


                        <h3>The world is cozying up to waitingvooing's idea of chic hotels for everyone.</h3>
                        <p> waitingvooing is the world’s fastest growing company & the world’s largest chain of</br> operated hotels, homes, managed living and work spaces. </p>

                    </div>

                </div>

            </div>

        </div>






        <div class="brand-slider-contain">
            <div class="container">
                <div class="owl">
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img src="images/brand/logo_brand1.png" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img src="images/brand/logo_brand2.png" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img src="images/brand/logo_brand3.png" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img src="images/brand/logo_brand4.png" alt="" /></a>
                        </div>
                    </div>
                    <div class='item'>
                        <div class="item-innner">
                            <a href="#" title=""><img src="images/brand/logo_brand2.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once 'footer1.php';
        require_once 'footer2.php';
        require_once 'footer3.php';
        ?>
    </div>

</div>


<?php
require_once 'allscript.php';
?>
</body>



</html>