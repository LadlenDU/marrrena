<?php

require_once 'morena.class.php';

$parser = new Morena();
$parser->parse();

file_put_contents('morena.process.pid', getmypid());
echo 'Парсинг начат. PID процесса: ' . getmypid() . '. Следите за изменениями.';
