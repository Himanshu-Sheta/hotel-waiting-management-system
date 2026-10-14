<?php
require_once 'conect.php';
require_once 'adminquery.php';
 

//if($_SESSION[hotel]=="")
//{
//    header('location:index1.php');
//}
if($_REQUEST[logout]=="yes")
{
    unset($_SESSION[mobile]);
    unset($_SESSION[hotel]);
    header('location:../hoteldesh.php');
}

?>

<!DOCTYPE html>
<html lang="en">


    <?php
    require_once 'head.php'; 
  // if ($_SESSION[what]=="") 
  //  {
  //      header('location:index.php');
  //  }
    ?>
    <body class="sticky-header" onload="finddata('<?php echo $_SESSION[what]; ?>','view','1'); findbox('<?php echo $_SESSION[what]; ?>');">

        <section>

            <?php
            require_once 'left.php';
            ?>

            <div class="body-content" >

                <?php
               require_once 'top.php';
                ?>






                <section id="filldata">


                        
                </section>





                <footer>
                    <address>Copyright © 2020 <a href="index.php">waitingvooing</a>  All Rights Reserved</address>
                </footer>


            </div>
        </div>

    </section>

    <?php
    require_once 'allscript.php';
    ?>
        
        
        <div class="modal mat fada" id="test">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modaldata">
                    
                
            </div>
            
        </div>

</body> 

<!-- Mirrored from thevectorlab.net/slicklab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 06:25:55 GMT -->
</html>
