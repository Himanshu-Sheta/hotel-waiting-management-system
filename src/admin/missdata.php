<?php
require_once 'conect.php';
require_once 'adminquery.php';
$_SESSION[what] = $_REQUEST[what];
$perpage = 5;

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
//end confirm admin
// dashboard
if ($_SESSION[what] != "dashboard" && $_SESSION[what] != "otpmobile") {
    ?>


    <?php
}

if ($_SESSION[what] == "dashboard") {
    ?>
    <div class="wrapper">
        <!--area-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6 " onclick="finddata('area','view','1');findbox('area');">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-send"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="320" data-to="320"
                            data-speed="1000">

                        </h1>
                        <p>area</p>
                        <div>
                            <h1>
                                <?php
                                echo $_SESSION[area];
                                ?>
                            </h1>
                        </div>
                    </div>

                </section>
            </div>

            <!--landmark-->      

            <div class="col-lg-3 col-sm-6 " onclick="finddata('landmark','view','1');findbox('landmark');">
                <section class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-language"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="320"
                            data-speed="1000">
                            <!--320-->
                        </h1>
                        <p>landmark</p>
                        <div>
                            <h1>
                                <?php
                                echo $_SESSION[landmark];
                                ?>
                            </h1>
                        </div>
                    </div>
                </section>
            </div>

            <!--user--> 
            <div class="col-lg-3 col-sm-6" onclick="finddata('userregister','view','1');findbox('userregister');">
                <section class="panel ">
                    <div class="symbol purple-color">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="value gray">
                        <h1 class="purple-color timer" data-from="0" data-to="123"
                            data-speed="1000">
                            <!--123-->
                        </h1>
                        <p>User</p>
                        <div>
                            <h1>
                                <?php
                                echo $_SESSION[user];
                                ?>
                            </h1>
                        </div>
                    </div>
                </section>
            </div>

            <!--inquiry-->

            <div class="col-lg-3 col-sm-6" onclick="finddata('inquiry','view','1');findbox('inquiry');">
                <section class="panel">
                    <div class="symbol green-color">
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="value gray">
                        <h1 class="green-color timer" data-from="0" data-to="2345"
                            data-speed="3000">
                            <!--2345-->
                        </h1>
                        <p>inquiry</p>
                        <div>
                            <h1>
                                <?php
                                echo $_SESSION[inquiry];
                                ?>
                            </h1>
                        </div>
                    </div>
                </section>
            </div>

            <!--package-->
            <div class="col-lg-3 col-sm-6" onclick="finddata('package','view','1');findbox('package');">
                <section class="panel green">
                    <div class="symbol ">
                        <i class="fa fa-toggle-on"></i>
                    </div>
                    <div class="value white">
                        <h1 class="timer" data-from="0" data-to="432"
                            data-speed="1000">
                            <!--432-->
                        </h1>
                        <p>package</p>
                        <div>
                            <h1>
                                <?php
                                echo $_SESSION[package];
                                ?>
                            </h1>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>

    <?php
    require_once 'allscript.php';
    ?>


    <?php
}
// end dashboard
?>






