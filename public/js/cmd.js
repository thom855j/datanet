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

  } else if(typeof window[client] !== "undefined" && window[client].length == 0) {

    return eval(client + "();");

  } else {

    return true;
  }

}

// System
function clear() {
  document.getElementById(terminalID).innerHTML = "";
  return false;
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

function logout() {

  return post_data = true;

}

function exit() {
 return window.location.replace(document.referrer);
}

function quit() {
  return logout();
}


// User
function status(input) {

  var post_data = true;

  var cmd = input.split(" ");

  var message = input.replace(cmd[0], "");

  console.log(message);

  if(cmd.length >= 2) {
    post_data = {
      input: input, 
      message: message.trim()
    };

  } 

  return post_data;
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
      message: input
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


