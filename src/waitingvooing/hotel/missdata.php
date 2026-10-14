<?php
require_once 'conect.php';

$_SESSION[what] = $_REQUEST[what];
$perpage = 5;

//  print_r($_REQUEST);
//confirm admin
//profile

if ($_SESSION[what] == "profile") {
    ?>

    <?php
    $hodata = $con->query("select * from hotelregister where hotelid='$_SESSION[hotelid]' ");


    $horow = mysqli_fetch_array($hodata);
    ?>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 " style="margin-top: 60px;">

                <div style="margin-left: 00px;margin-top: 80px;">

                    <div class="ebptable">
                        <button type="submit" name="imgedit" data-target="#starrr" data-toggle="modal" title="edit image"><i class="fa fa-edit"></i></button>
                    </div>

                    <div>
                        <img src="../<?php echo$horow[12]; ?>" height="300px" width="420px;"/>
                    </div>


                </div>


                <div style="margin-left: 500px;position: absolute;margin-top: -180px;">

                    <P >

                        <?php
                        if ($horow[13] == 1) {
                            ?>
                            <button type="submit" style="background-color: #2ecc71; width: 150px; height: 40px;" ><b>status</b>&nbsp;<i style="font-size: 20px;"class="fa fa-thumbs-o-up" ></i></button>
                            <?php
                        } else {
                            ?>
                            <button type="submit" style="background-color: #f5b7b1; width: 150px; height: 40px;" class="btn-danger">not allow<i class="fa fa-thumbs-o-down"></i></button>
                            <?php
                        }
                        ?>

                    </p>
                </div>




            </div>
            <div class="col-md-6 mainhoteldiv">

                <div style="margin-top: 10px;border-bottom: 1px #2a363b solid;text-align: center;padding: 10px;">
                    <P style="font-size: 25px;letter-spacing: 2px;">
                        <b style="color: red;"><?php echo$horow[3]; ?></b>

                    </p>

                    <div class="editprofile1">
                        <button type="submit" data-target="#edit" data-toggle="modal"> <i class="fa fa-edit"></i></button>

                    </div>

                </div>



                <div class="row">
                    <div class="col-md-6 hotelpro">

                        <div>
                            <label>address&nbsp;:-</label>
                            <P>
                                <?php echo $horow[4]; ?>
                            </p>
                        </div>
                        <div>
                            <label>mobile&nbsp;:-</label>
                            <P>
                                <?php echo$horow[6]; ?>
                            </p>
                        </div>
                        <div>
                            <label>email&nbsp;:-</label>
                            <P>
                                <?php echo$horow[7]; ?>
                            </p>
                        </div>
                        <div>
                            <label>open daY&nbsp;:-</label>
                            <P>
                                <?php echo$horow[9]; ?>
                            </p>
                        </div>


                        <div>
                            <label>open time&nbsp;:-</label>
                            <P>
                                <?php echo$horow[10]; ?>
                            </p>
                        </div>

                    </div>
                    <div class="col-md-6 hotelpro">

                        <div>
                            <label>logo&nbsp;:-</label>
                            <div class="hlogoimg"style="margin-top: 00px;">

                                <img src="../<?php echo $horow[8]; ?> " height="150px" width="230px;"  />

                                <div class="ebp">
                                    <button type="submit" name="imgedit" data-target="#starr" data-toggle="modal"><i class="fa fa-edit" title="edit image"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="hotelpwifi">
                            <P style="">
                                <i class="fa fa-wifi"></i>&nbsp;<b>wi-fi</b>
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
                        </div>
                        <div class="hotelprefer">
                            <P>
                                <b>refercode</b>
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
                        </div>
                        <div class="hotelppack">
                            <p title="packageconfimstatus">
                                <b>package</b>
                                <?php
                                if ($horow[14] == 1) {
                                    ?>
                                    <i class="fa fa-thumbs-o-up"  ></i>
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa fa-thumbs-o-down" ></i>
                                    <?php
                                }
                                ?>
                            </p>
                        </div>

                    </div>
                </div>





            </div>

        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 hotelpro" >
                <label>location&nbsp;:-</label>
                <P style="margin-top: 50px;">
                    <?php echo$horow[5]; ?>
                </p>

            </div>
        </div>
    </div>





    <?php
}

if ($_SESSION[what] == "dashboard") {
    ?>



    
    <div class="wrapper">
        <!--area-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6 " onclick="finddata('profile','view','1');findbox('profile');">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                            data-speed="1000">
                            <!--320-->
                        </h1>
                        <p>hotel profile</p>
                    </div>
                </section>
            </div>

            <!--landmark-->      

            <div class="col-lg-3 col-sm-6 " onclick="finddata('offer','view','1');findbox('offer');">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-language"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                            data-speed="1000">
                            <!--320-->
                        </h1>
                        <p>hotel Offer</p>
                    </div>
                </section>
            </div>

            <!--user--> 
            <div class="col-lg-3 col-sm-6" onclick="finddata('mcategory','view','1');findbox('mcategory');">
                <section class="panel ">
                    <div class="symbol purple-color">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value gray">
                        <h1 class="purple-color timer" data-from="0" data-to="123"
                            data-speed="1000">
                            <!--123-->
                        </h1>
                        <p>menu category</p>
                    </div>
                </section>
            </div>

            <!--inquiry-->

            <div class="col-lg-3 col-sm-6" onclick="finddata('menuitem','view','1');findbox('menuitem');">
                <section class="panel">
                    <div class="symbol green-color">
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="value gray">
                        <h1 class="green-color timer" data-from="0" data-to="2345"
                            data-speed="3000">
                            <!--2345-->
                        </h1>
                        <p>menu item</p>
                    </div>
                </section>
            </div>

            <!--package-->
            <div class="col-lg-3 col-sm-6" onclick="finddata('hoteltable','view','1');findbox('hoteltable');">
                <section class="panel green">
                    <div class="symbol ">
                        <i class="fa fa-toggle-on"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="432"
                            data-speed="1000">
                            <!--432-->
                        </h1>
                        <p>hotel table</p>
                    </div>
                </section>
            </div>


        </div>
    </div>
    <?php
}
require_once 'allscript.php';
?>



