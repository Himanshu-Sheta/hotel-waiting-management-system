<?php
require_once 'conect.php';
?>

<?php
if (isset($_REQUEST[verify])) {
    $data = $con->query("select * from otpverify where contact like '$_SESSION[otpuser]'");
    $row = mysqli_fetch_array($data);
    if ($row[0] == "") {
        $er = 1;
    } else {

        $myotp = $_REQUEST[1] . $_REQUEST[2] . $_REQUEST[3] . $_REQUEST[4];
        if ($myotp == $row[2]) {
            $data1 = $con->query("select * from userregister where contact like '$_SESSION[otpuser]'");
            $row1 = mysqli_fetch_array($data1);

            $msg = "[$row1[5]] is your waitingvooing password. login again.";
            sendsms($msg, $_SESSION[otpuser]);
            $up = $con->query("update otpverify set status=1 where contact like '$_SESSION[otpuser]'");

            header('locstion:login.php#start');
        } else {
            $er = 1;
        }
    }
}
if (isset($_REQUEST[otp])) {
    $data = $con->query("select * from userregister where contact like '$_REQUEST[mobile]'");
    $row = mysqli_fetch_array($data);
    if ($row[0] == "") {
        $er = 1;
    } else {

        $_SESSION[otpuser] = $_REQUEST[mobile];
        $data = $con->query("select * from otpverify where contact like '$_REQUEST[mobile]'");
        $row = mysqli_fetch_array($data);
        if ($row[0] == "") {

            $otp = rand(10, 99) . rand(10, 99);
            $msg = "$otp is OTP to proceed with waitingvooing password recovery. after verify successly you got your password as TEXT SMS.do not share with anyone.";
            sendsms($msg, $_SESSION[otpuser]);
            $in = $con->query("insert into otpverify values(0,'$_REQUEST[mobile]',$otp,0)");
        } else {
            if ($row[3] == 0) {

                $msg = "$row[2] is OTP to proceed with waitingvooing password recovery. after verify successly you got your password as TEXT SMS.do not share with anyone.";
                sendsms($msg, $_SESSION[otpuser]);
            } else {

                $msg = "$otp is OTP to proceed with waitingvooing password recovery. after verify successly you got your password as TEXT SMS.do not share with anyone.";

                $otp = rand(10, 99) . rand(10, 99);
                $_SESSION[msg] = $msg;
                $up = $con->query("update otpverify set otp=$otp,status=0 where contact like '$_REQUEST[mobile]'");
                header('location:login.php?where=forget#start');
            }
        }
    }
}

function sendsms($m, $s) {
    ?>
    <script type="text/javascript">
          
        window.open('http://skysparrow.in/send_sms.php?mobile=<?php echo $m; ?>&message=<?php echo $s; ?>','_blank','width=500,height=500');
    </script>
    <?php
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

        <div class="container-fluid" id="start" >
            <div class="row ">

                <div class="col-md-6"style=" height:1000px; background-color: #999">

                    <div style="height:50%; background-color: #999; ">
                        <i class="fa fa-mobile-phone" style="font-size:150px; margin-left: 400px; text-align: center; margin-top: 150px;"></i>
                        <p style="margin-top: 10px; color:black; font-size: 25px; margin-left: 380px;" class="animated rubberBand infinite">get otp</p>
                    </div>
                    <form action="" method="post" name="otpfrm">
                        <div style="height:50%; background-color: #999; ">

                            <div class="divphon">
                                <?php
                                if ($er == 1) {
                                    echo "<font style=color:red;>NOT REGISTER</font>";
                                }
                                ?>
                                <input class="phinput" type="text" name="mobile" autofocus="" required="" pattern="^[0-9]{10}*$" id="rc"  placeholder="your Mobile Number" maxlength="10"/>

                            </div>

                            <div>
                                <p style="color:#f9f9f9; padding: 15px; margin-left: 270px;">we will send you a one time sms messages</p>
                            </div>

                            <div class="" style="margin-top: 20px;">
                                <button type="submit" name="otp" class="otpbut">
						Get OTP
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-md-6 offset-md-3" style="background-color: #f1f1f1; height:1000px; " >



                    <div class="otpboxx">
                        <form action="" method="post">

                            <div class="hed">
                                <h2 style="font-size: 20px; margin-left: 250px; padding: 50px 0px 0px 0px; ">verification code</h2>

                            </div>
                            <div>
                                <p style="margin-left: 230px;">please type the verification code </p>
                            </div>
                            <div class="mainotpbox">
                                <div>
                                    <input type="text"  name="1" class="ootp" required=""  maxlength="1" pattern="^[0-9]*$" />



                                    <input type="text" name="2" class="ootp" required=""  maxlength="1" pattern="^[0-9]{1}*$"/>



                                    <input type="text"  name="3" required="" class="ootp" maxlength="1" pattern="^[0-9]{1}*$"/>



                                    <input type="text" name="4" required="" class="ootp" maxlength="1" pattern="^[0-9]{1}*$"/>

                                </div>


                                <div class="" style="margin-top: 20px;">
                                    <button type="submit" name="verify" class="otpbutt">
						Get password    
                                    </button>
                                </div>



                            </div>

                        </form>
                    </div>

                </div>

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

    </body>
</html>