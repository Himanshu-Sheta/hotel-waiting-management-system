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
            <span class="sub-title">Welcome to  <?php echo $_SESSION[box]; ?>



            </span>
           

             

        </div>

    </div>
    <div class="col-md-12">
        

            <input type="text" name="searchdata" placeholder="Search <?php echo $_SESSION[box]; ?>" style=" height: 40px; width: 650px;margin-left: 580px;  border-bottom: none; margin-top: 40px; "  onkeyup="finddata('<?php echo $_SESSION[box]; ?>','search',this.value);"/> 
            <i class="ti-trash" style="font-size: 40px; margin-left: 50px; cursor: progress;"   ondblclick="finddata('<?php echo $_SESSION[box]; ?>','deleteall',0);"></i>

    </div>
    
</div>

    <?php
}
?>