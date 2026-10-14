<?php
require_once 'conect.php';

require_once 'head.php';




if ($_REQUEST[kono] == "landmark") {
    ?>


    <option value="">--select landmark--</option>
    <?php
    $data = $con->query("select * from  landmark where areaid=$_REQUEST[id]");
    while ($row = mysqli_fetch_array($data)) {
        ?>
        <option value="<?php echo $row[1]; ?>"> <?php echo $row[2]; ?></option>
        <?php
    }
    ?>



    <?php
}
?>



<?php
require_once 'conect.php';

$_SESSION[what] = $_REQUEST[what];


//print_r($_REQUEST);
//confirm admin
if ($_SESSION[what] == "otpmobile") {
    if ($_REQUEST[task] == "9429279768") {
        $_SESSION[otp] = $_REQUEST[id];
        ?>
        <button type="button" class="btn btn-success animate flash infinite">SEND OTP</button>
        <?php
    } else {
        ?>


        <div class="form-group col-md-12">
            <font class="animated flash infinitie" style="color:red">Invalid Mobile</font>
            <input type="text" name="mobile" id="mobiledata" oncopy="return false" autofocus="" maxlength="10" placeholder="Enter Mobile" class="form-control input"/>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <button type="button" onclick="finddata('otpmobile',0,<?php echo rand(10, 99) . rand(10, 99); ?>);" class="form-control">GET OTP</button>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
                <button type="reset" class="form-control">Clear</button>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php
    }
}
?>



<?php
if ($_REQUEST[what] == "rr") {
    if ($_REQUEST[task] == "first") {
        $rt = $con->query("select sum(rate) from hotelrate where hotelid=$_SESSION[hotelid] and userid like '$_SESSION[userid]'");
        $rtt = mysqli_fetch_array($rt);
    } else {
        $ch = $con->query("select * from hotelrate where hotelid=$_SESSION[hotelid] and userid like '$_SESSION[userid]' ");
        $chh = mysqli_fetch_array($ch);


        if ($chh[0] == "") {
            $in = $con->query("insert into hotelrate values($_SESSION[hotelid],'$_SESSION[userid]',0,'$_REQUEST[id]')");
        } else {
            $up = $con->query("update hotelrate set rate=$_REQUEST[id] where hotelid=$_SESSION[hotelid] and userid like '$_SESSION[userid]' ");
        }



        $rt = $con->query("select rate from hotelrate where hotelid=$_SESSION[hotelid] and userid like '$_SESSION[userid]' ");
        $rtt = mysqli_fetch_array($rt);
    }
    ?>
    <div class=""  data-backdrop="static" data-keyboard="false" >
        <div style="text-align:center;margin-top: 30px;">
            <h1 style="color: #ffffff">give your<font style="color: yellow;"> rate</font></h1>
            <p style="color: #f5f5f5;">“Satisfied customer is the best source of advertisement”</p>
        </div>
        <div style="text-align:center; font-size: 30px; color: yellow;">
            <?php
            //modal star
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rtt[0]) {
                    ?>
                    <span><i class="fa fa-star" onclick="finddata('rr','update',<?php echo $i; ?>);"></i></span>
                    <?php
                } else {
                    ?>
                    <span><i class="fa fa-star-o" onclick="finddata('rr','update',<?php echo $i; ?>);"></i></span>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <hr/>
    <div style="text-align: center;padding: 10px;">

        <form action="" method="post" style="">
            <h1 style="color: #ffffff">write your<font style="color: yellow;"> review</font></h1>
            <br/>
            <div>
                <textarea type="text" name="review" placeholder="write review" style="height: 100px; width: 320px;font-size: 20px;"></textarea>
            </div>
            <div style="margin-top: 30px;">
                <h2 style="color: #f7f9f9;">hit <font style="color: red;">thankyou</font> button</h2>
                <br/>
                <button type="submit" name="reviewbtn" style="background-color: yellow; color:#000;font-size: 15px; height: 40px; width: 100px;">thank you</button>
            </div>
        </form>
    </div>
    




    <?php
}

//menucategory
if ($_REQUEST[what] == "menucategory") {

    $menudata = $con->query("select * from menucategory where menucategoryid=$_REQUEST[id]");
    $menurow = mysqli_fetch_array($menudata);
}
?>

