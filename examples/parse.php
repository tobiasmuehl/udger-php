<?php

use Udger\ParserFactory;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// creates a new UdgerParser object
$parser = ParserFactory::buildParserFromMySQL('mysql:host=db;dbname=udger;charset=UTF8', 'udger', 'udger');
//$parser->setCacheEnable(false);
//$parser->setCacheSize(4000);

try {
    $parser->setUA('Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0');
    $parser->setIP("66.249.64.73");

    $ret = $parser->parse();
    var_dump($ret);
} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage() . PHP_EOL;
}
