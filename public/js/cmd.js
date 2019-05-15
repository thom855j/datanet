var terminalID = "terminal";


function cmd(input) {

  var client = input;

  if( input.indexOf(' ') >= 0 ) {
    var cmd = input.split(" ");

    cmd = cmd[0].toString().toLowerCase();

    if (eval("typeof " + cmd) === "function"){
     setCookie('cmd', cmd, 1);
     return eval(cmd + "('" + client + "');");
    }

    return true;

  } else if(typeof window[client] !== "undefined" && window[client].length == 0) {

    setCookie('cmd', client, 1);
    return eval(client + "();");

  } else {

    return true;
  }

}


// System
function clear() {
  localStorage.removeItem('history');
  document.getElementById(terminalID).innerHTML = "";
  $('#terminal').css('min-height', '0px');
  return false;
}

function help(input) {

  var post_data = true;

  if(input.length == 1) {
    post_data = {
      input: input
    };

  } else {

  var cmd = input.split(" ");

  if(cmd.length > 2) {
    post_data = {
      input: input, 
      message: input
    };
  }

  } 

  return post_data;
}

function echo(input) {

  var post_data = true;

  var cmd = input.split(" ");

  var message = input.replace(cmd[0], "");

  if(cmd.length >= 2) {
    post_data = {
      input: input, 
      message: message.trim()
    };

  } 

  return post_data;
}


// Auth
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

function rlogin(input) {

  var post_data = true;

  var cmd = input.split(" ");

  if(cmd.length === 3) {
    post_data = {
      input: input, 
      hostname: cmd[1], 
      password: cmd[2]
    };

  }

  return post_data;
}

function logout() {

  return post_data = true;

}

function exit() {
 return window.location.replace(document.referrer);
}

function quit() {
  return logout();
}

function bye() {
  return logout();
}

function logoff() {
  return logout();
}


// User
function status(input) {

  var post_data = true;

  var cmd = input.split(" ");

  var message = input.replace(cmd[0], "");

  if(cmd.length >= 2) {
    post_data = {
      input: input, 
      message: message.trim()
    };

  } 

  return post_data;
}

function systat(input) {
  return finger(input);
}

function finger(input) {

  var post_data = true;

  if(input.length == 1) {
    post_data = {
      input: input
    };

  } else {

  var cmd = input.split(" ");

  if(cmd.length > 2) {
    post_data = {
      input: input, 
      args: input
    };
  }

  } 

  return post_data;
}

function users(input) {

  var post_data = true;

  if(input.length == 1) {
    post_data = {
      input: input
    };

  } else {

  var cmd = input.split(" ");

  if(cmd.length > 2) {
    post_data = {
      input: input, 
      args: input
    };
  }

  } 

  return post_data;
}


// Hosts

function newhost(input) {

  var post_data = true;

  var cmd = input.split(" ");

  if(cmd.length === 3) {
    post_data = {
      input: input, 
      hostname: cmd[1], 
      password: cmd[2]
    };

  } else if(cmd.length === 4) {
    post_data = {
      input: input, 
      hostname: cmd[1], 
      password: cmd[2]
    };
  } else if(cmd.length === 5) {
    post_data = {
      input: input, 
      hostname: cmd[1], 
      password: cmd[2],
      os: cmd[3]
    };
  }

  return post_data;
}


function hosts(input) {

  var post_data = true;

  if(input.length == 1) {
    post_data = {
      input: input
    };

  } else {

  var cmd = input.split(" ");

  if(cmd.length > 2) {
    post_data = {
      input: input, 
      message: input
    };
  }

  } 

  return post_data;
}