<div style="font-size: 30px; text-align: center;margin-top: 20px;padding: 10px;color: #eb4a5f;border-bottom:1px #eb4a5f solid;" >
    <?php echo $menurow[2]; ?>
</div>
    
<br/>



<?php
$menu = $con->query("select i.*,c.* from menuitem i,menucategory c where i.menucategoryid=c.menucategoryid and c.menucategoryid=$_REQUEST[id] order by i.name");
while ($menuitem = mysqli_fetch_array($menu)) {
    ?>

    <div class="col-md-6 " style="background-color: #fff;max-height: 100%; min-height: 150px; ">

        <div class="menus d-sm-flex ftco-animate align-items-stretch" style="margin-top: 25px;">
            <img src="<?php echo $menuitem[3]; ?>"  class="menu-img img" style=" background-size:cover;border-radius:10px;"/>
            <div class="text d-flex align-items-center">
                <div>
                    <div class="d-flex" style="margin-left: 10px;">
                        <div class="one-half">
                            <h3 style=""><?php echo $menuitem[2]; ?></h3>
                        </div>

                    </div>
                    <div class="cateprice" style="">
                        <span class="" >RS.<?php echo $menuitem[4]; ?></span>
                    </div>


                </div>
            </div>
        </div>


    </div>
    <?php
}
?>

