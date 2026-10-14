$(document).ready(function(){
    
    
    
    
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
                            $("#mobiledata").addClass("animated shake");
                            return false;
                        }
                }
                else
                    {
                        $("#mobiledata").addclass("animated shake");
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

function findmodal(box,task,id)
{
    
    $.ajax({
        
        url:'modaldata.php?box='+box+'&task='+task+'&id='+id,
        type:'POST',
        success:function(data)
        {
          $("#modaldata").html(data);
        }

    });
    
}