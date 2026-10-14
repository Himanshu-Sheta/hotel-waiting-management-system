<?php
require_once 'conect.php';
$_SESSION[box] = $_REQUEST[box];
if ($_SESSION[box] == "dashboard") {
    ?>

    <div class="row">
        <div class="col-md-12" >
            <div class="page-head ">
                <h3>
                    Dashboard
                </h3>
                <span class="sub-title">Welcome to <?php echo $_SESSION[box]; ?></span>


            </div>

        </div>
    </div>


    <?php
} else {
    ?>
<div class="row">
    <div class="col-md-12" >
        <div class="page-head ">
            <h3>
                Dashboard
            </h3>
            <span class="sub-title">Welcome to <?php echo $_SESSION[box]; ?>



            </span>
           

             

        </div>

    </div>
   
</div>

    <?php
}
?>