<?php
//email
if ($_SESSION[what] == "email") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from subscribe");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from subscribe where subscribeid like '$_REQUEST[id]'  ");
    }

    $c1 = $con->query("select count(*) from subscribe");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[subscribe] = $cc1[0];
    ?>
    <div class="row">





        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[subscribe] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[subscribe] / $perpage);
                    $data = $con->query("select * from subscribe order by subscribeid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[subscribe];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[subscribe] == 0) {
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
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">emailid</th>

                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from subscribe where emailid like '$_REQUEST[emailid]%' ");
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
                                $page = ceil($_SESSION[subscribe] / $perpage);
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
                                echo "Total Record Are : $_SESSION[subscribe]";
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
// area 
if ($_SESSION[what] == "area") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from area ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from area where areaid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from area");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[area] = $cc1[0];
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
                <?php
                if ($_REQUEST[task] == "update") {
                    $updata = $con->query("select * from area where areaid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[0];
                    ?>
                    <form action="" method="post" name="upareafrm">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>

                        <div class="seinput">
                            <input type="text" name="upname"value=" <?php echo $uprow[1] ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="uparea" class="btn btn-success btn-block">Update</button>
                            <button type="reset" name="" class="btn btn-danger   btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="areafrm">
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
                        <br/>
                        <div>
                            <button type="submit" name="inarea" class="btn btn-success btn-block">SUBMIT</button>
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
                if ($_SESSION[area] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[area] / $perpage);
                    $data = $con->query("select * from area order by areaid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[area];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[area] == 0) {
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

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">Name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">Update</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">Delete</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from area where name like '$_REQUEST[id]%' ");
                    } else {
                        
                    }
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $row[1]; ?>
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
                            <td colspan="3">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[area] / $perpage);
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
                                echo "Total Record Are : $_SESSION[area]";
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
//end area
?>







<?php
// landmark 
if ($_SESSION[what] == "landmark") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from landmark");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from landmark  where landmarkid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from landmark");
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
                    $updata = $con->query("select * from landmark where landmarkid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[landmark] = $uprow[1];
                    ?>
                    <form action="" method="post" name="uplandmarkfrm">
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



                        <div>

                            <select name="areaid" required="">

                                <option value="">--select area--</option>
                                <?php
                                $data = $con->query("select * from area");
                                while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                    <option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?></option>
                                    <?php
                                }
                                ?>


                            </select>

                        </div>







                        <div class="ininput">
                            <input type="text" name="name"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?>"pattern="^[a-zA-Z ]*$" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inlandmark" class="btn btn-success btn-block">SUBMIT</button>
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
                if ($_SESSION[landmark] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[landmark] / $perpage);
                    $data = $con->query("select * from landmark order by landmarkid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[landmark];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>
                <p>
                <P style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[landmark] == 0) {
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



                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">area</th>

                    <th style="color:#00; background-color: #555; padding: 15px; text-align: center;">Name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">Update</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">Delete</th>

                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select a.*,l.* from area a,landmark l where name like '$_REQUEST[id]%' ");
                    } else {

                        $data = $con->query("select a.*,l.* from area a,landmark l where a.areaid=l.areaid order by l.areaid desc limit $rs,$perpage ");
                    }
                    while ($row = mysqli_fetch_array($data)) {
                        $c++;
                        ?>
                        <tr style="text-align:center;">



                            <td>
                                <?php echo $row[1]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <i class="ti-reload" style="opacity:1;cursor: progress" onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $row[3]; ?>);"></i>
                            </td>
                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[3]; ?>);"></i>
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
                                $page = ceil($_SESSION[landmark] / $perpage);
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
                                echo "Total Record Are : $_SESSION[landmark]";
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
//end landmark
?>





