<?php
/**
 * Created by PhpStorm.
 * User: techbot
 * Date: 18/03/15
 * Time: 20:22
 */

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$read = new \React\Stream\Stream(STDIN,$loop);
$read->on('data',function($data) use ($loop){
    $data = trim($data);
    if ($data == 15)
    {
        $loop->stop();
    }
});
    $read->pipe(new \React\Stream\Stream(STDOUT,$loop));
    $loop->run();