<?php
//package

if ($_REQUEST[what] == "package") {

    $pack = $con->query("select * from package");
    while ($packrow = mysqli_fetch_array($pack)) {
        ?>

        <div class="mainpackage">

            <div class="col-md-4 mpk1" style="letter-spacing: 2px;">
                <div class="pack1" style="">

                    <div class="pack11">
                        <label>packagename</label>
                        <P>
                            <?php echo$packrow[1]; ?>
                        </p>
                    </div >
                    <div class="pack11">
                        <label>duration</label>
                        <P>
                            <?php echo $packrow[2]; ?>&nbsp;&nbsp;months
                        </p>
                    </div>
                    <div class="pack11"> 
                        <label>amount</label>
                        <P>
                            RS. <?php echo$packrow[3]; ?>
                        </p>
                    </div>
                    <div class="pack11">
                        <P>
                            <img src="http://localhost/admin/<?php echo $packrow[4]; ?>"height="100px" width="100px" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $horow[1]; ?>)" />  
                        </p>
                    </div>
                    <div class="hpbutton">
                       <button  type="submit">buy</button></a>

                    </div>
                </div>

            </div>

        </div>

        <?php
    }
}
//endpackage
?>


<?php
//bill
if ($_REQUEST[what] == "bill") {
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 ">
                <div>
                    <?php
                    $data = $con->query("select p.*,pk.*,h.* from package p,packagebill pk,hotelregister h where p.packageid=pk.packageid and pk.hotelid=h.hotelid and status=0 order by packagebillid desc");
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <div style="background-color: #fff;height: 856px;width: 670px;margin-left: 170px;margin-top: 50px;  ">
                            <div>
                                <div style="padding: 25px;">
                                    <span><img src="images/waiting.png" width="50px;"/></span>
                                    <span style="font-size: 20px;margin-left: 10px;">waitingvooing</span>
                                </div>
                                <div style="background-color: #eb4a5f;height: 38px;">
                                    <span style="font-size: 33px;position: absolute;background-color: white;padding: 9px; margin: 0px 0 0 454px;">
                                        invoice
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">
                                    <div style="margin: 28px 0 0 42px;">
                                        <div style="font-size: 21px;font-weight: bold;">Invoice To:</div>
                                        <br/>
                                        <div style="font-size: 16px;font-weight: bold;">WaitingVooing</div>
                                        <div>101/1, Richmond Road,<br/>Bangalore 560025, India</div>
                                    </div>
                                    <?php
                                    $bsd = $row[8];
                                    $csdate = date('d-m-y', strtotime($bsd));
                                    $bed = $row[9];
                                    $cedate = date('d-m-y', strtotime($bed));
                                    ?>
                                    <div style="position: absolute;margin: -62px 0 0 461px;line-height: 20px;">
                                        <div><span style="font-weight: bold;">Bill No </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 00<?php echo $row[7]; ?></div>
                                        <div><span style="font-weight: bold;">Start Date</span>&nbsp;&nbsp;&nbsp; <?php echo $csdate; ?></div>
                                        <div><span style="font-weight: bold;">End Date</span>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $cedate; ?></div>
                                    </div>
                                </div>
                                <div style="border: 1px solid;height: 200px;width: 557px;margin: 24px 0 0 55px;">
                                    <table style="width:555px ;">
                                        <tr>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">SL.</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Hotel Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Package Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">DUration</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Amount</th>
                                        </tr>
                                        <tr>
                                            <td style="background: #F2F2F2;text-align: center;">1</td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[15]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[1]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[2]; ?> month</td>
                                            <td style="background: #F2F2F2;text-align: center;"><i class="fa fa-inr" style="font-size: 13px;"></i> <?php echo $row[3]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="margin: 9px 0 0 62px;color: #000;">
                                    <br/>
                                    <span style="letter-spacing: 2px;">
                                        Thank you for your business
                                    </span>
                                    <span style="letter-spacing: 2px;font-weight: bold;margin-left: 157px;">
                                        Sub Total: &nbsp; <?php echo $row[3]; ?>
                                    </span>
                                </div>
                                <?php
                                $gst = ceil($row[3] * 28 / 100);
                                ?>
                                <div>
                                    <span style="margin-left: 504px;letter-spacing: 2px;font-weight: bold;">
                                        GST 28%: &nbsp;&nbsp; <?php echo $gst; ?>
                                    </span>
                                </div>
                                <div style="margin: 55px 0 0 421px;position: absolute;background: #eb4a5f;width: 250px;padding:7px 5px 7px 32px;letter-spacing: 1px;font-size: 19px;">
                                    <span style="font-weight: bold;color: white;">

                                        Total: <span style="margin-left: 20px;font-weight: bold;color: white;"><?php echo $row[3] + $gst; ?></span>
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">

                                    <div style="margin: -7px 0 0 52px;">

                                        <div style="font-size: 18px;font-weight: bold;">From :</div>

                                        <div style="font-size: 14px;font-weight: bold;"><?php echo $row[15]; ?></div>
                                        <div style="width: 273px;position: absolute;"><?php echo $row[16]; ?></div>
                                    </div>
                                </div>
                                <div style="background: #eb4a5f;margin: 142px 0 0 0;height: 7px;">
                                </div>
                                <div style="position: absolute;margin: -41px 0 0 468px;">
                                    <img src="images/bill/signature.png" width="130" />
                                </div>
                                <div>
                                    <span style="margin-left: 453px;background: #fff;padding-top: 10px;padding: 9px 10px 0 10px;letter-spacing: 1px;">
                                        Authorised Sign
                                    </span>
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



    <?php
}
// endbill
?>







