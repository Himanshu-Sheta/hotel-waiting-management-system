
<?php
require_once 'conect.php';

unset($_SESSION[what]);
if (isset($_REQUEST[verify])) {
    $myotp = $_REQUEST[1] . $_REQUEST[2] . $_REQUEST[3] . $_REQUEST[4];


    if ($_SESSION[otp] == $myotp) {

        $_SESSION[what] = "dashboard";
        unset($_SESSION[otp]);
        header('location:dashboard.php');
    } else {
        $er1 = 1;
    }
}
?>
<html>

    <?php
    require_once 'head.php';
    ?>

    <body style="background-image: url('images/dd.png'); background-size:cover;">


        <div class="container">

            <div class="row">

                <div class="col-md-6 adminfrm1 ">

                    <form action="" method="post" class="adfrm" >

                        <?php
                        if ($er1 == 1) {
                           ?>
                        <p style="color: red;position: absolute;">not register</p>
                        <?php
                        }
                        ?>

                        <div id="">
                            <div class="adphon ">
                                <input type="text" name="mobile" pattern="^[0-9]*$" id="mobiledata" placeholder="ENTER MOBILE NUMBER" oncopy="return false" maxlength="10" class="" autofocus=""/>
                            </div>

                            <div class="adbutton">
                                <button type="button" id="mobiledata" class="" onclick="finddata('otpmobile',0,<?php echo rand(10, 99) . rand(10, 99); ?>);" >get otp</button>
                            </div>
                        </div>





                        <div class="otpboxadmin">
                            <div>
                                <input type="text"  name="1" class="ootp" required=""  maxlength="1" pattern="^[0-9]*$"/>



                                <input type="text" name="2" class="ootp" required=""  maxlength="1" pattern="^[0-9]{1}*$"/>



                                <input type="text"  name="3" required="" class="ootp" maxlength="1" pattern="^[0-9]{1}*$"/>



                                <input type="text" name="4" required="" class="ootp" maxlength="1" pattern="^[0-9]{1}*$"/>

                            </div>

                        </div>

                        <div class="adbuttonn">
                            <button type="submit" name="verify" class="">verify</button>
                        </div>

                    </form>




                </div>

                <div class="col-md-6 adminfrm2 animated swing ">



                </div>

            </div>

        </div>


        <?php
        require_once 'allscript.php';
        ?>

    </body>
</html>