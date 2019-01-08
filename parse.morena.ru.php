<?php

require_once 'morena.class.php';

$parser = new Morena();
$parser->parse();

echo 'Парсинг начат. PID процесса: ' . getmypid();
