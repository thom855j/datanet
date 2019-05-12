$(document).ready(function(){

    $('#input').focus();

    var oldscrollHeight = $("#terminal").prop("scrollHeight") - 20; //Scroll height before the 

            //If user submits the form
        $("form").submit(function(e){

            e.preventDefault();

            var input = $.trim( $("#input").val() );

            $("#terminal").append(input, "<br>");

            localHistory(input);
            
            cmdHistory(localHistory(), 'input');

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
            var newscrollHeight = $("#terminal").prop("scrollHeight") - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#terminal").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            } 
            
            $("#input").prop("value", "");
        });


}); 
