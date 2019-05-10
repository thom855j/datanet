/*
$(function() {

var cursor;

$('#cmd').click(function() {
   $('input').focus();
  
  cursor = window.setInterval(function() {
  if ($('#cursor').css('visibility') === 'visible') {
    $('#cursor').css({ visibility: 'hidden' });
  } else {
    $('#cursor').css({ visibility: 'visible' });  
  }  
  }, 500);
  
});

$('input').keyup(function() {
  $('#cmd span').text($(this).val());
  
});
  
  $('input').blur(function() {
     clearInterval(cursor);
     $('#cursor').css({ visibility: 'visible' });    
  });


});
*/

var terminalID = "terminal";


function cmd(input) {

  var client = input;

  if( input.indexOf(' ') >= 0 ) {
    var cmd = input.split(" ");

    cmd = cmd[0].toString().toLowerCase();

    if (eval("typeof " + cmd) === "function"){
     return eval(cmd + "('" + client + "');");
    }

    return true;

  } else if(eval("typeof " + client) === "function" && eval(client).length == 0) {

    return eval(client + "();");

  } else {

    return true;
  }

}

function clear() {
  document.getElementById(terminalID).innerHTML = "";
  return false;
}

function logout() {
  document.getElementById(terminalID).innerHTML = "";
  return false;
}

function exit() {
  return logout();
}

function quit() {
  return logout();
}


function newuser(input) {

  var post_data = true;

  var cmd = input.split(" ");

  if(cmd.length === 3) {
    post_data = {
      input: input, 
      username: cmd[1], 
      password: cmd[2]
    };

  } else if(cmd.length === 4) {
    post_data = {
      input: input, 
      username: cmd[1], 
      password: cmd[2],
      email: cmd[3]
    };
  }

  return post_data;
}


function login(input) {

  var post_data = true;

  var cmd = input.split(" ");

  if(cmd.length === 3) {
    post_data = {
      input: input, 
      username: cmd[1], 
      password: cmd[2]
    };

  }

  return post_data;
}
