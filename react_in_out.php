<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 18/03/15
 * Time: 22:26
 */

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$read = new \React\Stream\Stream(fopen('php://stdin', 'r+'), $loop);
$write = new \React\Stream\Stream(fopen('php://stdout', 'w+'), $loop);
$read->pipe($write);

$loop->run();