<?php
// user
if ($_SESSION[what] == "userregister") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from userregister ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from userregister where contact like '$_REQUEST[id]'  ");
    }

    $c1 = $con->query("select count(*) from userregister");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[userregister] = $cc1[0];
    ?>
    <div class="row">





        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[userregister] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[userregister] / $perpage);
                    $data = $con->query("select * from userregister order by userid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[userregister];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;"><?php
            if ($_REQUEST[task] == "search") {
                echo "founded record";
            } else if ($_SESSION[userregister] == 0) {
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

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">FNAME</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">LNAME</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">CONTACT</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">EMAIL</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">USERID</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">REFERPOINT</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">REFERCODE</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">LAST LOGIN</th>
                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from userregister where fname like '$_REQUEST[id]%' ");
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
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
                            </td>
                            <td>
                                <?php echo $row[6]; ?>
                            </td>
                            <td>
                                <?php echo $row[7]; ?>
                            </td>
                            <td>
                                <?php echo $row[8]; ?>
                            </td>


                            <td>
                                <i style="opacity:1;cursor: progress" class="ti-trash" onclick="finddata('<?php echo $_SESSION[what]; ?>','delete',<?php echo $row[2]; ?>)"></i>
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
                                $page = ceil($_SESSION[userregister] / $perpage);
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
                                echo "Total Record Are : $_SESSION[userregister]";
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
//end user
?>





<?php
//new pack request
if ($_SESSION[what] == "newpack") {
    if ($_REQUEST[task] == "appruv") {
        $pb = $con->query("select p.*,pk.* from package p,packagebill pk where p.packageid=pk.packageid and pk.packagebillid=$_REQUEST[id]");
        $pbb = mysqli_fetch_array($pb);
        $dt = date('y-m-d');
        $du = "+$pbb[2] months";
        $end = date('y-m-d', strtotime("$du", strtotime($dt)));
        $up = $con->query("update packagebill set status=1,startdate='$dt',enddate='$end' where packagebillid=$_REQUEST[id] ");
        $up1 = $con->query("update hotelregister set packageconfirmstatus=1 where hotelid=$pbb[5] ");
    }
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
                                    <img src="images/signature.png"  width="130px;" />
                                </div>
                                <div>
                                    <span style="margin-left: 453px;background: #fff;padding-top: 10px;padding: 9px 10px 0 10px;letter-spacing: 1px;">
                                        Authorised Sign
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button  class="btn" style="background: green;" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','appruv',<?php echo $row[7]; ?>);">appruved</button>
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
//end packrequest
?>








<?php
// inquiry
if ($_SESSION[what] == "inquiry") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from inquiry");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from inquiry where inquiryid=$_REQUEST[id]");
    }

    $c1 = $con->query("select count(*) from inquiry");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[inquiry] = $cc1[0];
    ?>
    <div class="row">





        <div class="col-md-12">
            <div>
                <?php
                if ($_REQUEST[task] == "delete" || $_REQUEST[task] == "update") {
                    
                } else {
                    $_SESSION[cur] = $_REQUEST[id];
                }
                if ($_SESSION[inquiry] != 0) {

                    $rs = ($perpage * $_SESSION[cur]) - $perpage;
                    $page = ceil($_SESSION[inquiry] / $perpage);
                    $data = $con->query("select * from inquiry order by inquiryid desc limit $rs,$perpage ");
                    if ($_SESSION[cur] == $page) {
                        $end = $_SESSION[inquiry];
                    } else {
                        $end = $rs + $perpage;
                    }
                }
                ?>

                <p style="font-size: 20px; margin-top: 40px; margin-left: 50px; color: #eb4a5f;">
                    <?php
                    if ($_REQUEST[task] == "search") {
                        echo "founded record";
                    } else if ($_SESSION[inquiry] == 0) {
                        echo "no reacord found !";
                    } else {
                        echo "display record from " . ($rs + 1) . " to " . ($end);
                    }
                    ?>
                </p>


                <hr>

                </hr>
            </div>
            <div class="datadiv table-responsive">

                <table class="table table-hover " >

                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">inquiryid</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">name</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">contact</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">reason</th>
                    <th style="color:#000; background-color: #555; padding: 15px; text-align: center;">date</th>

                    <th style="color:#000; background-color: #555;"</th>



                    <?php
                    $c = 0;

                    if ($_REQUEST[task] == "search") {
                        $data = $con->query("select * from inquiry where name    like '$_REQUEST[id]%' ");
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
                                <?php echo $row[2]; ?>
                            </td>
                            <td>
                                <?php echo $row[3]; ?>
                            </td>
                            <td>
                                <?php echo $row[4]; ?>
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
                            <td colspan="9">
                        <center>

                            <ul style="background-color: #555; width: 100%; margin-top: 10px; ">
                                <?php
                                if ($_SESSION[cur] > 5) {
                                    ?>
                                    <li onclick="finddata('<?php echo $_SESSION[what]; ?>','paging',<?php echo $_SESSION[cur] - 1; ?>);">PREV</li>
                                    <?php
                                }
                                $page = ceil($_SESSION[inquiry] / $perpage);
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
                                echo "Total Record Are : $_SESSION[inquiry]";
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
//end inquiry
?>

<?php
if ($_SESSION[what] == "profile") {
    if ($_REQUEST[task] == "appruv") {
        $appdata = $con->query("select * from hotelregister where hotelid=$_REQUEST[id]");
        $approw = mysqli_fetch_array($appdata);
        if ($approw[13] == 0) {
            $appup = $con->query("update hotelregister set adminconfirmstatus=1 where hotelid='$_REQUEST[id]'");
        } else {
            $appup = $con->query("update hotelregister set adminconfirmstatus=0 where hotelid='$_REQUEST[id]'");
        }
    }
    ?>



    <?php
    $hodata = $con->query("select * from hotelregister ");


    while ($horow = mysqli_fetch_array($hodata)) {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 " style="margin-top: 60px;">

                    <div style="margin-left: 00px;margin-top: 80px;">

                       

                        <div>
                            <img src="http://localhost/waitingvooing/<?php echo $horow[12]; ?>" height="300px" width="420px;"/>
                        </div>


                    </div>


                    <div class="" style="margin-left: 500px;position: absolute;margin-top: -180px; " title="status">
                        <P style=" ">

                            <?php
                            if ($horow[13] == 1) {
                                ?>
                                <button type="submit"   class=" " style="background-color: #009900; width: 150px;height: 40px;" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','appruv',<?php echo $horow[2]; ?>);"><i class="fa fa-thumbs-o-up" style="font-size: 20px;" ></i></button>
                                <?php
                            } else {
                                ?>
                                <button type="submit"  style="background-color: #ff0000;width: 150px; height: 40px;" ondblclick="finddata('<?php echo $_SESSION[what]; ?>','appruv',<?php echo $horow[2]; ?>);"><i class="fa fa-thumbs-o-down" style="font-size: 20px;"></i></button>
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

                                    <img src="http://localhost/waitingvooing/<?php echo $horow[8]; ?>" height="150px" width="230px;"  />

                                  
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
}
?>




<?php
// start package

if ($_SESSION[what] == "package") {
    if ($_REQUEST[task] == "deleteall") {
        $del = $con->query("delete from package ");
    }
    if ($_REQUEST[task] == "delete") {
        $del = $con->query("delete from package ");
    }

    $c1 = $con->query("select count(*) from package");
    $cc1 = mysqli_fetch_array($c1);
    $_SESSION[package] = $cc1[0];
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
                    $updata = $con->query("select * from package where packageid=$_REQUEST[id]");
                    $uprow = mysqli_fetch_array($updata);
                    $_SESSION[id] = $uprow[0];
                    $_SESSION[path] = $uprow[1];
                    ?>
                    <form action="" method="post" name="upareafrm" novalidate="">
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>

                        <div class="seinput">
                            <input type="text" name="upname"value=" <?php echo $uprow[1] ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upduration"value=" <?php echo $uprow[2] ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="text" name="upamount" value=" <?php echo $uprow[3] ?>"required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="seinput">
                            <input type="file" name="upicon"value=" <?php echo $uprow[4] ?>"required="" pattern="^[a-zA-Z ]*$"/>

                            <div>
                                <button type="submit" name="uppackage" class="btn btn-success btn-block">Update</button>
                                <button type="reset" name="" class="btn btn-danger   btn-block">clear</button>
                            </div>

                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method="post" name="packagefrm" enctype="multipart/form-data">       
                        <div>
                            <?php
                            if ($_SESSION[er1] == 1) {
                                echo "<font style='color:red'>Already exist</font>";

                                unset($_SESSION[er1]);
                            }
                            ?>
                        </div>    
                        <div class="ininput">
                            <input type="text" name="name" placeholder="Enter <?php echo $_SESSION[box]; ?> name"  style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="duration"  placeholder="Enter <?php echo $_SESSION[box]; ?>duration"style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">
                            <input type="text" name="amount"   placeholder="Enter <?php echo $_SESSION[box]; ?> amount" style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <div class="ininput">

                            <input type="file"  name="package"  required="" placeholder="Enter <?php echo $_SESSION[box]; ?> package"  style="width: 300px; height: 35px; margin-left: 100px;"/>
                        </div>
                        <br/>
                        <div>
                            <button type="submit" name="inpackage" class="btn btn-success btn-block">SUBMIT</button>
                            <button type="reset" name="" class="btn btn-danger btn-block">clear</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>

        </div>


        <div class="col-md-8">








            <div class="mainpackage">

                <?php
                //package

                $pack = $con->query("select * from package");
                while ($packrow = mysqli_fetch_array($pack)) {
                    ?>


                    <div class="col-md-4">
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
                                    <?php echo$packrow[3]; ?>
                                </p>
                            </div>
                            <div class="pack11">
                                <P class="pckimg">

                                    <img src="http://localhost/admin/<?php echo $packrow[4]; ?>"height="100px" width="100px"  onclick="finddata('<?php echo $_SESSION[what]; ?>','update',<?php echo $packrow[0]; ?>)"/>  

                            </div>
                            <div>
                                <button type="submit" name="imgedit" data-target="#uppack" data-toggle="modal">editimg</button>
                            </div>

                            <br/>
                            </p>
                        </div>


                    </div>












                    <?php
                }

                //endpackage
                ?>
            </div>
        </div>






    </div>
    <?php
}
//end package
?>








<div class="modal fada" id="uppack" >
    <div class="modal-dialog modal-lg" style="width: 1000px; ">
        <div class="modal-content" id="rrdata" style="height: 500px;background-color: #f5f5f5; margin-top: 300px; ">


            <img src="http://localhost/admin/<?php echo $packrow[4]; ?>" height="200px" width="200px;" />
            <form action="" method="post" enctype="multipart/form-data" >
                <div>
                    <input type="file" name="upi" />
                    <button type="submit" name="packimg">updateimg</button>
                </div>
            </form>
        </div>

    </div>
</div>
