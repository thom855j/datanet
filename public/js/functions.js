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

function getUrl()
{
    //return document.URL.substr(0,document.URL.lastIndexOf('/'))
    return url;
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function localHistory(input = null) {
    
    if(input) {
        var history = localStorage.getItem('history') ? JSON.parse( localStorage.getItem('history') ) : [" "];

        history.push(input);

        history = removeDupsFromArray(history);

        localStorage.setItem(
            'history',
            JSON.stringify( history )
        );

        return true;
    }

    if( localStorage.getItem('history') ) {
        return JSON.parse( localStorage.getItem('history') );
    }

    return false;

   
}

function cmdHistory(data, id) {

    if(!data) {
        return false;
    }

    var i = 0;
    var $current;
    
    $current = $('#'+ id);

    document.onkeydown = function(event) {
        switch (event.keyCode) {
           case 38:
                i = (++i) % data.length;
                $current.val(data[i]);
              break;
           case 40:
                if (i > 0) i--;
                else i = data.length - 1;
                $current.val(data[i]);
              break;
        }
    };
        
}


function removeDupsFromArray(a) {
   var temp = {};
    for (var i = 0; i < a.length; i++)
        temp[a[i]] = true;
    var r = [];
    for (var k in temp)
        r.push(k);
    return r;
}


function cmdDubs(input) {

    if(input == 'logout') {
        return 'logout';
    } else if(input == 'telnet') {
        return 'rlogin';
    } else if(input == 'exit') {
        return 'logout';
    }

    return input.split(" ")[0];
}
