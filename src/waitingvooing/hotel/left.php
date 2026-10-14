<div class="sidebar-left">
    <!--responsive view logo start-->
    <div class="leftpattiimage">
        <img src="images/waiting.png"title="WAITINGVOOING -'CHECK INTO ANOTHER WORLD'" style="height: 50px; margin-top: -50px; padding: 5px; margin-left: 70px;" /> 

    </div>
    <!--responsive view logo end-->

    <div class="sidebar-left-info" style="overflow: auto;">
        <!-- visible small devices start-->
        <div class=" search-field">  </div>
        <!-- visible small devices end-->

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked side-navigation" style="overflow: auto;">

            <li class="active">
                <a href="javascript:void(0)" onclick="finddata('dashboard','view','0');findbox('dashboard');"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('profile','view','1');findbox('profile');"><i class="fa fa-pencil"></i>  <span>hotel profile</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('refer','view','1');findbox('refer');"><i class="fa fa-pencil"></i>  <span>accept refercode</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('offer','view','1');findbox('offer');"><i class="fa fa-lightbulb-o"></i>  <span>hotel offer</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('mcategory','view','1');findbox('mcategory');"><i class="fa fa-bars"></i>  <span>menu category</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('menuitem','view','1');findbox('menuitem');"><i class="fa fa-sort-desc"></i>  <span>menu item</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('hotelrate','view','1');findbox('hotelrate');"><i class="fa fa-list-ol"></i>  <span>hotel rate</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('hotelreview','view','1');findbox('hotelreview');"><i class="fa fa-list-ol"></i>  <span>hotel review</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('hoteltable','view','1');findbox('hoteltable');"><i class="fa fa-table"></i>  <span>hotel table</span></a>

            </li> 

            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('hotelhall','view','1');findbox('hotelhall');"><i class="fa fa-thumb-tack"></i>  <span>hotel hall</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('hotelwaitinglist','view','1');findbox('hotelwaitinglist');"><i class="fa fa-list-ol"></i>  <span>hotel waiting list</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('onlinew','view','1');findbox('onlinew');"><i class="fa fa-paper-plane"></i>  <span>hotel online waiting</span></a>

            </li>



            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('package','view','1');findbox('package');"><i class="fa fa-bookmark-o"></i>  <span>package</span></a>

            </li>




            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('banquetrequest','view','1');findbox('banquetrequest');"><i class="fa fa-bookmark-o"></i>  <span>banquet request</span></a>

            </li>
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('bill','view','1');findbox('bill');"><i class="fa fa-spinner"></i>  <span>package bill</span></a>

            </li>
           
            <li class="menu-list">
                <a href="javascript:void(0)" onclick="finddata('email','view','1');findbox('email');"><i class="fa fa-envelope"></i>  <span>email subscribe</span></a>

            </li>




            <?php
            $ch = $con->query("select * from packagebill where hotelid=$_SESSION[hotelid] and status=1");
            $chh = mysqli_fetch_array($ch);
            if ($chh[0] != "") {
                ?>

                <li class="menu-list">
                    <a href="javascript:void(0)" onclick="finddata('mypackage','view','1');findbox('mypackage');"><i class="fa fa-envelope"></i>  <span>active package</span></a>

                </li>

                <?php
            }
            ?>



            <?php
            $ch = $con->query("select * from packagebill where hotelid=$_SESSION[hotelid] ");
            $chh = mysqli_fetch_array($ch);
            if ($chh[0] != "") {
                ?>

                <li class="menu-list">
                    <a href="javascript:void(0)" onclick="finddata('mytran','view','1');findbox('mypackage');"><i class="fa fa-envelope"></i>  <span>pack transation</span></a>

                </li>

    <?php
}
?>


        </ul>
        <!--sidebar nav end-->

        <!--sidebar widget start-->

        <!--sidebar widget end-->

    </div>
</div>