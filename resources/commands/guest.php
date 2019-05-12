<?php

return [
    ["CMD" => "HELP", 
    "ARGS" => "/all <command> ",
    "ALIAS" => "MAN",
    "DESC" => "Print this list. Use '/all' (show hidden commands), '<command>' (show detailed help for <command>). The HELP program gives you useful information about the commands for various programs of the system. The simplest way to run the HELP program is to type HELP and press the RETURN key.  To get help on a specific feature, type HELP and the name of a system command, program or topic as an argument."],

    ["CMD" => "NEWUSER",
    "ARGS" => "<username> <password> [email]",
    "ALIAS" => "",
    "DESC" => "Create a new account."],

    ["CMD" => "LOGIN", 
    "ARGS" => "<username> <password>",
    "ALIAS" => "",
    "DESC" => "Log into an account."],
    
    ["CMD" => "",
    "ARGS" => "",
    "ALIAS" => "",
    "DESC" => "More commands become available after login."]
];
