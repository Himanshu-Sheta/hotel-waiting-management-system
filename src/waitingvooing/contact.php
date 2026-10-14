<?php
require_once 'conect.php';
$_SESSION[page] = "contact";

if(isset($_REQUEST[submit]))
{
     $dat = date('d-m-Y');
     $in = $con->query("insert into inquiry values(0,'$_REQUEST[name]','$_REQUEST[contact]','$_REQUEST[reason]','$dat')");

}
 else {
    
}


?>
<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'head.php';

    require_once 'header1.php';
    require_once 'header2.php';
    ?>


    <body>

        <div class="container-fluid" >
            <div class="row mainn1">
                <div class="col-md-12">

                    <div>
                        
                        
                        
                        <h1>contact us</h1>
                        
                         <div class="breadcrumbs">
                        <ul>
                            <li class="home">
                                <a href="index.php" title="Go to Home Page">Home</a>
                                <span>/ </span>
                            </li>
                            <li class="cms_page">
                                <strong class="animated swing infinite">contact us</strong>
                            </li>
                        </ul>
                    </div>
                    </div>

                   

                </div>
            </div>

        </div>

        <div class="bg-contact100" style="background-image: url('images/bg-01.jpg'); " >
            <div class="container-contact100">
                <div class="wrap-contact1000">
                    <div class="contact100-pic js-tilt con1" data-tilt>
                        <img src="images/emp.png" alt="IMG" />
                    </div>

                    <form class="contact100-form validate-form ffrm" action="" method="post">
                        <span class="contact100-form-title">
						Get in touch
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="contact" placeholder="phone number"/>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Message is required">
                            <textarea class="input100" name="reason" placeholder="reason"></textarea>
                            <span class="focus-input100"></span>
                        </div>
                        
                        
                         

                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn" name="submit">
							Send
                            </button>
                        </div>
                    </form>
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
