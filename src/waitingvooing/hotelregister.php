
<?php
require_once 'conect.php';
$_SESSION[page] = "hotelregister";
if (isset($_REQUEST[hotelregister])) {
    $f = 0;
    $data = $con->query("select email from hotelregister");
    while ($row = mysqli_fetch_array($data)) {
        if (!strcasecmp($_REQUEST[email], $row[0])) {
            $f = 1;
            break;
        }
    }
    if ($f == 0) {


        $newname = $_REQUEST[name] . "." . substr($_FILES[logo][type], 6);
        $setpath = dirname(__FILE__) . "/logo/" . $newname;
        $path = "logo/" . $newname;
        move_uploaded_file($_FILES[logo][tmp_name], $setpath);

        $newname2 = $_REQUEST[name] . "." . substr($_FILES[tableimage][type], 6);
        $setpath2 = dirname(__FILE__) . "/tableimage/" . $newname2;
        $path2 = "tableimage/" . $newname2;
        move_uploaded_file($_FILES[tableimage][tmp_name], $setpath2);
        if (isset($_REQUEST[wifi])) {
            $wifi = 1;
        } else {
            $wifi = 0;
        }
        if (isset($_REQUEST[refercodestatus])) {
            $rcs = 1;
        } else {
            $rcs = 0;
        }
        $in = $con->query("insert into hotelregister values($_REQUEST[areaid],$_REQUEST[landmarkid],0,'$_REQUEST[name]','$_REQUEST[address]','$_REQUEST[map]','$_REQUEST[contact]','$_REQUEST[email]','$path','$_REQUEST[openday]','$_REQUEST[opentime]','$wifi','$path2','0','0','$rcs')");
        //   echo "insert into hotelregister values($_REQUEST[areaid],$_REQUEST[landmarkid],0,'$_REQUEST[name]','$_REQUEST[address]','$_REQUEST[map]','$_REQUEST[contact]','$_REQUEST[email]','$path','$_REQUEST[openday]','$_REQUEST[opentime]','$wifi','$path2','0','0','$rcs')";
        // header('location:hotellogin.php');
    }
}
?>

<html lang="en">

    <?php require_once 'head.php'; ?>






    <body translate="no" style="background-image: url('images/bgphoto.jpg'); background-size:cover;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-8 hed1" style="background-color: #ffffff; height: 70px;" >

                        <h2>BECOME OVER CONTRIBUTER</h2>
                        <a href="hoteldesh.php" ><img src="images/logo/waiting.png"  /></a>
                    </div>
                    <div class="col-md-4" style="background-color: #ffffff; height: 70px;" >
                        <div class="language-currency" id="language-currency">

                            <a href="hotelregister.php"  style="font-size:18px; letter-spacing: 2px; color:black"  > <span class="fa fa-user " style="color:black; font-size: 25px;  padding: 10px;" title="hotel register"></span>hotel register</a>


                        </div>
                        <div class="language-currency" id="language-currency">

                            <a href="hotellogin.php"  style="font-size:18px; letter-spacing: 2px; color:black"  > <span class="fa fa-lock " style="color:black;padding: 10px; font-size: 25px;" title="login"></span>login</a>


                        </div>
                    </div>


                </div>

            </div>


        </div>


        <div class="container">
            <div class="row" style="margin-top: 350px; margin-left: -100px;">


                <form   action="" method="post" name="regform" class="" onsubmit="return checkpass();" enctype="multipart/form-data">
                    <div class="col-md-4">







                        <div class="inputh">
                            <select name="areaid" required="" class="reghi1" onchange="comboleva('landmark',this.value);">

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

                        <div class="inputh">
                            <select name="landmarkid"  required="" class="reghi1" id="landmarkcombo">

                                <option value="">--select landmark--</option>

                            </select>
                        </div>


                        <div class="inputh">
                            <h5 style="font-size: 16px;letter-spacing: 1px; margin-left: 50px;text-align: center; ">  <i class="fa fa-hand-o-right"></i>&nbsp;choose logo</h5>
                            <input type="file" name="logo" class="logoreghi1" />
                        </div>

                        <div class="inputh">
                            <h5 style="font-size: 16px;letter-spacing: 1px; margin-left: 100px;text-align: center; ">  <i class="fa fa-hand-o-right"></i>&nbsp;choose tableimage</h5>
                            <input class="logoreghi1" type="file" name="tableimage" multiple="" required=""/>
                        </div>


                        <div class="cheinputh">
                            <h5 style="font-size: 16px;letter-spacing: 1px; margin-left: -20px; ">  <i class="fa fa-hand-o-right"></i>&nbsp;allow refercode </h5> <input  class="reghi1" type="checkbox" name="refercodestatus" value="1"/></i> 

                        </div>

                       









                    </div>
                    <div class="col-md-4" >



                        <div style="position: absolute;margin-top: -100px;margin-left: 120px;">
                            <h1 style="font-size: 30px;color: white;"> <font style="color: #eb4a5f;">h</font>otel register</h1>
                        </div>





                        <?php
                        if ($f == 1) {
                            echo 'already taken!';
                        }
                        ?>

                        <div class="inputh">
                            <input class="reghi1" type="text" name="name" placeholder="Enter Name" autofocus="" required="" title="only character" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div class="inputh">
                            <input class="reghi1" type="text" name="address"placeholder="Enter Address " required="" title="only character"/>
                        </div> 
                        <div class="inputh">
                            <input class="reghi1" type="text" name="contact" placeholder="Contact" required="" maxlenght="10" title="only diget" pattern="^[0-9]{10}$"/>
                        </div>

                        <div class="col-md-10 captchaa1">
                            <input type="text" value="" oncopy="return false" disabled="" id="captch"  style="color:#2a363b; background-color: #999; letter-spacing: 9px;" />
                            <i class="fa fa-refresh" id="ref" style="font-size: 25px; cursor: pointer; margin-top: -30px;margin-left: 350px;" > </i>
                        </div>




                        <div class="col-md-10 captchaa2">
                            <input type="text" id="ccaptch" style="width: 220px;" />
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                        <div style="position: absolute;margin-top: 180px;">
                            <button class="loginnbut"  type="submit" name="hotelregister" >Register</button>
                            <button class="loginnbut" type="reset">Clear</button>
                        </div>










                    </div>
                    <div class="col-md-4">




                        <div class="inputh">
                            <input class="reghi1" type="text" name="map"placeholder="Enter Maplink" required=""/>
                        </div>


                        <div class="inputh">   
                            <input class="reghi1" type="text" name="openday" placeholder="Enter Openday" required=""/>
                        </div>
                        <div class="inputh">
                            <input class="reghi1" type="text" name="opentime" placeholder="Enter Opentime" required=""/>
                        </div>

                        <div class="inputh">
                            <input class="reghi1" type="email" name="email"placeholder="E-mail Address" required=""/>
                        </div>
                         <div class="cheinputh">
                            <h5 style="font-size: 16px;letter-spacing: 1px; margin-left: -20px; ">  <i class="fa fa-hand-o-right"></i>&nbsp;allow wi-fi</h5> <input  class="reghi1"type="checkbox" name="wifi" value="1"/></i>  

                        </div>










                    </div>
                </form>
            </div>
        </div>






        <?php require_once 'allscript.php'; ?>




    </body>
</html>