<?php
// refer
if ($_SESSION[what] == "refer") {


    $c1 = $con->query("select count(*) from userrefercode");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[refer] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>
                <hr>

                </hr>
            </div>
            <div class="frmdiv">
                <form action="" method="post" name="areafrm">
                    <div>
                        <?php
                        if ($_SESSION[er] == 1) {
                            echo "<font style='color:red'>Already exist</font>";

                            unset($_SESSION[er]);
                        }
                        ?>
                    </div>

                    <div>
                        <select required="" name="user1" >

                            <option value="" >--refercode--</option>
                            <?php
                            $ur = $con->query("select * from userregister");


                            while ($urrow = mysqli_fetch_array($ur)) {
                                ?>


                                <option value="<?php echo $urrow[4]; ?>"><?php echo $urrow[7]; ?></option>


                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div>
                        <select required="" name="user2">

                            <option value="">--select user--</option>
                            <?php
                            $ur = $con->query("select * from userregister");


                            while ($urrow = mysqli_fetch_array($ur)) {
                                ?>


                                <option value="<?php echo $urrow[4]; ?>"><?php echo $urrow[0]; ?></option>


                                <?php
                            }
                            ?>

                        </select>
                    </div>



                    <div>
                        <input type="text" name="refercode" placeholder="enter refercode" required=""/>
                    </div>


                    <div>
                        <input type="text" name="totalamount" placeholder="enter total amount" required=""/>
                    </div>



                    <div>
                        <input type="text" name="billid" placeholder="enter billid" required=""/>
                    </div>


                    <br/>
                    <div>
                        <button type="submit" name="refer" class="btn btn-success btn-block">insert</button>
                        <button type="reset" name="" class="btn btn-danger   btn-block">clear</button>
                    </div>
                </form>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[refer] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[refer] / $perpage);
                    $data = $con->query("select * from userrefercode order by userefercodeid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[refer];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[refer] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" >

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">userid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">userid1</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">userrefercodeid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">refercode</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">totalamount</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">referdiscount</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">billid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">payble</th>


                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from userrefercode where name like '$_REQUEST[id]%' ");
                    } else {
                        $data = $con->query("select * from userrefercode order by userefercodeid desc limit $rs,$perpage ");
                    }
                    while ($row = mysqli_fetch_array($data)) {

                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[1]; ?>
                            </td>
                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <?php echo $row[5]; ?>
                            </td>
                            <td>
                                <?php echo $row[6]; ?>
                            </td>
                            <td>
                                <?php echo $row[7]; ?>
                            </td>
                            <td>
                                <?php echo $row[5] - $row[6]; ?>
                            </td>
                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[0]; ?>)"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[0]; ?>)"></i>
                            </td>

                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="8">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[refer] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="8">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[refer]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end refer
?>






<?php
if ($_SESSION[what] == "mypackage") {

    $bill = $con->query("select * from packagebill  hotelid=$_SESSION[hotelid] and status=0");
    $billrow = mysqli_fetch_array($bill);
    $hbdt = $con->query("select * from hotelregister where hotelid=$_SESSION[hotelid]");
    $hbdtrow = mysqli_fetch_array($hbdt);
    $packdt = $con->query("select * from package where packageid=$billrow[1]");
    $packdtrow = mysqli_fetch_array($packdt);
    ?>




    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 ">
                <div>
                    <?php
                    $data = $con->query("select p.*,pk.*,h.* from package p,packagebill pk,hotelregister h where p.packageid=pk.packageid and pk.hotelid=h.hotelid and status=1 order by packagebillid desc");
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <div style="background-color: #fff;height: 856px;width: 670px;margin-left: 170px;margin-top: 50px;  ">
                            <div>
                                <div style="padding: 25px;">
                                    <span><img src="images/waiting.png" width="50px;"/></span>
                                    <span style="font-size: 20px;margin-left: 10px;">waitingvooing</span>
                                </div>
                                <div style="background-color: #eb4a5f;height: 38px;">
                                    <span style="font-size: 33px;position: absolute;background-color: white;padding: 9px; margin: 0px 0 0 454px;">
                                        invoice
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">
                                    <div style="margin: 28px 0 0 42px;">
                                        <div style="font-size: 21px;font-weight: bold;">Invoice To:</div>
                                        <br/>
                                        <div style="font-size: 16px;font-weight: bold;">WaitingVooing</div>
                                        <div>101/1, Richmond Road,<br/>Bangalore 560025, India</div>
                                    </div>
                                    <?php
                                    $bsd = $row[8];
                                    $csdate = date('d-m-y', strtotime($bsd));
                                    $bed = $row[9];
                                    $cedate = date('d-m-y', strtotime($bed));
                                    ?>
                                    <div style="position: absolute;margin: -62px 0 0 461px;line-height: 20px;">
                                        <div><span style="font-weight: bold;">Bill No </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 00<?php echo $row[7]; ?></div>
                                        <div><span style="font-weight: bold;">Start Date</span>&nbsp;&nbsp;&nbsp; <?php echo $csdate; ?></div>
                                        <div><span style="font-weight: bold;">End Date</span>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $cedate; ?></div>
                                    </div>
                                </div>
                                <div style="border: 1px solid;height: 200px;width: 557px;margin: 24px 0 0 55px;">
                                    <table style="width:555px ;">
                                        <tr>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">SL.</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Hotel Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Package Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">DUration</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Amount</th>
                                        </tr>
                                        <tr>
                                            <td style="background: #F2F2F2;text-align: center;">1</td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[15]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[1]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[2]; ?> month</td>
                                            <td style="background: #F2F2F2;text-align: center;"><i class="fa fa-inr" style="font-size: 13px;"></i> <?php echo $row[3]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="margin: 9px 0 0 62px;color: #000;">
                                    <br/>
                                    <span style="letter-spacing: 2px;">
                                        Thank you for your business
                                    </span>
                                    <span style="letter-spacing: 2px;font-weight: bold;margin-left: 157px;">
                                        Sub Total: &nbsp; <?php echo $row[3]; ?>
                                    </span>
                                </div>
                                <?php
                                $gst = ceil($row[3] * 28 / 100);
                                ?>
                                <div>
                                    <span style="margin-left: 504px;letter-spacing: 2px;font-weight: bold;">
                                        GST 28%: &nbsp;&nbsp; <?php echo $gst; ?>
                                    </span>
                                </div>
                                <div style="margin: 55px 0 0 421px;position: absolute;background: #eb4a5f;width: 250px;padding:7px 5px 7px 32px;letter-spacing: 1px;font-size: 19px;">
                                    <span style="font-weight: bold;color: white;">

                                        Total: <span style="margin-left: 20px;font-weight: bold;color: white;"><?php echo $row[3] + $gst; ?></span>
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">

                                    <div style="margin: -7px 0 0 52px;">

                                        <div style="font-size: 18px;font-weight: bold;">From :</div>

                                        <div style="font-size: 14px;font-weight: bold;"><?php echo $row[15]; ?></div>
                                        <div style="width: 273px;position: absolute;"><?php echo $row[16]; ?></div>
                                    </div>
                                </div>
                                <div style="background: #eb4a5f;margin: 142px 0 0 0;height: 7px;">
                                </div>
                                <div style="position: absolute;margin: -41px 0 0 468px;">
                                    <img src="images/bill/signature.png" width="130" />
                                </div>
                                <div>
                                    <span style="margin-left: 453px;background: #fff;padding-top: 10px;padding: 9px 10px 0 10px;letter-spacing: 1px;">
                                        Authorised Sign
                                    </span>
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





    <?php
}
?>





<?php
if ($_SESSION[what] == "mytran") {

    $bill = $con->query("select * from packagebill  hotelid=$_SESSION[hotelid] and status=0");
    $billrow = mysqli_fetch_array($bill);
    ?>




    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 ">
                <div>
                    <?php
                    $data = $con->query("select p.*,pk.*,h.* from package p,packagebill pk,hotelregister h where p.packageid=pk.packageid and pk.hotelid=h.hotelid and status=1  order by packagebillid desc");
                    while ($row = mysqli_fetch_array($data)) {
                        ?>
                        <div style="background-color: #fff;height: 856px;width: 670px;margin-left: 170px;margin-top: 50px;  ">
                            <div>
                                <div style="padding: 25px;">
                                    <span><img src="images/waiting.png" width="50px;"/></span>
                                    <span style="font-size: 20px;margin-left: 10px;">waitingvooing</span>
                                </div>
                                <div style="background-color: #eb4a5f;height: 38px;">
                                    <span style="font-size: 33px;position: absolute;background-color: white;padding: 9px; margin: 0px 0 0 454px;">
                                        invoice
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">
                                    <div style="margin: 28px 0 0 42px;">
                                        <div style="font-size: 21px;font-weight: bold;">Invoice To:</div>
                                        <br/>
                                        <div style="font-size: 16px;font-weight: bold;">WaitingVooing</div>
                                        <div>101/1, Richmond Road,<br/>Bangalore 560025, India</div>
                                    </div>
                                    <?php
                                    $bsd = $row[8];
                                    $csdate = date('d-m-y', strtotime($bsd));
                                    $bed = $row[9];
                                    $cedate = date('d-m-y', strtotime($bed));
                                    ?>
                                    <div style="position: absolute;margin: -62px 0 0 461px;line-height: 20px;">
                                        <div><span style="font-weight: bold;">Bill No </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 00<?php echo $row[7]; ?></div>
                                        <div><span style="font-weight: bold;">Start Date</span>&nbsp;&nbsp;&nbsp; <?php echo $csdate; ?></div>
                                        <div><span style="font-weight: bold;">End Date</span>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $cedate; ?></div>
                                    </div>
                                </div>
                                <div style="border: 1px solid;height: 200px;width: 557px;margin: 24px 0 0 55px;">
                                    <table style="width:555px ;">
                                        <tr>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">SL.</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Hotel Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Package Name</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">DUration</th>
                                            <th style="background: #363A45;text-align: center;color: #fff;border-radius: 0;padding: 9px 5px;">Amount</th>
                                        </tr>
                                        <tr>
                                            <td style="background: #F2F2F2;text-align: center;">1</td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[15]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[1]; ?></td>
                                            <td style="background: #F2F2F2;text-align: center; text-transform: capitalize;"><?php echo $row[2]; ?> month</td>
                                            <td style="background: #F2F2F2;text-align: center;"><i class="fa fa-inr" style="font-size: 13px;"></i> <?php echo $row[3]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="margin: 9px 0 0 62px;color: #000;">
                                    <br/>
                                    <span style="letter-spacing: 2px;">
                                        Thank you for your business
                                    </span>
                                    <span style="letter-spacing: 2px;font-weight: bold;margin-left: 157px;">
                                        Sub Total: &nbsp; <?php echo $row[3]; ?>
                                    </span>
                                </div>
                                <?php
                                $gst = ceil($row[3] * 28 / 100);
                                ?>
                                <div>
                                    <span style="margin-left: 504px;letter-spacing: 2px;font-weight: bold;">
                                        GST 28%: &nbsp;&nbsp; <?php echo $gst; ?>
                                    </span>
                                </div>
                                <div style="margin: 55px 0 0 421px;position: absolute;background: #eb4a5f;width: 250px;padding:7px 5px 7px 32px;letter-spacing: 1px;font-size: 19px;">
                                    <span style="font-weight: bold;color: white;">

                                        Total: <span style="margin-left: 20px;font-weight: bold;color: white;"><?php echo $row[3] + $gst; ?></span>
                                    </span>
                                </div>
                                <div style="margin-left: 12px;">

                                    <div style="margin: -7px 0 0 52px;">

                                        <div style="font-size: 18px;font-weight: bold;">From :</div>

                                        <div style="font-size: 14px;font-weight: bold;"><?php echo $row[15]; ?></div>
                                        <div style="width: 273px;position: absolute;"><?php echo $row[16]; ?></div>
                                    </div>
                                </div>
                                <div style="background: #eb4a5f;margin: 142px 0 0 0;height: 7px;">
                                </div>
                                <div style="position: absolute;margin: -41px 0 0 468px;">
                                    <img src="images/bill/signature.png" width="130" />
                                </div>
                                <div>
                                    <span style="margin-left: 453px;background: #fff;padding-top: 10px;padding: 9px 10px 0 10px;letter-spacing: 1px;">
                                        Authorised Sign
                                    </span>
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





    <?php
}
?>







<?php
//banquetbooking
if ($_SESSION[what] == "banquetbooking") {
    ?>

    <?php
}
//end banquetbookingg
?>




<?php
//banquet
if ($_SESSION[what] == "banquetrequest") {
    if ($_REQUEST[task] == "dec") {
        $del = $con->query("delete from banquetrequest where requestid=$_REQUEST[id] ");
    }
    if ($_REQUEST[task] == "acc") {
        $up = $con->query("update banquetrequest set status=1 where requestid=$_REQUEST[id] ");
       
        echo "update banquetrequest set status=1 where requestid=$_REQUEST[id] ";
    }
    if ($_REQUEST[task] == "book") {
        $_SESSION[rid] = $_REQUEST[id];
    }
    ?>     
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    <h4>Banquet Request</h4>
                </div>
                <br/>
                <?php
                $bdata = $con->query("select * from banquetrequest where hotelid=$_SESSION[hotelid] and status=0 ");
                while ($brow = mysqli_fetch_array($bdata)) {
                    ?>
                    <div class="banquetbox">
                        <div align="center">
                            <div>
                                <i class="ti-headphone-alt"></i> <span class="bancontact"><?php echo $brow[3]; ?></span>
                                <?php
                                $hhall = $con->query("select * from hotelhall where hallid=$brow[1]");
                                while ($hhallrow = mysqli_fetch_array($hhall)) {
                                    ?>
                                    <div><i class="ti-layout-sidebar-right"></i> <span class="banhallname"><?php echo $hhallrow[2]; ?></span></div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div>
                                <span class="dec" onclick="finddata('<?php echo $_SESSION[what]; ?>','dec',<?php echo $brow[2]; ?>);">Decline</span>
                                <span class="acc" onclick="finddata('<?php echo $_SESSION[what]; ?>','acc',<?php echo $brow[2]; ?>);">Accept</span>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h4>Accept Banquet Request</h4>
                </div>
                <br/>
                <?php
                $bbdata = $con->query("select * from banquetrequest where hotelid=$_SESSION[hotelid] and status=1 ");
                while ($bbrow = mysqli_fetch_array($bbdata)) {
                    ?>
                    <div class="banquetbox">
                        <div align="center">
                            <div>
                                <i class="ti-headphone-alt"></i> <span class="bancontact"><?php echo $bbrow[3]; ?></span>
                                <?php
                                $hhall = $con->query("select * from hotelhall where hallid=$bbrow[1]");
                                while ($hhallrow = mysqli_fetch_array($hhall)) {
                                    ?>
                                    <div ><i class="ti-layout-sidebar-right"></i> <span class="banhallname"><?php echo $hhallrow[2]; ?></span></div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div>
                                <span class="dec" onclick="finddata('<?php echo $_SESSION[what]; ?>','dec',<?php echo $bbrow[2]; ?>);">Decline</span>
                                <span class="book" data-toggle="modal" data-target="#test" onclick="findmodal('booking','',<?php echo $bbrow[2]; ?>);" >Booking</span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
//banquet end
?>






<?php
// rate
if ($_SESSION[what] == "hotelrate") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hotelrate ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hotelrate  where hotelrateid like '$_REQUEST[id]'  ");
    }

    $c1 = $con->query("select count(*) from hotelrate where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[hotelrate] = $cc1[0];
    ?>
    <div class="row">






        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[hotelrate] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[hotelrate] / $perpage);
                    $data = $con->query("select * from hotelrate order by hotelrateid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[hotelrate];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[hotelrate] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover " >

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">userid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">rate</th>
                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from hotelrate  ");
                    } else {
                        
                    }
                    $data = $con->query("select r.*,u.* from hotelrate r,userregister u where r.userid=u.userid and hotelid='$_SESSION[hotelid]' order by r.rate");
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center; " class="userre">
                            <td >

                                <?php
                                if ($row[0] != "") {
                                    echo $row[4] . " " . $row[5];
                                    ?>

                                </td>
                                <td>

                                    <div class="modal-body">
                                        <div style="text-align:center; font-size: 30px; color: yellow;">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $row[3]) {
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
                                </td>




                                <td>
                                    <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[2]; ?>)"></i>
                                </td>
                                <?php
                            }
                            ?>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="4">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[hotelrate] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="9">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[hotelrate]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end rate
?>


<?php
// review
if ($_SESSION[what] == "hotelreview") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hotelreview ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hotelreview  where hotelreviewid like '$_REQUEST[id]'  ");
    }

    $c1 = $con->query("select count(*) from hotelreview where hotelid=$_SESSION[hotelid] ");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[hotelreview] = $cc1[0];
    ?>
    <div class="row">






        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[hotelreview] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[hotelreview] / $perpage);
                    $data = $con->query("select * from hotelreview  order by hotelreviewid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[hotelreview];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[hotelreview] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover " >

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">userid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">rate</th>
                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from hotelreview  ");
                    } else {
                        
                    }
                    $data = $con->query("select r.*,u.* from hotelreview r,userregister u where r.userid=u.userid and hotelid='$_SESSION[hotelid]' order by r.review");
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center; " class="userre">
                            <td >

                                <?php
                                if ($row[0] != "") {
                                    echo $row[5] . " " . $row[6];
                                    ?>

                                </td>
                                <td>

                                    <?php echo $row[3]; ?>
                                </td>




                                <td>
                                    <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[2]; ?>)"></i>
                                </td>
                                <?php
                            }
                            ?>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="4">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[hotelreview] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="9">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[hotelreview]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end review
?>





<?php
// mcategory
if ($_SESSION[what] == "mcategory") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from menucategory ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from menucategory where menucategoryid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from menucategory where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[mcategory] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from menucategory where menucategoryid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[1];
                    ?>
                    <form action="" method="post" name="upmenucategoryfrm" enctype="multipart/form-data" novalidate="">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>


                        <div class="seinput">
                            <input type="text" name="upname"value=" <?php echo $uprow[2]; ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="file" name="icon"value=" <?php echo $uprow[3]; ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="upmenucategory" class="btn btn-success btn-block">Update</button>
                            <button type="reset"  class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="menucategoryfrm" enctype="multipart/form-data">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>    


                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="file" name="icon"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inmenucategory" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[mcategory] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[mcategory] / $perpage);
                    $data = $con->query("select * from menucategory order by menucategoryid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[mcategory];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[mcategory] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" colspan="6" >

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">hotelid</th>

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">icon</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {

                        $data = $con->query("select * from menucategory where name like '$_REQUEST[id]%'");
                    } else {
                        $data = $con->query("select * from menucategory where hotelid=$_SESSION[hotelid] order by  menucategoryid desc limit $rs,$perpage ");
                    }

                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[0]; ?>
                            </td>

                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <img src="../<?php echo $row[3]; ?>" height="100px" width="100px;"/> 
                            </td>

                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[1]; ?>)"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[1]; ?>)"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="6">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[mcategory] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="6">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[mcategory]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end mcategory
?>




<?php
// menuitem 
if ($_SESSION[what] == "menuitem") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from menuitem");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from menuitem where itemid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from menuitem where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[menuitem] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from menuitem where itemid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $row[1];
                    ?>
                    <form action="" method="post" name="upmenuitemfrm" enctype="multipart/form-data">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>

                        <div class="seinput">
                            <input type="text" name="upname" value="<?php echo $uprow[2]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upimage" value="<?php echo $uprow[3]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upprice" value="<?php echo $uprow[4]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="upmenuitem" class="btn btn-success btn-block">Update</button>
                            <button type="reset" name="" class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="menuitemfrm" enctype="multipart/form-data">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div> 






                        <div>

                            <select name="menucategotyid" required="">

                                <option value="">--select menucategory--</option>
                                <?php
                                $data = $con->query("select * from menucategory where hotelid=$_SESSION[hotelid]");
                                while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                    <option value="<?php echo $row[1]; ?>"> <?php echo $row[2]; ?></option>
                                    <?php
                                }
                                ?>


                            </select>

                        </div>


                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="file" name="image"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="price"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[0-9]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inmenuitem" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[menuitem] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[menuitem] / $perpage);
                    $data = $con->query("select * from menuitem order by itemid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[menuitem];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[menuitem] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>

                </p>
                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" >




                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">menucategoryid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">image</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">price</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                       
                    } else {

                        $data = $con->query("select i.*,c.* from menuitem i,menucategory c where i.menucategoryid=c.menucategoryid and hotelid=$_SESSION[hotelid] order by i.itemid desc  $rs ,$perpage");
                    }
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">



                            <td>
                                <?php echo $row[0]; ?>
                            </td>
                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <img src="../<?php echo $row[3]; ?>" height="100px" width="100px;"/>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[1]; ?>);"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[1]; ?>);"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="4">
                        <center>

                            <ul style="background-color: #555;  margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[menuitem] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="3">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[menuitem]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end menuitem
