<?php 

    // / Save data in file request
    
      $req_dump = date("Y-m-d H:i:s") . ' - ';
      $req_dump.= print_r($_REQUEST, TRUE);
       echo $req_dump;
      $fp = fopen('request.txt', 'a');
      fwrite($fp, $req_dump);
      fclose($fp);
