
<?php
require_once 'conect.php';
$_SESSION[page] = "welcome";
if ($_SESSION[lname] == "") {
    header('location:index.php');
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

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 mainn1">


                    <div>



                        <h1>welcome</h1>

                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page">Home</a>
                                    <span>/ </span>
                                </li>
                                <li class="cms_page">
                                    <strong class="animated swing infinite">welcome</strong>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div>
                        <img src="images/welc.png" style="margin-top: 50px;"/>
                    </div>


                </div>
                <div class="col-md-6">

                    <div class="wel1" >
                        <img src="images/wel.png"/>
                    </div>

                    <div>
                        <h1 style="text-align: center;"> welcome <?php echo $_SESSION[fname], " ", $_SESSION[lname]; ?></h1> 
                    </div>

                    <div>
                        <a href="login.php"><h3 style="text-align: center; margin-top: 40px;">enjoy journey</h3></a>
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