//hoteloffer
?>



<?php
//offer 
if ($_SESSION[what] == "offer") {
    if ($_REQUEST[task] == "appruv") {
        $appdata = $con->query("select * from hoteloffer where offerid=$_REQUEST[id]");
        $approw = mysqli_fetch_array($appdata);
        if ($approw[6] == 0) {
            $appup = $con->query("update hoteloffer set offerrunningstatus=1 where offerid='$_REQUEST[id]'");
        } else {
            $appup = $con->query("update hoteloffer set offerrunningstatus=0 where offerid='$_REQUEST[id]'");
        }
    }


    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hoteloffer");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hoteloffer where hotelofferid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from hoteloffer");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[landmark] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from hoteloffer where hotelofferid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[1];
                    ?>
                    <form action="" method="post" name="uphotelofferfrm">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>

                        <div class="seinput">
                            <input type="text" name="upname" value="<?php echo $uprow[2]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upper" value="<?php echo $uprow[3]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="date" name="upstartdate" value="<?php echo $uprow[4]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="date" name="upenddate" value="<?php echo $uprow[5]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="status" value="<?php echo $uprow[6]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="offer" value="<?php echo $uprow[7]; ?>" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="uplandmark" class="btn btn-success btn-block">Update</button>
                            <button type="reset" name="" class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="landmarkfrm">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div> 









                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="per"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="date" name="startdate"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="date" name="enddate"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>

                        <div class="ininput">
                            <input type="text" name="offer"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inhoteloffer" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <?Php
            $hoffdata = $con->query("select * from hoteloffer where hotelid=$_SESSION[hotelid]");
            while ($hoffrow = mysqli_fetch_array($hoffdata)) {
                ?>
                <div class="col-md-4">
                    <div>
                        offer name:
                        <?php echo $hoffrow[2] ?>
                    </div>
                    <div>
                        offerper:
                        <?php echo $hoffrow[4] ?>
                    </div>
                    <div>
                        offer:
                        <?php echo $hoffrow[5] ?>
                    </div>
                    <div>
                        startdate:
                        <?php echo $hoffrow[6] ?>
                    </div>
                    <div>
                        enddate:
                        <?php echo $hoffrow[3] ?>
                    </div>


                    <?php
                    if ($hoffrow[6] == 1) {
                        ?>
                        <button type="button" class="btn" style="background: green;" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','appruv',<?php echo $hoffrow[1]; ?>);" ><i class="fa fa-thumbs-o-up appu"> &nbsp;Approved</i> </button>
                        <?php
                    } else {
                        ?>
                        <button type="button" class="btn" style="background: red;" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','appruv',<?php echo $hoffrow[1]; ?>);" ><i class="fa fa-thumbs-o-down appu"> &nbsp;Not Approved</i></button>
                        <?php
                    }
                    ?>

                </div>

                <?php
            }
            ?>
        </div>
    </div>               


    <?php
}
//end offer
?>








