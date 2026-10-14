<?php

require_once 'conect.php';




//update logo
if (isset($_REQUEST[upimg])) {
    if (strlen($_FILES[log][name]) > 0) {

        $se = $con->query("select * from hotelregister where hotelid=$_SESSION[hotelid]");
        $se1 = mysqli_fetch_array($se);
        unlink("../" . $se1[8]);
        $ex = substr($_FILES[log][type], 6);
        $newname = $se1[3] . "." . $ex;
        $setpath = "/var/www/waitingvooing/logo/$newname";
        $path = "logo/" . $newname;
        move_uploaded_file($_FILES[log][tmp_name], $setpath);

        $up = $con->query("update hotelregister set logo='$path' where hotelid=$_SESSION[hotelid]");
        //echo $up=("update hotelregister set '$path' where hotelid=$_SESSION[hotelid]");
        unset($_SESSION[id]);
    }
}


//upimg


if (isset($_REQUEST[upimgg])) {
    if (strlen($_FILES[tbl][name]) > 0) {

        $se = $con->query("select * from hotelregister where hotelid=$_SESSION[hotelid]");
        $se1 = mysqli_fetch_array($se);
        unlink("../" . $se1[12]);
        $ex = substr($_FILES[tbl][type], 6);
        $newname = $se1[3] . "." . $ex;
        $setpath = "/var/www/waitingvooing/tableimage/$newname";
        $path1 = "tableimage/" . $newname;
        move_uploaded_file($_FILES[tbl][tmp_name], $setpath);

        $up = $con->query("update hotelregister set tableimage='$path1' where hotelid=$_SESSION[hotelid]");
        //echo $up=("update hotelregister set '$path' where hotelid=$_SESSION[hotelid]");
        unset($_SESSION[id]);
    }
}

//updata logo
//menucategory
if (isset($_REQUEST[inmenucategory])) {



    $check = $con->query("select * from menucategory where name like '$_REQUEST[name]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {


        $newnamei = $_REQUEST[name] . "." . substr($_FILES[icon][type], 6);
        $setpathi = dirname(__FILE__) . "/../icon/" . $newnamei;
        $pathi = "icon/" . $newnamei;
        move_uploaded_file($_FILES[icon][tmp_name], $setpathi);

        $in = $con->query("insert into menucategory values($_SESSION[hotelid],0,'$_REQUEST[name]','$pathi')");
    } else {
        $_SESSION[er1] = 1;
    }
}
if (isset($_REQUEST[upmenucategory])) {
    $check = $con->query("select * from menucategory where name like '$_REQUEST[upname]'");
    $checkrow = mysqli_fetch_array($check);
    if ($checkrow[0] == "") {


        $see = $con->query("select * from menucategory where menucategoryid='$_SESSION[id]'");
        $see1 = mysqli_fetch_array($see);
        unlink("../" . $see1[3]);
        $exx = substr($_FILES[icon][type], 6);
        $newnamee = $see1[2] . "." . $exx;
        $setpathh = "/var/www/waitingvooing/icon/$newnamee";
        $pathh = "icon/" . $newnamee;
        move_uploaded_file($_FILES[icon][tmp_name], $setpathh);



       $up =$con->query("update menucategory set name='$_REQUEST[upname]',icon='$pathh' where menucategoryid=$_SESSION[id]");
    } else {
        $_SESSION[er1] = 1;
    }
    unset($_SESSION[id]);
}


//menuitem
if(isset($_REQUEST[inmenuitem]))
{
    
    $check=$con->query("select * from menuitem where name like '$_REQUEST[name]'");
    $checkrow=mysqli_fetch_array($check);
    if($checkrow[0]=="")
    {    
        
        
       $newnameim = $_REQUEST[name] . "." . substr($_FILES[image][type], 6);
        $setpathim = dirname(__FILE__) . "/../image/" . $newnameim;
        $pathim = "image/" . $newnameim;
        move_uploaded_file($_FILES[image][tmp_name], $setpathim);
       
        $in=$con->query("insert into menuitem values($_REQUEST[menucategotyid],0,'$_REQUEST[name]','$pathim',$_REQUEST[price])");
   
         // echo ("insert into menuitem values($_REQUEST[menucategotyid],0,'$_REQUEST[name]','$pathim',$_REQUEST[price])");
   
         
         }
    else
    {
     $_SESSION[er1]=1;   
    }
}
if(isset($_REQUEST[upmenuitem]))
{
 
    $check=$con->query("select * from landmark where name like '$_REQUEST[upname]'");
    $checkrow=mysqli_fetch_array($check);
    if ($checkrow[0] == "") 
    {
        $up = $con->query("update landmark set name='$_REQUEST[upname]' where lankmarkid='$_SESSION[id]'");
    } else {
        $_SESSION[er1]=1;   
    }
    unset($_SESSION[id]);
    
}
//end menuitem



//hoteloffer

if(isset($_REQUEST[inhoteloffer]))
{
    
    $check=$con->query("select * from hoteloffer where name like '$_REQUEST[name]'");
    $checkrow=mysqli_fetch_array($check);
    if($checkrow[0]=="")
    {    
       
         $in=$con->query("insert into hoteloffer values($_SESSION[hotelid],0,'$_REQUEST[name]',$_REQUEST[per],'$_REQUEST[startdate]','$_REQUEST[enddate]',0,'$_REQUEST[offer]')");
    }
    else
    {
     $_SESSION[er1]=1;   
    }
}
if(isset($_REQUEST[uphoteloffer]))
{
    
    $check=$con->query("select * from landmark where name like '$_REQUEST[upname]'");
    $checkrow=mysqli_fetch_array($check);
    if ($checkrow[0] == "") 
    {
        $up = $con->query("update landmark set name='$_REQUEST[upname]' where lankmarkid='$_SESSION[id]'");
    } else {
        $_SESSION[er1]=1;   
    }
    unset($_SESSION[id]);
    
}

