<div class="nav-container visible-lg visible-md">
    <div class="container">
        <div id="custommenu" class="custommenu">
            <div id="html_menu_home" class="html_menu">


                <?php
                if ($_SESSION[page] == "index") {
                    ?>
                    <div class="parentMenu">
                        <a href="index.php" class="currnt live" style=" border-bottom:  1px solid;
                           box-shadow: inset 0 0 50px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                           outline-color: rgba(255, 255, 255, 0);
                           outline-offset: px;
                           text-shadow: 1px 1px 2px #427388;">
                            <span>Home</span>
                        </a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="parentMenu">
                        <a href="index.php">
                            <span class="currnt">Home</span>
                        </a>
                    </div>
                    <?php
                }
                ?>



            </div>



            <div class="html_menu">

                <?php
                if ($_SESSION[page] == "aboutus") {
                    ?>
                    <div class ="parentMenu"> 
                        <a href="aboutus.php" style="border-bottom:  1px solid;
                           box-shadow: inset 0 0 50px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                           outline-color: rgba(255, 255, 255, 0);
                           outline-offset: px;
                           text-shadow: 1px 1px 2px #427388;">
                            <span>about us</span>
                        </a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="parentMenu">
                        <a href="aboutus.php">
                            <span>about us</span>
                        </a>
                    </div>
                    <?php
                }
                ?>

            </div>


            <div class="html_menu">
                <div class="parentMenu">
                    <a href="javascript:void(0);">
                        <span>hotel</span>
                        <i class="fa fa-caret-down"></i>
                    </a>
                </div>
                <div class="popup disnone">
                    <div class="block1">
                        <div class="column last">
                            <div class="itemMenu level1">
                                <a class="level1" href="shop.html"><span>Rings</span></a>
                                <a class="level1" href="shop.html"><span>cooker</span></a>
                                <a class="level1" href="shop.html"><span>televisions</span></a>
                                <a class="level1" href="shop.html"><span>refrigeration</span></a>
                            </div>
                        </div>
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>
            <div class="html_menu">

                <?php
                if ($_SESSION[page] == "contact") {
                    ?>

                    <div class="parentMenu">
                        <a href="contact.php" style="border-bottom:  1px solid;
                           box-shadow: inset 0 0 50px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                           outline-color: rgba(255, 255, 255, 0);
                           outline-offset: px;
                           text-shadow: 1px 1px 2px #427388;">
                            <span>contact us</span>
                        </a>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="parentMenu">
                        <a href="contact.php">
                            <span>contact us</span>
                        </a>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="html_menu">

                <?php
                if ($_SESSION[page] == "feedback") {
                    ?>

                    <div class="parentMenu">
                        <a href="feedback.php" style="border-bottom:  1px solid;
                           box-shadow: inset 0 0 50px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                           outline-color: rgba(255, 255, 255, 0);
                           outline-offset: px;
                           text-shadow: 1px 1px 2px #427388;">
                            <span>feedback</span>
                        </a>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="parentMenu">
                        <a href="feedback.php">
                            <span>feedback</span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>







        </div>
    </div>
</div>