<?php
// hoteltable
if ($_SESSION[what] == "hoteltable") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hoteltable ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hoteltable where tableid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from hoteltable where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[hoteltable] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from hoteltable where tableid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[1];
                    ?>
                    <form action="" method="post" name="uphoteltablefrm" >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>


                        <div class="seinput">
                            <input type="text" name="uptblno"value=" <?php echo $uprow[2]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upseat"value=" <?php echo $uprow[3]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="uphoteltable" class="btn btn-success btn-block">Update</button>
                            <button type="reset"  class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="hoteltablefrm" >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>    


                        <div class="ininput">
                            <input type="text" name="tblno"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="seat"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inhoteltable" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[hoteltable] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[hoteltable] / $perpage);
                    $data = $con->query("select * from hoteltable order by tableid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[hoteltable];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[hoteltable] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" colspan="6" >

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">hotelid</th>

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">tableno</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">seatno</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">status</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {

                        $data = $con->query("select * from hoteltable where name like '$_REQUEST[id]%'");
                    } else {
                        $data = $con->query("select * from hoteltable where hotelid=$_SESSION[hotelid] order by  tableid desc limit $rs,$perpage ");
                    }

                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[0]; ?>
                            </td>

                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>

                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[1]; ?>)"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[1]; ?>)"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="6">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[hoteltable] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="6">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[hoteltable]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end hoteltable
