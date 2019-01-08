<?php

require_once 'morena.class.php';

$parser = new Morena($_POST['cid'], $_POST['email'], $_POST['search_type'], $_POST['percent']);
$parser->parse();

file_put_contents('morena.process.pid', getmypid());
echo 'Парсинг начат. PID процесса: ' . getmypid() . '. Следите за изменениями.';