<?php
if ($_REQUEST[what] == "offer") {


    $menudataa = $con->query("select * from hoteloffer where hotelid=$_REQUEST[id]");
    $menuroww = mysqli_fetch_array($menudataa);
    if ($menuroww[0] == "") {
        ?>
        <div>
            no offer
            <img src="images/panda.png" height="100px" width="100px;"/>
        </div>
        <?php
    } elseif ($menuroww[6] == "1") {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $hooffer = $con->query("select * from hoteloffer where offerrunningstatus=1 and hotelid=$_REQUEST[id]");
                    while ($hooffer = mysqli_fetch_array($hooffer)) {
                        ?>

                        <div class="col-md-6">
                            <div>
                                offer name:
                                <?php echo $hooffer[2]; ?>
                            </div>
                            <div>
                                offer per:
                                <?php echo $hooffer[3]; ?>
                            </div>
                            <div>
                                offer:
                                <?php echo $hooffer[7]; ?>
                            </div>
                            <div>
                                start date:
                                <?php echo $hooffer[4]; ?>
                            </div>
                            <div>
                                end data:
                                <?php echo $hooffer[5]; ?>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>






        <?php
    } else {
        ?>
        <div>
            come
            <img src="images/coming.png" height="100px" width="100px"/>
        </div>
        <?php
    }
}



if ($_REQUEST[what] == "hotelhall") {

    $_SESSION[hallid] = $_REQUEST[id];
    $menudata = $con->query("select * from hotelhall where hotelid=$_SESSION[hotelid] and  hallid=$_REQUEST[id]");
    $menurow = mysqli_fetch_array($menudata);
    ?>


    <div>
        <?php
        if ($_SESSION[userid] != "") {

            $tuserdata = $con->query("select * from userregister where userid='$_SESSION[userid]'");
            $tuserrow = mysqli_fetch_array($tuserdata);
            ?>
            <form action="" method="post" name="userhall">

                <div>
                    <input type="text"  name="contact" value="<?php echo $tuserrow[2]; ?>" />
                </div>
                <button type="submit" class="btn-default" name="userhall">userreq</button>

            </form>
            <br/>
        </div>
        <?php
    } else {
        ?>

        <div class="bnqreq">

            <h1 class="text-center" style="">ban<font style="color: #eb4a5f;">q</font>uet Re<font style="color: #eb4a5f;">q</font>uest</h1>


            <br/>
            <form action="" method="post">
                <div class="">
                    <input type="text" name="contact" class="" placeholder="enter contact" style="" />

                </div>
                <br/>
                <div>
                    <button type="submit" class="btn-success  animated rubberBand infinite" name="reqhall" style="height: 30px; margin-left: 450px;width: 80px;">visitor</button>
                </div>

            </form>
        </div>

        <?php
    }
    ?>




    <hr/>
    <div class="bnqreq" style="margin-top: 40px;">
        <h1 class="text-center" style="color: white;">ha<font style="color: #eb4a5f">ll</font> sh<font style="color: #eb4a5f">i</font>ne</h1>

    </div>
    <?php
    $menu = $con->query("select * from hotelhall where hotelid=$_SESSION[hotelid] and hallid=$_REQUEST[id]");
    while ($menuitem = mysqli_fetch_array($menu)) {
        ?>





        <div class="col-md-6 hhalledit">

            <div class="row">
                <div class="col-md-6">
                    <div style="" >

                        <p style="font-size: 30px; margin-top: 20px;color: #ff3366;">  <?php echo $menuitem[2]; ?></p>

                    </div>
                    <br/>
                    <div>
                        <label class="">capacity</label>
                        <p> <?php echo $menuitem[3] ?>&nbsp;person</p>
                    </div>
                    <div>
                        <label class="">description</label>
                        <p> <?php echo $menuitem[4] ?></p>
                    </div>
                    <div>
                        <label class="">rent per day</label>
                        <p> rs.<?php echo $menuitem[5] ?></p>
                    </div>
                    <div>
                        <label class="">floor</label>
                        <p><?php echo $menuitem[6] ?></p>
                    </div>
                </div> 
                <div class="col-md-6">


                    <div id="box">
                        <div >
                            <p class="fullimg"><img src="<?php echo $menuitem[9] ?>"height="350px" width="410px" /></p>
                        </div>

                        <div id="box">
                            <span class="box"style="float: left; margin-left: 30px;padding: 5px;" ><img src="<?php echo $menuitem[8] ?>"height="70px" width="70px" /></span>
                        </div>

                        <div id="box">
                            <span class="box" style="float: left;padding: 5px;"><img src="<?php echo $menuitem[7] ?>"height="70px" width="70px" /></span>
                        </div>
                    </div>
                </div> 

            </div>


        </div>

        <br/>
        <br/>
        <br/>

        <?php
        //end hall
    }
}
?>

<?php
if ($_REQUEST[what] == "waitingg") {

//livewaiting



    $dt = date('d:m:Y');

    $codata = $con->query("select count(name) from hotelwaitinglist where hotelid=$_REQUEST[id] and date='$dt'");
    $corow = mysqli_fetch_array($codata);
    ?>


    <div class="container">
        <div class="row" style="margin-left: 150px;font-size: 30px;">
            <div class="col-md-12">
                <div class="waitlive">
                    <i class="fa fa-calendar"></i>
                    <?php echo $dt; ?>
                </div>



            </div>
            <div style="margin-left: 00px;" >
                waiting customer<br/><br/>
                <span style="font-size: 40px;margin-left: 100px;"><?php echo $corow[0]; ?></span>
            </div> 
        </div>
    </div>

    <?php
    //endwiating
}
?>




<?php
//allhotel
if ($_REQUEST[what] == "allhotel") 
    
    
    {
    
    
        
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-list-ul" style="font-size: 30px;position: absolute;"></i>
            </div>
            <div class="col-md-4" >
                <input type="text" placeholder="search" name="hotelsearch" style="border: 1px solid #999;height: 35px;margin-left: 60px;width: 300px;"/>
                <input style="background-color: #2a363b;color:white;height: 35px;width: 70px;position: absolute;" value="submit" type="submit" name="search"search />
            </div>
            <div class="col-md-4">
            </div>

        </div>


    </div>

        
        
        
    <?php
    
    
    $allhotel = $con->query("select * from hotelregister where adminconfirmstatus=1  ");
    while ($hotelrow = mysqli_fetch_array($allhotel)) {
        ?>




        <div class="col-md-4 animate-box" style="margin-top: 40px;">
            <div class="dish-wrap">


                <div class="indoffer">


                    <?php
                    $inhodt = $con->query("select * from hoteloffer where hotelid=$hotelrow[2] and offerrunningstatus=1");
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
                        <img alt="" src="<?php echo $hotelrow[12] ?>"  class="dish-img  "style="background-size:cover;     background-color: rgba(0,0,0,0.5);" />

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

                        <h2 style="margin-top: -5px; "><a style="color:#eb4a5f;font-size: 20px;"href="hoteldetail.php?id=<?php echo $hotelrow[2]; ?>"><?php echo $hotelrow[3]; ?></a></h2>
                    </div>

                </div>
            </div>
        </div>




        <?php
    }
}
//endhotel


require_once 'allscript.php';
?>


