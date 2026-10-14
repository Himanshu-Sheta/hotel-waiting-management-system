<?php
require_once 'conect.php';
$_SESSION[page] = "login";
if ($_REQUEST[where] != "") {
    ?>

    <script type="text/javascript">
        window.open('http://skysparrow.in/send_sms.php?mobile=<?php echo $_SESSION[otpuser]; ?>&message=<?php echo $_SESSION[mssg]; ?>'+msg,'_blank','width=500,height=500');
    </script>

    <?php
}


unset($_SESSION[fname]);
unset($_SESSION[lname]);
unset($_SESSION[otpuser]);
unset($_SESSION[msg]);


if (isset($_REQUEST[login])) {

    $userid = $con->real_escape_string($_REQUEST[username]);
    $password = $con->real_escape_string($_REQUEST[password]);

    $data = $con->query("select * from userregister where userid like '$userid' and password like '$password'");
    $rdata = mysqli_fetch_array($data);

    if ($rdata[0] == "") {
        $er = 1;
    } else {

        if (isset($_REQUEST[rem])) {
            setcookie("userid", $rdata[4], time() + 60 * 60 * 24 * 30, "/");
            setcookie("password", $rdata[5], time() + 60 * 60 * 24 * 30, "/");
        } else {
            if (isset($_COOKIE[userid])) {
                setcookie("userid", $rdata[4], time() - 1, "/");
                setcookie("password", $rdata[5], time() - 1, "/");
            }
        }

        $_SESSION[userid] = $rdata[4];
        $_SESSION[username] = $rdata[1] . " " . $rdata[0];
        $_SESSION[lastlogin] = $rdata[8];
        $_SESSION[logintime] = date('d-m-Y h:i:s');

        header('location:usermaster.php');
    }
}
?>
<html>

    <?php
    require_once 'head.php';
    ?>

    <body >
        <?php
        require_once 'header1.php';
        require_once 'header2.php';
        ?>




     

        <h2 class="form-heading" id="start">login</h2>

        <div class="container log-row login-body">
            <form action="" method="post" class="form-signin" >
                <div class="login-wrap">
                    <?php
                    if ($er == 1) {
                        ?>

                        <p style="color:red;text-align: center; font-size:20px;">invalid user</p>

                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_COOKIE[userid])) {
                        ?>
                        <div class="wrap-input100 validate-input" data-validate="Name is required">


                            <input type="text" class="form-control" name="username" value="<?php echo $_COOKIE[userid]; ?>" required="" placeholder="Userid" autofocus=""/>
                        </div>

                        <?php
                    } else {
                        ?>
                        <div class="wrap-input100 validate-input" data-validate="Name is required">



                            <input type="text" class="form-control" name="username" required="" placeholder="Userid" autofocus=""/>

                        </div>
                        <?php
                    }
                    ?>  


                    <?php
                    if (isset($_COOKIE[password])) {
                        ?>
                        <div class="wrap-input100 validate-input">

                            <input type="password" id="ps"class="form-control" name="password" value="<?php echo $_COOKIE[password]; ?>" required="" placeholder="Password"/>
                            <i class="fa fa-eye" id="eye"  style= "font-size: 30px; position: absolute;margin-top: -55px; margin-left: 290px; color:rgba(0,0,0,0.5); cursor: pointer;"></i>

                        </div>
                        <?php
                    } else {
                        ?>

                        <div class="wrap-input100 validate-input">
                            <input class="form-control" id="ps"  type="password" name="password" placeholder="Password" required=""/>
                            <i class="fa fa-eye" id="eye"  style= "font-size: 30px; position: absolute;margin-top: -55px; margin-left: 290px; color:rgba(0,0,0,0.5);  cursor: pointer;"></i>

                        </div>

                        <?php
                    }
                    ?>




                    <button class="btn btn-lg btn-success btn-block logbtn" type="submit" name="login">boot up</button>
                    <button class="btn btn-lg btn-success btn-block logbtn" type="reset">Negate</button>

                    <br/>

                    <?php
                    if (isset($_COOKIE[userid])) {
                        ?>

                        <label class="checkbox-custom check-success">
                            <input type="checkbox" checked="" name="rem" id="ckb1"/> <label for="checkbox1">Remember me</label>
                        </label>
                        <?php
                    } else {
                        ?>

                        <label class="checkbox-custom check-success">
                            <input type="checkbox"  name="rem" id="ckb1"/> <label for="checkbox1">Remember me</label>
                        </label>


                        <?php
                    }
                    ?>

                    <label class="checkbox-custom check-success">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="pull-right" href="otp.php#start"> Forgot Password?</a>
                    </label>
                    <br/>
                    <div class="registration">
                        Don't have an account yet?
                        <a class="" href="register.php#start">
                            Create an account
                        </a>
                    </div>

                </div>



            </form>
        </div>


        <!--jquery-1.10.2.min-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!--Bootstrap Js-->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jrespond..min.html"></script>




        <?php
        require_once 'footer1.php';
        require_once 'footer2.php';
        require_once 'footer3.php';
        ?>

        <?php
        require_once 'allscript.php';
        ?>
    </body>
</html>
