<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'configCommon.php';

require_once 'morena.class.php';

set_time_limit(0);

try {
    //$parser = new Morena($_REQUEST['cid'], $_REQUEST['email'], $_REQUEST['search_type'], $_REQUEST['percent']);
    $parser = new Morena('cid_5491606', 'TwilightTower@mail.ru', 'search_in_folder_to_put', '-3');
    $parser->parse();
} catch (\Exception $e) {
    $msg = date(DATE_RFC822) . " >\nLine: " . $e->getLine() . "\nMessage:\n" . $e->getMessage() . "\n\n";
    error_log($msg, 3, ERROR_LOG_FILE);
    mail(EMAIL, 'Ошибка в парсере', $msg);

    echo $e;
}

file_put_contents('morena.process.pid', getmypid());
echo 'Парсинг начат. PID процесса: ' . getmypid() . '. Следите за изменениями.';
