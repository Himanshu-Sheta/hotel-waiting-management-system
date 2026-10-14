<?php
require_once 'conect.php';
require_once 'adminquery.php';
$_SESSION[box]=$_REQUEST[box];
print_r($_REQUEST);

if($_SESSION[box]=="booking")
{   
    $cbdt=$con->query("select * from banquetrequest where requestid=$_REQUEST[id] ");
    $cbrow=  mysqli_fetch_array($cbdt);
    $_SESSION[hbhall]=$cbrow[1];
    $ccdt=$con->query("select * from userregister where contact=$cbrow[2] ");
    $ccrow=  mysqli_fetch_array($ccdt);
    
?>
    <div class="modal-header" data-dismiss="modal">
        <i class="fa fa-times"></i>
    </div>
    <br/>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7">
                <div align="center">
                    Banquet Booking
                </div>
                <br/>
                <div class="frmdivmodal">
                    <form action="" novalidate="" method="post" name="booking" >
                        <?php
                        if($ccrow[1]!="")
                        {
                        ?>
                        <div>
                            <input type="text" name="name" value="<?php echo $ccrow[1]." ".$ccrow[2]; ?>" placeholder="Enter Name" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <?php
                        }
                        else
                        {
                        ?>
                        <div>
                            <input type="text" name="name" placeholder="Enter Name" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <?php
                        }
                        ?>
                        <div>
                            <label>Date</label>
                            <input type="date" name="date" required=""/>
                        </div>
                        <div>
                            <label>Time From</label>
                            <input type="time" name="timefrom" required=""/>
                        </div>
                        <div>
                            <label>Time To</label>
                            <input type="time" name="timeto" required=""/>
                        </div>
                        <?php
                        if($ccrow[1]!="")
                        {
                        ?>
                        <div>
                            <input type="tel" name="contact" value="<?php echo $ccrow[3]; ?>" placeholder="Enter Contact" maxlength="10" required="" pattern="^[0-9]*$"/>
                        </div>
                        <?php
                        }
                        else
                        {
                        ?>
                        <div>
                            <input type="tel" name="contact" value="<?php echo $cbrow[3]; ?>" placeholder="Enter Contact" maxlength="10" required="" pattern="^[0-9]*$"/>
                        </div>
                        <?php
                        }
                        ?>
                        
                        <div>
                            <input type="number" name="advance" placeholder="Enter Advance Payment" required="" pattern="^[0-9]*$"/>
                        </div>
                        <div>
                            <input type="number" name="total" placeholder="Enter Total Payment" required="" pattern="^[0-9]*$"/>
                        </div>
                        <div>
                            <input type="text" name="bookfor" placeholder="Enter Book For" required="" pattern="^[a-zA-Z ]*$"/>
                        </div>
                        <div>
                            <button type="submit" class="btn bookbtn" name="inbook" >Booking</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                dsjbgsi
            </div>
        </div>
    </div>
<?php
}
?>