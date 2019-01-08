<?php

#phpinfo();exit;

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$r = mail('TwilightTower@mail.ru', 'test subj 2', 'test msg 2');
echo "mail 1 sent: $r";

$r = mail('TwilightTowerDU@gmail.com', 'test subj 2', 'test msg 2');
echo "mail 2 sent: $r";