//end hoteloffer


//hoteltable

if(isset($_REQUEST[inhoteltable]))
{
    
  
       
         $in=$con->query("insert into hoteltable values($_SESSION[hotelid],0,'$_REQUEST[tblno]',$_REQUEST[seat],0)");
  
}
if(isset($_REQUEST[uphoteltable]))
{
    
  
        $up = $con->query("update hoteltable set tablenumber=$_REQUEST[uptblno],seat=$_REQUEST[upseat] where table  id='$_SESSION[id]'");
  
    unset($_SESSION[id]);
    
}

//end hoteltable

//hotelhall
if(isset($_REQUEST[inhotelhall]))
{
   
        
       $newnameim = $_REQUEST[name] . "img." . substr($_FILES[img1][type], 6);
        $setpathim = dirname(__FILE__) . "/../hallimg/" . $newnameim;
        $pathim1 = "hallimg/" . $newnameim;
        move_uploaded_file($_FILES[img1][tmp_name], $setpathim);
        
        
         $newnameim = $_REQUEST[name] . "imgg." . substr($_FILES[img2][type], 6);
        $setpathim = dirname(__FILE__) . "/../hallimg/" . $newnameim;
        $pathim2 = "hallimg/" . $newnameim;
        move_uploaded_file($_FILES[img2][tmp_name], $setpathim);
        
         $newnameim = $_REQUEST[name] . "imggg  ." . substr($_FILES[img3][type], 6);
        $setpathim = dirname(__FILE__) . "/../hallimg/" . $newnameim;
        $pathim3 = "hallimg/" . $newnameim;
        move_uploaded_file($_FILES[img3][tmp_name], $setpathim);
       
         $in=$con->query("insert into hotelhall values($_SESSION[hotelid],0,'$_REQUEST[name]',$_REQUEST[capacity],'$_REQUEST[des]',$_REQUEST[rent],$_REQUEST[floor],'$pathim1','$pathim2','$pathim3')");
  
}
if(isset($_REQUEST[uphotelhall]))
{
 
   
        $up = $con->query("update hotelhall set name='$_REQUEST[upname]',capacity=$_REQUEST[upcapacity],description='$_REQUEST[updes]',rentperday=$_REQUEST[uprent],floor=$_REQUEST[upfloor] where hallid='$_SESSION[id]'");
   
    unset($_SESSION[id]);
    
}
//end hotelhall




//hotelwaitinglist
if(isset($_REQUEST[inhotelwaitinglist]))
{
    
   
      
       $halltime = date('h:i:s A');
        $halldate = date('d:m:Y');
         $in=$con->query("insert into hotelwaitinglist values($_SESSION[hotelid],0,'$_REQUEST[name]',$_REQUEST[nop],'$halltime','$halldate',0)");
  
}
if(isset($_REQUEST[uphotelwaitinglist]))
{
 
   
   
        $up = $con->query("update hotelwaitinglist set name='$_REQUEST[upname]',numberofperson=$_REQUEST[upnop] where waitinglistid='$_SESSION[id]'");

    unset($_SESSION[id]);
    
}
//hotelwaitinglist


//refer

if(isset($_REQUEST[refer]))

{    
       
    
        $sel=$con->query("select * from userrefercode where userid like '$_REQUEST[user1]' and userid1 like '$_REQUEST[user2]'");
        $sell=mysqli_fetch_array($sel);
        
        if($sell[0]=="")
        {
    
        $dt=date('Y-m-d');
        $rd=round(($_REQUEST[totalamount]*15)/100);
      
        
         $in=$con->query("insert into userrefercode values('$_REQUEST[user1]','$_REQUEST[user2]',0,'$_REQUEST[refercode]','$dt',$_REQUEST[totalamount],$rd,$_REQUEST[billid])");
         $up=$con->query("update userregister set referpoint=referpoint+50 where userid like '$_REQUEST[user1]'");
         
        }
        else{
            $_SESSION[er]=1;
        }
        
        
        
        
         
}


//end refercode



//banquet booking
if(isset($_REQUEST[inbook]))
{
    $dt=date('y-m-d');
    $in=$con->query("insert into banquetbooking values($_SESSION[hotelid],$_SESSION[hallid],0,'$_REQUEST[name]','$dt','$_REQUEST[date]','$_REQUEST[timefrom]','$_REQUEST[timeto]',$_REQUEST[contact],$_REQUEST[advance],$_REQUEST[total],'$_REQUEST[bookfor]','')");
    
    
}




//edithotelprofile

if(isset($_REQUEST[upprofile]))
{

    $up=$con->query("update hotelregister set name='$_REQUEST[upname]',address='$_REQUEST[upaddress]',contact='$_REQUEST[upcontact]',openday='$_REQUEST[upopenday]',opentime='$_REQUEST[upopentime]',email='$_REQUEST[upemail]' where hotelid='$_SESSION[hotelid]'");
    
}





//endedithotelprofile

?>




