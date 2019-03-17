<div>
    <?php
   session_start();
   $friend = strtolower($_GET["friend"]);
   $user = strtolower($_SESSION["user"]);
   //if friend exist
   if((include 'users/' . $friend . '.php') and $friend != $user){
    //if friend alive
      if($player["points"]>0){
        //if already sent request to this friend
      if (in_array($user, $player['myrequests'])){
         echo " You already sent " . $friend . " knife request</div>";
       }
       //if friend sent you request before, you will now become friends
       elseif (in_array($user, $player['requests'])) {
         echo " You and " . $friend . " are now knife friends";
         $str = '<?php array_push($player["friends"], "'.$user.'") ?>';
         file_put_contents('users/' . $friend . '.php', $str, FILE_APPEND | LOCK_EX);
         $str = '<?php array_push($player["friends"], "'.$friend.'"); $player["points"]-=10; ?>';
         file_put_contents('users/' . $user . '.php', $str, FILE_APPEND | LOCK_EX);
       }
       //send request to a friend and loose 10 points
       else{
        echo " You sent request to<br><br><strong>" . $friend . "<strong>";
        $str = '<?php array_push($player["requests"], "'.$friend.'"); $player["points"]-=10; ?>';
        file_put_contents('users/' . $user . '.php', $str, FILE_APPEND | LOCK_EX);
        $str = '<?php array_push($player["myrequests"], "'.$user.'"); ?>';
        file_put_contents('users/' . $friend . '.php', $str, FILE_APPEND | LOCK_EX);
       }
     }
     //if riend is dead
     else{
      echo "seems like<br><strong>" . $friend . "</strong><br> is dead<br>";
     }
   }
   //if friend doesn't exists
   else{
      echo "seems like<br><strong>" . $friend . "</strong><br>is not registered<br>";
   }
 ?>
        <div>
