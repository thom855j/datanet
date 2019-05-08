<?php

$app->get('/cmd/newuser', 'CmdController:getNewuser')->setName('cmd.newuser');

$app->post('/cmd/newuser', 'CmdController:postNewuser');

