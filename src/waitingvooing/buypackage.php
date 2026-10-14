<?php
require_once 'conect.php';
$_SESSION[page] = "buypackage";

if (isset($_REQUEST[buy])) {
    $pk = date('y:m:d');
    $in = $con->query("insert into packagebill values($_SESSION[hotelid],$_REQUEST[id],0,'$pk','$pk','',0)");

    header('location:hotel/index1.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'head.php';
    ?>

    <body>
        <?php
        require_once 'header1.php';
        require_once 'header2.php';
        ?>



        <div class="container-fluid" >
            <div class="row mainn1">
                <div class="col-md-12">

                    <div>



                        <h1>package</h1>

                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page">Home</a>
                                    <span>/ </span>
                                </li>
                                <li class="cms_page">
                                    <strong class="animated swing infinite">package</strong>
                                </li>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>

        </div>



        <div class="container-fluid" style=" " >
            <div class="row ">
              

                <form action="" method="post" >
                    <div class="mainpackage " style="background-color: red;">
                    <?php
                    $buypack = $con->query("select * from package where packageid=$_REQUEST[id]");
                    $buypackrow = mysqli_fetch_array($buypack)
                    ?>  

                    <div class="col-md-2 mpk1" style="letter-spacing: 2px;margin-left: 00px;">
                        <div class="pack1" style="">

                            <div class="pack11">
                                <label>packagename</label>
                                <P>
                                    <?php echo$buypackrow[1]; ?>
                                </p>
                            </div >
                            <div class="pack11">
                                <label>duration</label>
                                <P>
                                    <?php echo $buypackrow[2]; ?>&nbsp;&nbsp;months
                                </p>
                            </div>
                            <div class="pack11"> 
                                <label>amount</label>
                                <P>
                                    RS. <?php echo$buypackrow[3]; ?>
                                </p>
                            </div>
                            <div class="pack11">
                                <P>
                                    <img src="http://localhost/admin/<?php echo $buypackrow[4]; ?>"height="100px" width="100px" />  
                                </p>
                            </div>
                            <div class="hpbutton">

                                <button style="background-color: #eb4a5f;height: 35px;width:85px;font-size: 13px;color: white;"type="submit" name="buy">buypackage</button>

                            </div>
                        </div>

                    </div>



                    </div>
                </form>
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
