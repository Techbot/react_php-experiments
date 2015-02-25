<?php

/*
  In this example, we are making simple script that will log the current time
  to test.txt file after each 5 minutes.Basically you can so perform some
  useful task after each specified interval like cron jobs.
*/

  //this file is required to use composer in our project
  require __DIR__.'/vendor/autoload.php';
  //loop that will run continuesly
  $loop = React\EventLoop\Factory::create();
  //this is counter variable for logged records
  $i = 0;
  //this will contain the string to be logged each time
  $message = '';
  /*addPeroidicTimer is a function of EventLoop class that provides us to  
  perform some action periodically. First argument is 5 (in seconds) after
  which specified should be done again
  */
  $loop->addPeriodicTimer(5, function ($timer) use (&$i,&$message) {
      //Task you want to perform each time.We are logging current date
      // and time to test.txt file for simplicity
      $file = fopen("test.txt","w");
      $date = date('m/d/Y h:i:s a', time());
      $message .= ($i+1) . ") Cron Job Performed on " . $date . "\n";
      fwrite($file,$message);
      fclose($file);
  });
  //this message will appear on console
  echo "Cron Job Started Successfully!\n";
  echo "Performing Jobs.....\n";
  //start the loop
  $loop->run();
  echo "Cron Job Completed Successfully!\n";
?>  
