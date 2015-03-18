<?php

require_once 'vendor/autoload.php';

        $redis = new Predis\Client();
 
        $list                   = 'my:list:';
        $info                   = new stdClass();
        $info->name             = 'Bob';
        $info->time             = time();
        
        $info                   = json_encode($info);

        $arList                 = $redis->lrange($list, 0, -1);
        $count                  = 0;
       
        $redis->lpush($list, $info);

        if ($redis->llen($list)>= 11 ){
            $redis->rpop($list);
        }
 
   /////////////////////////////    Fetch and echo
        $new_array  = array();
        foreach ($redis->lrange($list, 0, -1) as $row){
            
            print_r (Json_Decode($row));
            echo "<br>";
            
            $new_array[] = Json_Decode($row);
        };
      
     $redis->connect('');
    
  $redis->publish('chan-1', 'hello, world!'); // send message to channel 1.
  $redis->publish('chan-2', 'hello, world2!'); // send message to channel 2.
 // $x = $redis->dbsize('');
  
  // $redis->publish('chan-1', $x); 
   
   
  print "\n";

