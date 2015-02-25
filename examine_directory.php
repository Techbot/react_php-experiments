<?php

        $dir    = '/var/www/html/react_php-experiments/timers/KML/Buurt';

        $scandir = scandir($dir);

        $files = array_diff($scandir, array('..', '.'));

        foreach ($files as $file)
        {
            $read_file = file_get_contents('/var/www/html/react_php-experiments/timers/KML/Buurt/'.$file);
            $xml[] = simplexml_load_string($read_file);

        }



        print_r (count($xml));


                
        
        
        
        
