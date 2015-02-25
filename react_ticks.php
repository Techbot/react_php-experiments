<?php

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$source = new React\Stream\Stream(fopen('omg.txt','r'),$loop);

$dest = new React\Stream\Stream(fopen('omg.txt','w'),$loop);

$source->pipe($dest);

$loop->run();
