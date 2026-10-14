<?php
require_once 'conect.php';
$_SESSION[page] = "register";
if (isset($_REQUEST[submit])) {

    $f = 0;
    $data = $con->query("select email from userregister");
    while ($row = mysqli_fetch_array($data)) {
        if (!strcasecmp($_REQUEST[email], $row[0])) {
            $f = 1;
            break;
        }
    }

    if ($f == 0) {

        $refcode = rand(0, 9) . rand(10, 99) . chr(rand(65, 90)) . chr(rand(97, 122)) . rand(11, 22);
        $lastlogin = date('d-m-Y h:i:s');
        $in = $con->query("insert into userregister values('$_REQUEST[fname]','$_REQUEST[lname]','$_REQUEST[contact]','$_REQUEST[email]','$_REQUEST[userid]','$_REQUEST[password]',50,'$refcode','$lastlogin')");
        $_SESSION[lname] = $_REQUEST[lname];
        $_SESSION[fname] = $_REQUEST[fname];


        header('location:welcome.php#start');
    }
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



        <div class="container-fluid" id="start">
            <div class="row fr">
                <div class="col-md-6 col-md-offset-3 space">

                    <div class="container-contact100">
                        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>



                        <div class="wrap-contact1100">
                            <form action="" method="post" name="registerfrm" class="contact100-form validate-form"  onsubmit="return checkpass();" novalidate="">

                                <div style="position: absolute; margin-top: -100px; margin-left: 350px;">
                                    <a href="#"><img src="images/pencil.png" class="pencil"/></a>
                                </div>

                                <span class="contact100-form-title" style="color:black;">
                                    <i class="fa fa-user-o"></i>&nbsp;&nbsp;member register
                                </span>

                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" type="text" name="fname" autofocus="" pattern="^[a-zA-Z]*$" placeholder="Enter First Name" required="" autocomplete="off" title="Only Alpha"/>
                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" type="text" name="lname" placeholder="Enter Last Name" pattern="^[a-zA-Z]*$" required=""/>
                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" type="text" maxlength="10" pattern="^[0-9]{10}*$" name="contact" placeholder="Enter contact" required=""/>
                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>


                                <?php
                                if ($f == 1) {
                                    echo "<font style='color:red;'>already registeres</font>";
                                }
                                ?>
                                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                                    <input class="input100" type="email" name="email" placeholder="Enter Email" required=""/>
                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>


                                </div>



                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" type="text" name="userid" placeholder="Enter Userid" pattern="^[a-zA-Z0-9_]*$" required=""/>
                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" id="ps"  type="password"  name="password" placeholder="Create Password" pattern="^[a-zA-Z]{8,}*$" required=""/>
                                    <i class="fa fa-eye" id="eye" style="font-size: 30px;padding: 10px;position: absolute; margin-top: -50px; margin-left: 340px; color:#999; cursor: pointer;"></i>


                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>

                                <div class="wrap-input100 validate-input" data-validate="Name is required">
                                    <input class="input100" type="password" name="repassword"  id="repass" placeholder="Confirm Password" required="" />
                                    <i class="fa fa-eye" id="eye1" style="font-size: 30px;padding: 10px;position: absolute; margin-top: -50px; margin-left: 340px; color:#999; cursor: pointer;"></i>


                                    <span class="focus-input100-1"></span>
                                    <span class="focus-input100-2"></span>
                                </div>



                                <div class="col-md-10 captcha">
                                    <input type="text" value=""  disabled="" id="captch"  style="color:#2a363b; background-color: #999; letter-spacing: 9px;" />
                                </div>


                                <div class="col-md-2 captcha">
                                    <div>
                                        <center> <i class="fa fa-refresh" id="ref" style="font-size: 35px; cursor: pointer;" > </i></center>
                                    </div>
                                </div>

                                &nbsp;


                                <div class="col-md-12 captchaa">
                                    <input type="text" id="ccaptch" style="width: 60%;height: 40px;" />
                                </div>


                                &nbsp;&nbsp;&nbsp;&nbsp;


                                <div class="contact100-form-checkbox">
                                    <input class="input-checkbox100" id="ckb1" type="checkbox" checked="" disabled="" name="copy-mail"/>&nbsp;
                                    <label class="label-checkbox100" for="ckb1" style="margin-top: 20px;">
						Terms & Condition 
                                    </label>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;

                                <div class="col-md-6">
                                    <div class="container-contact100-form-btn" style="margin-top: 20px;">
                                        <button type="submit" name="submit" class="contact100-form-btn sign">
						Sign In
                                        </button>
                                    </div>
                                </div>        
                                <div class="col-md-6">
                                    <div class="container-contact100-form-btn">
                                        <button type="reset"  class="contact100-form-btn">
						reset
                                        </button>
                                    </div>
                                </div> 

                            </form>
                        </div>
                    </div>



                    <div id="dropDownSelect1"></div>

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