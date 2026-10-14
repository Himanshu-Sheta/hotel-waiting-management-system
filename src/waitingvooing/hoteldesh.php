<?php
require_once 'conect.php';
?>

<html>
    <?php require_once 'head.php'; ?>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 topdesh" >

                    <div class="col-md-8 hed1" style="background-color: #ffffff; height: 70px;" >

                        <h2>BECOME OVER CONTRIBUTER</h2>
                        <a href="index.php" ><img src="images/logo/waiting.png" class=""  /></a>
                    </div>
                    <div class="col-md-4" style="background-color: #ffffff; height: 70px;" >
                        <div class="language-currency" id="language-currency">

                            <a href="hotelregister.php" target="_blank" style="font-size:18px; letter-spacing:2px;margin-left: 80px; color:black"  > <span class="fa fa-user " style="color:black; font-size: 25px;  padding: 10px;" title="hotel register"></span>hotel register</a>


                        </div>
                        <div class="language-currency" id="language-currency">

                            <a href="hotellogin.php"  style="font-size:18px; letter-spacing: 2px; color:black"  > <span class="fa fa-lock " style="color:black;padding: 10px; font-size: 25px;" title="login"></span>login</a>


                        </div>
                    </div>


                </div>

            </div>




        </div>



        <div class="container">
            <div class="row" style="height: 700px; background-color: #f8f8f8;margin-top: 10px;"> 


                <div class="col-md-6" style=" " >
                    <div>
                        <h1 style="margin-top: 200px;">business with <br/><p class="animated fadeInDown" style="font-size: 30px;color: #eb4a5f;">waitingvooing</p></h1>
                    </div>
                    <br/>
                    <div>
                        <p style="text-align: justify;">-&nbsp;&nbsp;&nbsp;business strategy is a set of <font style="font-size: 17px;color: #2f22ff;">competitive moves and actions</font> that a business uses to 
                            attract customers, compete successfully and achieve organisational goals.
                            It outlines how business should be carried out to reach the desired ends.</p>
                    </div>

                    <div style="">
                        <a href="hotellogin.php" ><input type="button" value="get started" style="background-color: #eb4f51; height: 40px; width: 90px; color: white; margin-top: 30px;"/></a>
                    </div>

                </div>
                <div class="col-md-6" style="  ">
                    <img src="images/partner.jpg" height="700px" width="650px;"/>
                </div>




            </div>

        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top: 50px;">
                    
                    <h1 style="color: #eb4a5f; font-size: 40px;text-align: center;">
                        our package
                    </h1>
                    
                    <hr/>
                    
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 600px;background-color: #f5f5f5;margin-top: 30px;">


                    <div class="mainpackage">

                        <?php
                        //package

                        $pack = $con->query("select * from package");
                        while ($packrow = mysqli_fetch_array($pack))
                            {
                            ?>


                            <div class="col-md-4 mpk1" style="letter-spacing: 2px;">
                                <div class="pack1" style="">

                                    <div class="pack11">
                                        <label>packagename</label>
                                        <P>
                                                <?php echo$packrow[1]; ?>
                                        </p>
                                    </div >
                                    <div class="pack11">
                                         <label>duration</label>
                                         <P>
                                                <?php echo $packrow[2]; ?>&nbsp;&nbsp;months
                                         </p>
                                    </div>
                                    <div class="pack11"> 
                                         <label>amount</label>
                                        <P>
                                           RS. <?php echo$packrow[3]; ?>
                                        </p>
                                    </div>
                                    <div class="pack11">
                                    <P>
                                        <img src="http://localhost/admin/<?php echo $packrow[4]; ?>"height="100px" width="100px" />  
                                    </p>
                                    </div>
                                    <div class="hpbutton">
                                    <?php
                                    if ($_SESSION[hotelid] == "") {
                                        ?>

                                        <div>
                                            <button  type="submit" disabled=""  title="please first login" class="animated swing infinite" >buy</button>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="buypackage.php?id=<?php echo $packrow[0]; ?>"><button  type="submit">buy</button></a>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                </div>

                            </div>






                    



                            <?php
                        }

                        //endpackage
                        ?>
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