?>







<?php
//email
if ($_SESSION[what] == "email") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from emailsubscribe");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from emailsubscribe where eid like '$_REQUEST[id]'  ");
    }

    $c1 = $con->query("select count(*) from emailsubscribe");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[emailsubscribe] = $cc1[0];
    ?>
    <div class="row">





        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[emailsubscribe] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[emailsubscribe] / $perpage);
                    $data = $con->query("select * from emailsubscribe order by eid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[emailsubscribe];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[emailsubscribe] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover " >

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">subscribeid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">hotelidlid</th>

                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from emailsubscribe ");
                    } else {
                        
                    }
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center; " class="userre">
                            <td >
                                <?php echo $row[0]; ?>
                            </td>
                            <td>
                                <?php echo $row[1]; ?>
                            </td>



                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[0]; ?>)"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="3">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[emailsubscribe] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="2">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[emailsubscribe]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end email
?>















<?php
//      hotelhall
if ($_SESSION[what] == "hotelhall") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hotelhall ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hotelhall where hallid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from hotelhall where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[hotelhall] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from hotelhall where hallid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[1];
                    ?>
                    <form action="" method="post" name="uphotelhallfrm" enctype="multipart/form-data" >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>


                        <div class="seinput">
                            <input type="text" name="upname"value=" <?php echo $uprow[2]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upcapacity"value=" <?php echo $uprow[3]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="updes"value=" <?php echo $uprow[4]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="uprent"value=" <?php echo $uprow[5]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upfloor"value=" <?php echo $uprow[6]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="uphotelhall" class="btn btn-success btn-block">Update</button>
                            <button type="reset"  class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="hotelhallfrm" enctype="multipart/form-data"  novalidate="" >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>    


                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="capacity"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="des"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="rent"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="floor"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z0-9 ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="file" name="img1"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="file" name="img2"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="file" name="img3"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inhotelhall" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[hotelhall] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[hotelhall] / $perpage);
                    $data = $con->query("select * from hotelhall order by hallid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[hotelhall];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[hotelhall] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" colspan="6" >

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">hotelid</th>

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">hall name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">capacity</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">description</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">rentperday</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">floor</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">img1</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">img2</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">img3</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {

                        $data = $con->query("select * from hotelhall where name like '$_REQUEST[id]%'");
                    } else {
                        $data = $con->query("select * from hotelhall where hotelid=$_SESSION[hotelid] order by  hallid desc limit $rs,$perpage ");
                    }

                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[0]; ?>
                            </td>

                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <?php echo $row[5]; ?>
                            </td>

                            <td>
                                <?php echo $row[6]; ?>
                            </td>
                            <td>
                                <img src="../<?php echo $row[7]; ?>" height="70px" width="70px"/>
                            </td>
                            <td>
                                <img src="../<?php echo $row[8]; ?>" height="70px" width="70px"/>
                            </td>
                            <td>
                                <img src="../<?php echo $row[9]; ?>" height="70px" width="70px"/>
                            </td>


                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[1]; ?>)"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[1]; ?>)"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="9">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[hotelhall] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="6">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[hotelhall]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end hotelhall
