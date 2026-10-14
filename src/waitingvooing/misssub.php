<?php
require_once 'conect.php';



if ($_REQUEST[box] == "sub") {

    $uudt = $con->query("select * from emailsubscribe where userid='$_SESSION[userid]'");
    $uurow = mysqli_fetch_array($uudt);
    if ($_REQUEST[task] == "subkro") 
        {
        $dt = date('y-m-d');
        $in = $con->query("insert into emailsubscribe values('$_SESSION[userid]',$_SESSION[hotelid],0,'$dt')");
        
        ?>

        <div onclick="findsub('sub','unsub',0);">
            
           
            <button type="button" class="btn-danger" style="background-color: red; height: 40px;width: 130px;font-size: 15px;margin-top: 20px;color: #ffffff"> <i class="fa fa-bell-slash-o " ></i>unsubscribe</button>
                
        </div>
        <?php
    }
    
    if ($_REQUEST[task] == "unsub") {
     
        $del= $con->query("delete from emailsubscribe  where eid=$uurow[2]");
        ?>

        <div onclick="findsub('sub','subkro',0);">
            
    
            <button type="button" class="btn-danger" style="background-color: red; height: 40px;width: 130px;font-size: 15px;margin-top: 20px;color: #ffffff">  <i class="fa fa-bell-o subnoti"></i>subscribe</button>
                
        </div>
        <?php
    }
    
}
?>

