<?php
require_once 'conect.php';

$data = $con->query("select * from hotelregister where hotelid=$_REQUEST[id]");
$row = mysqli_fetch_array($data);
$_SESSION[hotelid] = $row[2];

if (isset($_REQUEST[reviewbtn])) {
    if (strlen($_REQUEST[review]) > 0) {
        $dt = date('y-m-d');
       $in = $con->query("insert into hotelreview values($_SESSION[hotelid],'$_SESSION[userid]',0,'$_REQUEST[review]','$dt')");
    
        //  echo ("insert into hotelreview values($_SESSION[hotelid],'$_SESSION[userid]',0,'$_REQUEST[review]','$dt')");
    }
}


if (isset($_REQUEST[userhall])) {
    // $userdata = $con->query("select * from userregister where userid='$_SESSION[userid]'");
    //$userrow = mysqli_fetch_array($userdata);
    $dtt = date('y-m-d');
    $in = $con->query("insert into banquetrequest values($_SESSION[hotelid],$_SESSION[hallid],0,$_REQUEST[contact],'$dtt',0)");
}
if (isset($_REQUEST[reqhall])) {
    $dtt = date('y-m-d');
    $in = $con->query("insert into banquetrequest values($_SESSION[hotelid],$_SESSION[hallid],0,$_REQUEST[contact],'$dtt',0)");
}
?>
<html>
    <?php require_once 'head.php'; ?>

    <body>

        <?php
        require_once 'header1.php';
        require_once 'header2.php';
        ?>





        <div class="container" style="">
            <div class="row">
                <div class="col-md-6" style=" padding: 100px;   min-height: 573px; ">
                    <?php
                    $hvid = $_REQUEST[id];
                    $viewdata = $con->query("select * from hotelregister where hotelid='$hvid'");
                    while ($viewrow = mysqli_fetch_array($viewdata)) {
                        ?>
                        <div class="col-md-6">
                            <p style="margin-top:50px; ">

                                <img src="<?php echo $viewrow[8]; ?> " height="200px" width="200px;"     />
                            </p>

                        </div>
                        <div class="col-md-6">
                            <p class="hwifi">
                                <b><lable>wi-fi</lable></b>
                                &nbsp;
                                <?php
                                if ($horow[11] == 1) {
                                    ?>
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa fa-thumbs-o-down"></i>
                                    <?php
                                }
                                ?>
                            </p>

                            <p class="href">
                                <b><lable> refercode</lable></b>
                                &nbsp;
                                <?php
                                if ($horow[15] == 1) {
                                    ?>
                                    <i class="fa fa-thumbs-o-up"></i>
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa fa-thumbs-o-down"></i>
                                    <?php
                                }
                                ?>

                            </p>
                            <p class="hstatus">
                               
                                <?php
                                if ($horow[13] == 0) {
                                    ?>
                                   
                                    <button class="hstatusbut1"type="submit" style=""><i class="fa fa-thumbs-up" style="">&nbsp;&nbsp;status</i></button>
                                    <?php
                                } else {
                                    ?>
                                    <button type="submit" style="background-color:#co3;"><i class="fa fa-thumbs-o-down"></i></button>
                                    <?php
                                }
                                ?>

                            </p>
                            <p>
                                <?php echo$horow[14]; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6" style=" max-height: 100%; min-height: 573px;  ">
                        <div class="col-md-6" >
                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i> <lable class="hotellable">HOTEL NAME</lable>
                                <p class="hlbname"> <?php echo$viewrow[3]; ?></p>
                            </div>
                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i><lable class="hotellable">PHONE</lable>
                                <p><?php echo$viewrow[6]; ?></p>
                            </div>
                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i><lable class="hotellable">EMAIL</lable>
                                <p><?php echo$viewrow[7]; ?></p>
                            </div>

                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i><lable class="hotellable">TABLE IMAGE</lable>

                                <p style="margin-top: 20px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.30);"><img src="<?php echo $viewrow[12]; ?> " height="200px" width="230px;" /></p>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i><lable class="hotellable">ADDRESS</lable>
                                <p><?php echo$viewrow[4]; ?></p>
                            </div>

                            <div class="hld">
                                <i class="fa fa-hand-o-right"></i>
                                <lable class="hotellable">OPEN DAY</lable>
                                <p><?php echo$viewrow[9]; ?></p>
                            </div>
                            <div class="hld">
                                       <i class="fa fa-hand-o-right"></i>
                                <lable class="hotellable">OPEN TIME</lable>
                                <p><?php echo$viewrow[10]; ?></p>
                            </div>


                            <div class="hld">
                                <form action="" method="post">
                                    
                                    <?php
                                    //moedalstar
                                    if ($_SESSION[userid] == "") {
                                        ?>

                                        <input type="button" value="submit" style="background-color: black ; color: white; padding: 10px; " title="please login first"/>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="button" value="hotelrate" style="padding: 10px; background-color: black; color: #fff;" onclick="finddata('rr','first',0);" data-toggle="modal" data-dismiss="modal" role="dialog" data-target="#star" />
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    $cr = $con->query("select count(userid),sum(rate) from hotelrate where hotelid=$_SESSION[hotelid]");
                                    $crr = mysqli_fetch_array($cr);
                                    // echo $crr[0]."=".$crr[1];
                                    $avg = round($crr[1] / $crr[0]);

                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $avg) {
                                            ?>

                                            <a><span><i class="fa fa-star"style="color:yellow; font-size: 18px" ></i></span></a>

                                            <?php
                                        } else {
                                            ?>
                                            <a><span><i class="ti-star"style="color:yellow; font-size: 18px;"  ></i></span></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </form>


                                <div class="offerr" style="margin-top: 10px; cursor: pointer;"onclick="finddata('offer','',<?php echo $_SESSION[hotelid]; ?>);" data-target="#star" data-toggle="modal">
                                    <h2 >%offer</h2>
                                </div>

                                <?php
                                if ($_SESSION[userid] == "") {
                                    ?>

                                    <div class="subscribebu">
                                        <button type="submit"  style="" title="please login first">subscribe</button>
                                    </div>

                                    <?php
                                } else {


                                    $email = $con->query("select * from emailsubscribe where userid='$_SESSION[userid]' and  hotelid=$_SESSION[hotelid] ");
                                    $em1 = mysqli_fetch_array($email);
                                    ?>

                                    <div id="subdata">
                                        <?php
                                        if ($em1[0] == "") {
                                            ?>

                                            <div class="subscribebu"onclick="findsub('sub','subkro',0);">


                                                <button type="submit" class="" style=""> <i class="fa fa-bell-o" style=""></i>subscribe</button>

                                            </div>

                                            <?php
                                        } else {
                                            ?>

                                            <div class="subscribebu" onclick="findsub('sub','unsub',0);">


                                                <button type="submit" class="" style=""><i class="fa fa-bell-slash-o " style="letter-spacing: 5px;"></i>unsubscribe</button>

                                            </div>

                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <?php
                                }
                                ?>



                            </div>

                        </div>

                    </div>


                    <div class="col-md-12 os ">

                        <div>
                            <div class="title title-grouppmain " >
                                <h2>hotel baquet</h2>
                            </div>
                        </div>


                    </div>



                    <div class="container">
                        <div class="row">




                            <?php
//hotelhall
                            $hodata = $con->query("select * from hotelhall where hotelid=$_SESSION[hotelid] ");



                            while ($horow = mysqli_fetch_array($hodata)) {
                                ?>

                                <div class="col-md-4 animate-box">
                                    <div class="dish-wrap">

                                        <div class="wrap">

                                            <div>
                                                <img alt="" src="<?php echo $horow[7] ?>"  class="dish-img  "style="background-size:cover;     background-color: rgba(0,0,0,0.5);" />
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" style="position: absolute; margin-top: -50px; margin-left: 300px;"  class="shows" ><i class="fa fa-plus" onclick="finddata('hotelhall','',<?php echo $horow[1]; ?>);" data-target="#star" data-toggle="modal" style="font-size: 30px; margin-left: 15px; color: white;"></i></a>
                                            </div>


                                            <div class="desc">

                                                <h2 style="margin-top: -5px; "><a style="color:#eb4a5f;font-size: 28px;"href=""><?php echo $horow[2]; ?></a></h2>

                                            </div>


                                        </div>
                                    </div>
                                </div>



                                <?php
                            }
                            ?>







                        </div>
                    </div>
                  <div class="col-md-12 os ">

                        <div>
                            <div class="title title-grouppmain " >
                                <h2>hotel online table booking</h2>
                            </div>
                        </div>


                    </div>
                    
                
                <div class="container">
                    <div class="row" style="margin-top: 50px;">
                         <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Name is required">
                                <input class="input100" type="text" name="name" placeholder="Name">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                         </div>
                         <div class="col-md-6">
                            
                             
                             <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Number of person">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </span>
                        </div>
                             
                             
                         </div>
                    </div>
                </div>
                
                    
                



                    <div class="col-md-12 os ">

                        <div>
                            <div class="title title-grouppmain " >
                                <h2>hotel table</h2>
                            </div>
                        </div>


                    </div>




                    <div class="container">
                        <div class="row">



                            <div class="" style="margin-top: 60px;">
                                <?php
                                //hoteltable
                                $hodata = $con->query("select * from hoteltable where hotelid=$_SESSION[hotelid]; ");



                                while ($horow = mysqli_fetch_array($hodata)) {
                                    ?>

                                    <?php echo $horow[3]; ?>
                                    <span>
                                        <?php
                                        $ct = $horow[3] * 30;
                                        
                                        ?>
                                        <img src="images/chaire.jpg" width="<?php echo $ct; ?> "/> 
                                        
                                        

                                    </span>
                               
                                                            


                                    <?php
                                }
                                //endhoteltable
                                ?>
                            </div>






                        </div>
                    </div>






                    <div class="col-md-12 os ">

                        <div>
                            <div class="title title-grouppmain " >
                                <h2>our specialist</h2>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8 menuitem" style="">

                        <div>
                            <div class="title title-groupp">
                                <h2>menu item</h2>
                            </div>
                        </div>

                        <?php
                        $menu = $con->query("select i.*,c.* from menuitem i,menucategory c where i.menucategoryid=c.menucategoryid and hotelid=$_SESSION[hotelid] order by i.itemid");
                        while ($menuitem = mysqli_fetch_array($menu)) {
                            ?>


                            <div class="menus d-flex ftco-animate">
                                <div class="menu-img"><img src="<?php echo $menuitem[3]; ?>" height="90px" width="100px"/></div>
                                <div class="text d-flex">
                                    <div class="one-half" >
                                        <h3><?php echo $menuitem[2]; ?></h3>

                                    </div>
                                    <div class="one-forth" >
                                        <span class="price">RS.<?php echo $menuitem[4]; ?></span>
                                    </div>
                                </div>
                            </div>



                            <?php
                        }
                        ?>



                    </div>
                    <div class="col-md-4 menucate"  >

                        <div>
                            <div class="title title-groupp">
                                <h2>menu category</h2>
                            </div>
                        </div>
                        <?php
                        $it = $con->query("select * from menucategory where hotelid=$_SESSION[hotelid]");

                        while ($item = mysqli_fetch_array($it)) {
                            ?>

                            <div class="hmenucategoryedit" >
                                <div>
                                    <img src="<?php echo $item[3]; ?>" title="show our item"height="100px" width="100px;" onclick="finddata('menucategory','0',<?php echo $item[1]; ?>);" data-target="#star" data-toggle="modal"/>
                                    <b> <font  style="font-size: 20px;text-align: center;padding: 20px;"><?php echo $item[2]; ?> </font></b>

                                </div>



                            </div>
                            <hr/>
                            <?php
                        }
                        ?>


                    </div>

                    <div class="col-md-12 os ">

                        <div>
                            <div class="title title-grouppmain " >
                                <h2>our location</h2>
                            </div>
                        </div>


                    </div>



                    <div class="col-md-12" style="margin-top: 100px;" >

                        <p >
                            <?php echo$viewrow[5]; ?>
                        </p>




                    </div>

                    <?php
                }
                ?>


            </div>
        </div>









        <?php
        require_once 'footer1.php';
        require_once 'footer2.php';
        require_once 'footer3.php';
        ?>


        <?php
        require_once 'allscript.php';
        ?>



        <div class="modal fada" id="star">
            <div class="modal-dialog modal-lg" style="width: 1000px;">
                <div class="modal-content"  data-backdrop="static" data-keyboard="false"  id="rrdata" style="max-height:100%; min-height:700px;background-color: rgba(0,0,0,0.8); margin-top: 150px; overflow: auto; ">



                </div>

            </div>
        </div>

    </body>

</html>