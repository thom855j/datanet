$(document).ready(function(){

    $('form').hide();

    $(document).keypress(function(event){
        $('form').show();
        $('#input').focus();
      });

    $('#input').on('click', function() {
        cmdHistory(localHistory(), 'input');
    });

            //If user submits the form
        $("form").submit(function(e){

            e.preventDefault();

            var input = $.trim( $("#input").val() );

            $("#terminal").append(input, "<br>");

            localHistory(input);

            cmdHistory(localHistory(), 'input');

            //var data = cmd(input);

            if( input ) {

              //  var post_data = data;

                var cmd_url = cmdDubs(input);

                $.ajax({
                    type: "POST",
                    url: getUrl() + "cmd/" + cmd_url,
                    cache: false,
                    data: input,
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
                            }, 1000);
                     
                        } else {
                            $("#terminal").append(response.feedback, "<br>"); 
                        }   
                                      
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = "% Unrecognized command - type HELP for a list";
                        $("#terminal").append(errorMessage, "<br>");
                    }
                });

            }

            //Auto-scroll  
           $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
            
            $("#input").prop("value", "");
        });


}); 
