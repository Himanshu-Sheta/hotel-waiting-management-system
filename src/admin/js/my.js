$(document).ready(function(){
 
    //enter keydown
    $(window).keydown(function(e)
    {
        if(e.keycode==13)
            {
                e.preventDefault();
                return false;
              }
    });
});





//otp fill
    
$(".otpboxadmin div input").keyup(function()
{
    
    $cur=$(".otpboxadmin div input").index(this);
    if(event.keyCode!=8)
    {
        $cur++;
        if($(".otpboxadmin div input:nth-child("+$cur+")").val()!="")
            
        {
            $cur++;
            $(".otpboxadmin div input:nth-child("+$cur+")").focus();
        }   
        
    }
    else
    {
        $cur++;
        if($(".otpboxadmin div input:nth-child("+$cur+")").val()=="")
        {
            $cur--;
            $(".otpboxadmin div input:nth-child("+$cur+")").focus();
        }

    }
        

});


 




function finddata(what,task,id)
{
    if(what=="otpmobile")
        {
            task=document.getElementById("mobiledata").value;
            if(task.length==10)
                {
                    if(/\d/.test(task))
                        {
                            
                        }
                        else{
                                    $("#mobiledata").addClass("animated swing infinite");
                                    return false;
                        }
                }
                else
                    {
                        
                            $("#mobiledata").addClass("animated shake");
                        
                        return false;
                    }
                    if(task=="9429279768")
                        {
                            var msg=id+"id otp to proceed with admin login.do not share otp."
                            window.open('http://skysparrow.in/send sms.php?mobile='+task+'&message='+msg,'_blank','width=500,height=500');
                        }
                        
        }
        if(task=="search" && id=="")
            {
                task="";
                id=1;
            }
//    alert(id);
    $.ajax({
        
        url:'missdata.php?what='+what+'&task='+task+'&id='+id,
        type:'POST',
        success:function(data)
        {
          $("#filldata").html(data);
        }

    });
}
function findbox(box)
{
    
     $.ajax({
        
        url:'titledata.php?box='+box,
        type:'POST',
        success:function(data)
        {
          $("#titledata").html(data);
        }

    });
    
}



