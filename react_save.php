<?php
require_once 'vendor/autoload.php';
 
$loop = ReactEventLoopFactory::create();
$socket = new ReactSocketServer($loop);
 
$socket->on('connection', function ($conn) use ($loop) {
  $conn->write("Successfully connected to the writing servern");
  echo 'client connected';
  $dataStream = new ReactStreamStream(fopen('data.txt', 'w'), $loop);
 
  $conn->on('data', function($data) use ($conn, $dataStream) {
    $dataStream->write($data);
  });
 
  $conn->on('end', function() {
    echo 'connection closed';
  });
});
 
$socket->listen(4000);
$loop->run();
