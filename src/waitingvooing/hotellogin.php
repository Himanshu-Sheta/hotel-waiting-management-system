<?php
require_once 'conect.php';
$_SESSION[page] = 'loginmaster';
if (isset($_REQUEST[getotp])) {
    $_SESSION[hotelcontact] = $_REQUEST[mobile];
    $data = $con->query("select * from hotelregister where contact like '$_REQUEST[mobile]'");
    $rdata = (mysqli_fetch_array($data));
    if ($rdata[0] == "") {
        $er1 = 1;
    } else {
        $_SESSION[hotelregister] = $rdata[0];
        $_SESSION[hotelname] = $rdata[1];
        $_SESSION[otp] = rand(10, 99) . rand(10, 99);
        ?>
        <script type="text/javascript">
            var msg=<?php echo $_SESSION[otp]; ?>+"is otp to process with admin log in do not share anyone";   
            window.open('http://skysparrow.in/send_sms.php?mobile=<?php echo $_REQUEST[mobile]; ?>&message='+msg,'_blank','width=500,height=500');
        </script>
        <?php
    }
}
//verify otp
if (isset($_REQUEST[verify])) {
    $myotp = $_REQUEST[otpm1] . $_REQUEST[otpm2] . $_REQUEST[otpm3] . $_REQUEST[otpm4];
    if ($_SESSION[otp] == $myotp) {

        $hdata = $con->query("select * from hotelregister where contact='$_SESSION[hotelcontact]'");
        $hrow = mysqli_fetch_array($hdata);

        $_SESSION[hotelid] = $hrow[2];
        unset($_SESSION[otp]);
        $_SESSION[page] = "dashboard";
        header('location:hotel/index1.php');
    } else {
        $er = 1;
    }
}
?>


<html lang="en">
    <head>
<?php require_once 'head.php'; ?>
    </head>

    <body style="background-image: url('images/dd.png'); background-size:cover;" >


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
            <div class="row">
                <div class="col-md-6 " style="padding: 50px;"> 

                    <div class="row">

                        
                       
                        
                        <div class="col-md-12" style="margin-top: 50px; ">
                            <form action="" method="post" name="otpform" autocomplete="off">


                                <input type="text" class="moinput" id="rc" name="mobile" autofocus="" maxlength="10" placeholder="Enter Mobile NO" name="otpm" required=""/>
                                <center><button class="loginbut" type="submit" name="getotp">Get Otp</button></center>
                            </form>
                        </div>
                        <form action="" method="post" name="otpform2" autocomplete="off">
                            <div class="row">

                                <div class="otpbox">
                                    <div class="">

                                        <input type="text" class="ootp"  name="otpm1" maxlength="1" required="" pattern="^[0-9]{1}"/>
                                        <input type="text" class="ootp"  name="otpm2" maxlength="1" required="" pattern="^[0-9]{1}"/>
                                        <input type="text" class="ootp"  name="otpm3" maxlength="1" required="" pattern="^[0-9]{1}"/>
                                        <input type="text" class="ootp"  name="otpm4" maxlength="1" required="" pattern="^[0-9]{1}"/>

                                    </div>
                                </div>   

                                <div class="row">
                                    <div>

                                        <center><button class="loginbut" type="submit" name="verify">verify</button></center>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>

                </div>




                <div class="col-md-6"style="" > 

                    
                    <div style="margin-top: 100px;">
                        <img src="" width="700px;" style="margin-left: 100px;"/>
                    </div>
                    
                </div>
            </div>
        </div>






<?php require_once 'allscript.php'; ?>




    </body>
</html>