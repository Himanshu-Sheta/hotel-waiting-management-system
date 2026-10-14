    <?php
require_once 'conect.php';
$_SESSION[page] = "usermaster";

if (isset($_REQUEST[cgpassword])) {

    $check = $con->query("select * from userregister where password like '$_REQUEST[password]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {
        $up = $con->query("update userregister set password='$_REQUEST[uppassword]' where userid='$_SESSION[userid]'");
    } else {
        $_SESSION[er1] = 1;
    }
    unset($_SESSION[id]);

    header('location:login.php');
}
if ($_SESSION[userid] == "") {
    header('location:index.php');
}

if (isset($_REQUEST[ep])) {


    $up = $con->query("update userregister set fname='$_REQUEST[fname]',lname='$_REQUEST[lname]',contact='$_REQUEST[contact]',email='$_REQUEST[email]' where userid='$_SESSION[userid]'");
}
?>
<html>
    <?php
    require_once 'head.php';
    ?>
    <body>

        <?php
        require_once 'header1.php';
        require_once 'header2.php';
        ?>

        
       
        
        <div class="container">
            <div class="row">
                <div class="col-md-6 animated fadeInLeftBig">
                    <img src="images/panda.png" style="height: 200px;margin-top: 30px; margin-left:100px; " class="animated rubberBand"/>
                    <div class="weluser">

                        <?php
                            $dt=$con->query("select * from userregister where userid='$_SESSION[userid]'");
                            $dtt=  mysqli_fetch_array($dt)
                        ?>
                        
               
                        <br/>
                        <div style="margin-top: -30px;">
                        welcome <font style="color:#eb4a5f;"><?php echo $_SESSION[username]; ?></font>
                        </div>
                        <br/>
                    </div>

                    <div class="lastseen">
                        last seen: <?php echo $_SESSION[lastlogin]; ?>

                    </div>
                        
                    <form action="" method="post" name="logout">

                        <a href="logout.php" <button class="logoutbut" name="logout" style="height: 50px;"/>logout</button></a>

                    </form>
                </div>


                <div class="col-md-6 maindeshbox" style=" " id="#start"> 
                    <div class="col-md-3 deshbox" >

                        <a href="javascript:void(0);" data-toggle="modal"  role="dialog" data-target="#cp"> <center>  <i class="fa fa-lock " style="font-size: 30px; color:#f1f0f0;margin-top:10px;" > <p style=" color: white;"><b>change<br/>password</b></p></i></center></a>


                    </div>
                    <div class="col-md-3 deshbox" >

                        <a href="javascript:void(0)" data-toggle="modal" data-target="#ep"> <center>  <i class="fa fa-user" style="font-size: 30px; color:white; margin-top: 10px;" > <p style=" color: white; "><b>EDIT<br/>profile</b></p></i></center></a>


                    </div>




                </div>

            </div>
        </div>

        <?php
        require_once 'footer1.php';
        require_once 'footer2.php';
        require_once 'footer3.php';
        ?>


        <?php require_once 'allscript.php'; ?>


        <div class="modal fada" id="cp">
            <div class="modal-dialog modal-lg  ">
                <div class="modal-content" style="height: 300px;background-color: #f5ff0; margin-top: 300px; ">

                    <div class="modal-header">
                        <p style="font-size:20px; color: black;text-align: center;"><b>change password</b><i class="ti-lock animated swing infinite" style="margin-left: 5px; font-size: 25px;color: red; "></i></p>

                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form  action="" method="post" onsubmit="return checkpasss();">
                                        <div class="inputh">
                                            <input class="hi2" type="text"  name="uppassword" id="pss" placeholder="create password" autofocus="" required="" title="only character" pattern="^[a-zA-Z0-9 ]*$"/>
                                        </div>

                                        <div class="inputh">
                                            <input class="hi2" type="text" name="cpassword" id="repasss" placeholder="confirm password" autofocus="" required="" title="only character" pattern="^[a-zA-Z0-9 ]*$"/>
                                        </div>

                                        <button class="contact100-form-btnn" type="submit" name="cgpassword" >submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        
                    </div>

                </div>

            </div>
        </div>

        <div class="modal fada" id="ep">
            <div class="modal-dialog modal-lg  ">
                <div class="modal-content" style="height: 400px;background-color: #f5ff0; margin-top: 300px; ">

                    <div class="modal-header">
                        <p style="font-size:20px; color: black;text-align: center;"><b>edit profile</b><i class="ti-user animated swing infinite" style="font-size: 25px; margin-left: 5px;color: red; "></i></p>


                    </div>

                    <?php
                    $epdata = $con->query("select * from userregister where userid='$_SESSION[userid]'");
                    $eprow = mysqli_fetch_array($epdata);
                    ?>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                
                                    
                               

                                <div class="col-md-12">
                                    <form  action="" method="post" onsubmit="return checkpasss();">
                                        <div class="inputh">
                                            <input class="hi2" type="text" value="<?php echo $eprow[0] ?>" name="fname" autofocus="" pattern="^[a-zA-Z]*$" placeholder="Enter First Name" required="" autocomplete="off" title="Only Alpha"/>

                                        </div>

                                        <div class="inputh">
                                            <input class="hi2" type="text" value="<?php echo $eprow[1] ?>" name="lname" placeholder="Enter Last Name" pattern="^[a-zA-Z]*$" required=""/>

                                        </div>

                                        <div>
                                            <input class="hi2" type="text" value="<?php echo $eprow[2] ?>" maxlength="10" pattern="^[0-9]{10}*$" name="contact" placeholder="Enter contact" required=""/>

                                        </div>

                                        <div>
                                            <input class="hi2" type="email" value="<?php echo $eprow[3] ?>" name="email" placeholder="Enter Email" required=""/>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="contact100-form-btnn animated rubberBand" type="submit" name="ep" >update</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </body>


</html>