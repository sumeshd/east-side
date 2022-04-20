var textfadeinout =false;
            $("#checkbox").click(function(){
                if(textfadeinout){
                    $("#text").fadeOut(function(){
                        $("#text").css("transition", "0.8s");
                        textfadeinout=false;
                    });
                    
                }else{
                    $("#text").fadeIn(function(){
                        $("#text").css("display", "block");
                        $("#text").css("transition", "0.5s");
                        textfadeinout=true;
                    });
                }
            });


$('#facebookinput').on('keydown, keyup', function () {
    //get a reference to the text input value
    var texInputValue = $('#facebookinput').val();
                    
    //show the text input value in the UI
    $('#messagefacebook p span').html(texInputValue);
});
              
$('#twitterinput').on('keydown, keyup', function () {
    //get a reference to the text input value
    var texInputValue = $('#twitterinput').val();
                
    //show the text input value in the UI
    $('#messagetwitter p span').html(texInputValue);
});