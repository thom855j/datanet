$(document).ready(function(){

    $('#input').focus();

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

                    if(DEBUG) {
                        return $("#terminal").append(data, "<br>");
                    }

                   var response = $.parseJSON(data);  

                    if (response.redirect !== undefined && response.redirect) {

                        if(response.feedback !== undefined) {
                            $("#terminal").append(response.feedback, "<br>");
                        }

                        setTimeout(function(){
                            return window.location.href = response.redirect_url;
                        }, 2000);
                 
                    } else {
                        $("#terminal").append(response.feedback, "<br>"); //Insert chat log into the #terminal div  
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
