<?php
require_once 'vendor/autoload.php';
//require __DIR__ . '/init.php';

echo 'started', PHP_EOL;
//create the main loop
$loop = React\EventLoop\Factory::create();

//create a mysql connection for executing queries
$connection = new React\MySQL\Connection($loop, array(
        'host'=>'localhost',
    'dbname' => 'test',
    'user'   => 'root',
    'passwd' => 'cyberia23',
));


//connecting to mysql server, not required.

$connection->connect(function () {});

$connection->query('select * from book', function ($command, $conn) use ($loop) {
    if ($command->hasError()) { //test whether the query was executed successfully
        //error
        $error = $command->getError();// get the error object, instance of Exception.
   
echo 'one';

 } else {
        $results = $command->resultRows; //get the results
        $fields  = $command->resultFields; // get table fields

	//echo $fields;
	//echo $results;
echo 'two';

    }
    $loop->stop(); //stop the main loop.
});

echo 'done', PHP_EOL;

$loop->run();
