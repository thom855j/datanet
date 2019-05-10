$(document).ready(function(){

    $('input').focus();

    $("#input").inputhistory();

            //If user submits the form
        $("form").submit(function(e){

            e.preventDefault();

            var oldscrollHeight = $(".container").prop("scrollHeight") - 20; //Scroll height before the 

            var input = $("#input").val();

            $("#terminal").append(input, "<br>");

            var data = cmd(input);

            if( data ) {

            var post_data = data;

            var cmd_url = input.split(" ")[0];

            $.ajax({
                type: "POST",
                url: getUrl() + "cmd/" + cmd_url,
                cache: false,
                data: post_data,
                success: function(data){  

                   var response = $.parseJSON(data);  

                    if (response.redirect !== undefined && response.redirect) {

                       return window.location.href = response.redirect_url;

                    } else {
                        $("#terminal").append(response.error, "<br>"); //Insert chat log into the #terminal div  
                    }   
                                  
                },
                error: function(xhr, status, error) {
                    var errorMessage = "% Unrecognized command - type HELP for a list";
                    $("#terminal").append(errorMessage, "<br>");
                }
            });

            }

            //Auto-scroll  
            var newscrollHeight = $(".container").prop("scrollHeight") - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $(".container").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            } 

            $("#input").prop("value", "");
        });



}); 