?>












<?php
//      hotelwaitinglist
if ($_SESSION[what] == "hotelwaitinglist") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from hotelwaitinglist ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from hotelwaitinglist where waitinglistid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from hotelwaitinglist where hotelid=$_SESSION[hotelid]");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[hotelwaitinglist] = $cc1[0];
    ?>
    <div class="row">

        <div class="col-md-4">
            <div>

                <p>
                    form

                </p>


                </hr>
            </div>
            <div class="frmdiv">
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from hotelwaitinglist where waitinglistid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[1];
                    ?>
                    <form action="" method="post" name="uphotelwaitinglistfrm" enctype="multipart/form-data" >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>



                        <div class="seinput">
                            <input type="text" name="upname" value="<?php echo $uprow[2]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upnop" value="<?php echo $uprow[3]; ?>"required="" pattern="^[a-zA-Z0-9 ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="uphotelwaitinglist" class="btn btn-success btn-block">Update</button>
                            <button type="reset"  class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    
                    //insert
                    ?>
                    <form action="" method="post" name="hotelwaitinglistfrm"  >
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>    



                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="nop"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inhotelwaitinglist" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>



        <div class="col-md-8">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[hotelwaitinglist] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[hotelhall] / $perpage);
                    $data = $con->query("select * from hotelwaitinglist order by waitinglistid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[hotelwaitinglist];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[hotelhall] == 0) {
                echo "no reacord found !";
            } else {
                echo "display record from " . ($rs + 1) . " to " . ($end);
            }
                ?></p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover" colspan="6" >

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">hotelid</th>

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">waiting name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">number of person</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">time</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">date</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">status</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {

                        $data = $con->query("select * from hotelwaitinglist where name like '$_REQUEST[id]%'");
                    } else {
                        $data = $con->query("select * from hotelwaitinglist where hotelid=$_SESSION[hotelid] order by  waitinglistid desc limit $rs,$perpage ");
                    }

                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[0]; ?>
                            </td>

                            <td>
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <?php echo $row[5]; ?>
                            </td>

                            <td>
                                <?php echo $row[6]; ?>
                            </td>


                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[1]; ?>)"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[1]; ?>)"></i>
                            </td>
                        </tr> 
                        <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION[task] != "search") {
                        ?>
                        <tr class="pagetr">
                            <td colspan="6">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[hotelwaitinglist] / $perpage);
                                if ($page <= 5) {
                                    $st = 1;
                                    $ed = $page;
                                } else {
                                    if ($_SESSION[cur] <= 5) {
                                        $st = 1;
                                        $ed = 5;
                                    } else {
                                        $st = $_SESSION[cur] - 4;
                                        $ed = $_SESSION[cur];
                                    }
                                }
                                for ($i = $st; $i <= $ed; $i++) {
                                    if ($i == $_SESSION[cur]) {
                                        ?>
                                        <li class="liveli" onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"> <?php echo $i; ?></li>
                                        <?php
                                    } else {
                                        ?>

                                        <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $i; ?>);"><?php echo $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                if ($page > 5 && $_SESSION[cur] < $page) {
                                    ?>

                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] + 1; ?>);">NEXT</li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </center>
                        </td>
                        </tr>  
                        <?php
                    }
                    ?>


                    <tr>
                        <td colspan="6">

                            <?php
                            if ($_REQUEST[task] == "search") {
                                echo "Total Record Are : $c";
                            } else {
                                echo "Total Record Are : $_SESSION[hotelwaitinglist]";
                            }
                            ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
    <?php
}
//end hotelwaitinglist
?>























