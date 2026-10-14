$(document).ready(function()
    {
        
       // $("#box").click(function()
      //  {
      //      alert("hyy");
       //     $('.fullimg').html($(this).html());
  // 
    //    });
 

     
        $("#ref").click(function()
        {
            code();
        });
        
    
       
        
        
        //hideshow
        $c=0;
        $("#eye").click(function()
        {
            if($c==0)
            {
         
                $("#ps").attr("type","text");
               
                $("#eye").attr("class","fa fa-eye-slash");
               
                $c=1;
            }
            else
            {
                $("#ps").attr("type","password");
               
                $("#eye").attr("class","fa fa-eye");
               
             
                $c=0;
            }
        });
        
        
        
        $("#eye1").click(function()
        {
            if($c==0)
            {
         
           
                $("#repass").attr("type","text");
                $("#eye1").attr("class","fa fa-eye-slash");
               
                $c=1;
            }
            else
            {
                $("#eye1").attr("class","fa fa-eye");
                $("#repass").attr("type","password");
                
               
             
                $c=0;
            }
        });
        
        
        
     
        code();
     
    }) ;
    
//otp fill
    
$(".otpbox div input").keyup(function()
{
    $cur=$(".otpbox div input").index(this);
    if(event.keyCode!=8)
    {
        $cur++;
        if($(".otpbox div input:nth-child("+$cur+")").val()!="")
            
        {
            $cur++;
            $(".otpbox div input:nth-child("+$cur+")").focus();
        }   
        
    }
    else
    {
        $cur++;
        if($(".otpbox div input:nth-child("+$cur+")").val()=="")
        {
            $cur--;
            $(".otpbox div input:nth-child("+$cur+")").focus();
        }

    }
        

});


//image


//loginbox
$(".loginbox div input").keyup(function()
{
    $cur=$(".loginbox div input").index(this);
    if(event.keyCode!=8)
    {
        $cur++;
        if($(".loginbox div input:nth-child("+$cur+")").val()!="")
            
        {
            $cur++;
            $(".loginbox div input:nth-child("+$cur+")").focus();
        }   
        
    }
    else
    {
        $cur++;
        if($(".loginbox div input:nth-child("+$cur+")").val()=="")
        {
            $cur--;
            $(".loginbox div input:nth-child("+$cur+")").focus();
        }

    }
        

});
    
    
    
    
//only didgit
    
$("#rc").keyup(function(){
        

    if(event.keyCode>=48 && event.keyCode<=57)
    {
               
    }
    else
    {
        if(event.keyCode!=8)
        {
            $("#rc").val("");
        }
    }
       
});
    
//check password and captch
function checkpass()
{
    var pass= document.getElementById("ps").value;
    var repass= document.getElementById("repass").value;
    
    var captch= document.getElementById("captch").value;
    var ccaptch= document.getElementById("ccaptch").value;
    
    
    if(pass==repass && captch==ccaptch)
    {
        return true;
    }
    else
    {
        if(pass!=repass)
        {
            document.getElementById("repass").value="";
        }
            
        if(captch!=ccaptch)
        {
            document.getElementById("ccaptch").value="";
        }
        
        return false;
    }
}
//only password
function checkpasss()
{
    var pss= document.getElementById("pss").value;
    var repass= document.getElementById("repasss").value;
    
    
    
    if(pss==repass)
    {
        return true;
    }
    else
    {
        if(pss!=repass)
        {
            document.getElementById("repasss").value="";
        }
            
    
        
        return false;
    }
}

//random code
function code()
{
       
    var capcode;
    var f1=Math.round(Math.random()*9);
    var f2=String.fromCharCode(Math.round(Math.random() * (90-65) + 65));
    var f3=Math.round(Math.random()*100);
    var f4=String.fromCharCode(Math.round(Math.random() * (122-97) + 97));
    var f5=String.fromCharCode(Math.round(Math.random() * (122-97) + 97)) + String.fromCharCode(Math.round(Math.random() * (90-65) + 65));
    capcode= f1 + f2 + f3 + f4 + f5;
       
    document.getElementById("captch").value = capcode;
}




//missdata hotel register
function comboleva(kono,id)
{
    
     
    $.ajax({
        
        url:'missdata.php?kono='+kono+'&id='+id,
        type:'POST',
        success:function(data)
        {
            $("#"+kono+"combo").html(data);
        }

    });
    
}



//hotelstar
function finddata(what,task,id)
{
    
  
    $.ajax({
        
        url:'missdata.php?what='+what+'&task='+task+'&id='+id,
        type:'POST',
        success:function(data)
        {
            $("#rrdata").html(data);
         
        }

    });
}



//emailsubscribe
function findsub(box,task,id)
{

  
    $.ajax({
        
        url:'misssub.php?box='+box+'&task='+task+'&id='+id,
        type:'POST',
        success:function(data)
        {
            $("#subdata").html(data);
           
        }
       

    });
   
}

