$(function(){
    let user_info;
    $("#sing_in").on("click", function(){
        let user_email = $('#user_email').val();
        let user_pass = $('#user_pass').val();
        if(user_email == ""){
            $("#alert1").fadeIn();
        }else{
            $("#alert1").fadeOut();
            if(user_pass ==""){
                $("#alert2").fadeIn();
            }else{
                $("#alert2").fadeOut(); 
                user_info = {
                    email : user_email,
                    pass : user_pass
                }     
            }    
        }
        $.ajax({
            url:"apilogin.php",
            type:"POST",
            data:{
                contenido :JSON.stringify(user_info)
            },
            success:function(msg){
                
                alert("Bienvenido");
                $("#close_singin").click();
            },
        });
    });
});