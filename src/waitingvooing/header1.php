
<div class="container-fluid">
            <div class="row bhag">
                <div class="col-md-6 bhag1">
                   <h5>welcome to Waiting Vooing &nbsp;  - &nbsp;"&nbsp;Check Into Another World&nbsp;" </h5>
                </div>
                <div class="col-md-6 bhag2">
                    
                    <div class="row bhagg">
                        <div class="col-md-6">
                            
                            <h5><i class="fa fa-phone"></i> &nbsp  toll free - 1800 000 000</h5>
                        </div> 
                        <div class="col-md-6">
                            <h5><i class="fa fa-envelope"></i> &nbsp   email - waitingvooing@gmail.com</h5>
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

<div class="header-container#start">
    <div class="header">
        <div class="container">
            <div class="toplink-contaner">
                <div class="box-left">
                    <div class="logo-container">
                        <div class="image11">
                            <a href="index.php" title="waitingvooing -  check Into Another world  "  class="logo"><img src="images/logo/waiting.png" alt="waiting" /></a>
                          
                        </div>
                    </div>
                </div>
                <div class="box-right">
                    <div class="link-inner">
                        <div class="language-currency" id="language-currency">
                            
                            <a href="hoteldesh.php" target="_blank" style="color:black;  padding: 10px 0px 10px 0px"  > <span class="fa fa-handshake-o " title="Become Over Contributor"></span></a>
                            

                        </div>
                        
                       
                        
                        <div class="top-link" id="top-link">
                            <a href="register.php#start"><span class="toplink-hover" title="Become Memeber OR Login">account</span></a>
                                
                        </div>
                        <?php
                            if($_SESSION[userid]=="")
                            {
                        ?>
                        <div class="language-currency" id="language-currency">
                            <a href="login.php#start" ><span class="ti-lock" title="login here" style="color: black;"></span></a>
                            

                        </div>
                        <?php
                            }
                            else{
                        ?>
                         <div class="language-currency" id="language-currency">
                            <a href="usermaster.php#start" ><span class="ti-unlock" title="enjoy" style="color: black;"></span></a>
                            

                        </div>
                        <?php
                            }
                        ?>
                     
                 

                        <div class="top-cart-wrapper">
                            <div class="top-cart-contain" >
                                <div id="mini_cart_block">
                                    <div class="block-cart mini_cart_ajax">
                                        <div class="block-cart">
                                         
                                            <i class="ti-clipboard" title="My Booking"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quick-access">
                    <form id="search_mini_form" action="#">
                        <div class="form-search">
                            <label>Search:</label>

                            <input id="search" type="text" name="q" placeholder="Search Best Food" class="input-text" />

                            <button  class="b123"  type="submit"> <i class="fa fa-search f1"></i></button>

                            <!--<div id="search_autocomplete" class="search-autocomplete"></div>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Navbar -->
<div class="nav-mobile-container visible-xs">
    <div class="container">
        <div class="navbar">
            <nav id="navbar-inner" class="navbar-inner navbar-inactive">
                <div class="menu-mobile">
                    <a class="btn btn-navbar navbar-toggle">
                        <span class="icon-bar">icon1</span>
                        <span class="icon-bar">icon2</span>
                        <span class="icon-bar">icon3</span>
                    </a>
                    <span class="brand navbar-brand">Categories</span>
                </div>
              
            </nav>
        </div>
    </div>
</div>