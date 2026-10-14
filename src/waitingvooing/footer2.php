<div class="footer-container">
    <div class="footer-static">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-sms-12">
                    <div class="f-col f-col1">
                        <a class="logo" href="#"><img alt="" src="images/logo/waiting.png" title="Waiting Vooing -  Check Into Another World "/></a>
                        <p>The waitingvooing Way</br>
                            vooing's secret sauce?</br>
                            We offer tasteful spaces,</br> whenever you need them, at unbeatable prices.</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-sms-6 col-smb-12">
                    <div class="f-col f-col2">
                        <div class="footer-title">
                            <h2>MY ACCOUNT</h2>
                        </div>
                        
                        
                        <div class="footer-content">
                            <ul>
                                <li class="first"><a href="login.php#start">my account</a></li>
                                <li class="first"><a href="#">order history</a></li>
                                <li><a href="">Wish List</a></li>
                                <li><a href="#"> search terms</a></li>
                                <li class="last"><a href="#">Returns</a></li>
                            </ul>
                        </div>
                        
                      
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-sms-6 col-smb-12">
                    <div class="f-col f-col3">
                        <div class="footer-title">
                            <h2>CUSTOMER SERVICE</h2>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li class="first"><a href="">Site Map</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Your Account</a></li>
                                <li><a href="service.php"> search terms</a></li>
                                <li class="last"><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-sms-6 col-smb-12">
                    <div class="f-col f-col4">
                        <div class="footer-title">
                            <h2>LATEST HOTEL</h2>
                        </div>
                        <div class="footer-content">
                            <?php
                                 $lh = $con->query("SELECT h.* FROM hotel.hotelregister h where h.hotelid and adminconfirmstatus=1 and packageconfirmstatus=0 order by hotelid desc limit 0,5");
                                 while ($lrow = mysqli_fetch_array($lh))
                                 {
                                
                            ?>
                            
                            <ul>
                                <li>
                                    <a href="allhotel.php"><?php echo $lrow[3]; ?></a>
                                </li>
                            </ul>
                                 
                                
                            
                               
                            
                            <?php
                                 }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-sms-6 col-smb-12">
                    <div class="f-col f-col5">
                        <div class="footer-title">
                            <h2>contact us</h2>
                        </div>
                        <div class="footer-content">
                            <div class="address">
                                <p>B-201 - Astha Square, </br>Near VIP Circle,</br> Utran, Varachha, </br>surat-394105 </p>
                            </div>
                            <div class="phone">
                                <p>+1800 000 000</p>
                            </div>
                            <div class="email">
                                <div class="email-inner">
                                    <p>waitingvooing@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>