<?php
require_once 'allscript.php';
?>


<!--edithotellogo-->
<div class="modal fada" id="starr" >
    <div class="modal-dialog modal-lg" style="width: 600px; ">
        <div class="modal-content" id="rrdata" style="height: 500px;background-color: rgba(0,0,0,0.5); margin-top: 300px; ">

            <div class="modal-header modalhe">
                <h1><font style="color: red;">edit</font> logo&nbsp;<i class="fa fa-image" style="color:#2a363b"></i></h1>
            </div>

            <div class="modalhimage">
                <img src="../<?php echo $horow[8]; ?> " height="200px" width="300px;" />
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="modalep">
                        <input type="file" name="log" />
                        <button type="submit" name="upimg">update logo</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--edithotelimage-->
<div class="modal fada" id="starrr" >
    <div class="modal-dialog modal-lg" style="width: 600px; ">
        <div class="modal-content" id="rrdata" style="height: 600px;background-color:rgba(0,0,0,0.5); margin-top: 300px; ">

            <div class="modal-header modalhe">
                <h1><font style="color: red;">edit</font> tableimage&nbsp;<i class="fa fa-image" style="color: #2a363b"></i></h1>
            </div>

            <div class="modalhimage"style="">
                <img src="../<?php echo $horow[12]; ?> " height="300px"  />
                <form action="" method="post" enctype="multipart/form-data" >
                    <div  class="modalep"style="">
                        <input type="file" name="tbl" style=""/>
                        <button type="submit" name="upimgg" >update image</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<!--edithotel-->
<div class="modal fada" id="edit" >
    <div class="modal-dialog modal-lg" style="width: 1300px; ">

        <div class="modal-content" id="rrdata" style="height: 500px;background-color: rgba(0,0,0,0.5); margin-top: 200px; ">

            <div class="modal-header modalhe">
                <h1><font style="color: red;">edit</font> hotel profile&nbsp;<i class="fa fa-user" style="color: #2a363b;"></i></h1>
            </div>

            <?php
            $edit = $con->query("select * from hotelregister where hotelid=$_SESSION[hotelid]");
            $editrow = mysqli_fetch_array($edit)
            ?>

            <div class="container">
                <div class="row">
                    <form action="" method="post" >
                        <div class="col-md-6" style="margin-top: 20px;padding: 30px;">



                            <div class="inputh">
                                <input class="reghi1" type="text" name="upname" value="<?php echo $editrow[3]; ?>" placeholder="Enter Name" autofocus="" required="" title="only character" pattern="^[a-zA-Z ]*$"/>
                            </div>
                            <div class="inputh">
                                <input class="reghi1" type="text" value="<?php echo $editrow[4]; ?>" name="upaddress"placeholder="Enter Address " required="" title="only character"/>
                            </div> 
                            <div class="inputh">
                                <input class="reghi1" type="text" value="<?php echo $editrow[6]; ?>"name="upcontact" placeholder="Contact" required="" maxlenght="10" title="only diget" pattern="^[0-9]{10}$"/>
                            </div>



                        </div>
                        <div class="col-md-6" style="margin-top: 20px;padding: 30px;">

                            <div class="inputh">   
                                <input class="reghi1"  value="<?php echo $editrow[9]; ?>" type="text" name="upopenday" placeholder="Enter Openday" required=""/>
                            </div>
                            <div class="inputh">
                                <input class="reghi1" value="<?php echo $editrow[10]; ?>" type="text" name="upopentime" placeholder="Enter Opentime" required=""/>
                            </div>

                            <div class="inputh">
                                <input class="reghi1"value="<?php echo $editrow[7]; ?>"  type="email" name="upemail"placeholder="E-mail Address" required=""/>
                            </div>

                        </div>


                        <div class="modal-footer" style="">

                            <div >
                                <button class="loginnbut"  type="submit" name="upprofile" >update</button>
                             
                            </div>
                        </div>


                    </form>
                </div>


            </div>



        </div>

    </div>



