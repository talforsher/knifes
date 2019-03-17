<?php
   session_start();
   $today = getdate();
   $user = strtolower($_GET["friend"]);
   $me = strtolower($_SESSION["user"]);
   if(include 'users/' . $user . '.php'){
   $defender = $player;
   $deffriends = sizeof($defender["friends"]);
   if ($defender["points"]>0 && !in_array($today["yday"], $defender["dates"])){
   include 'users/' . $me . '.php';
   if($player["points"]>0){
   $attacker = $player;
   $attfriends = sizeof($attacker["friends"]);
   $attfriends = sizeof($attacker["friends"])*25;
   $boom = $attfriends+$attacker["points"];
   $trach = $deffriends*25+$defender["points"];
   if($boom > $trach){
            echo "<br><a style='color: green;'>WIN</a>";
            $str = '<?php $player["points"]+=10; ?>'; file_put_contents('users/' . $me . '.php', $str, FILE_APPEND | LOCK_EX); $str = '
        <?php $player["points"]-=30; array_push($player["dates"], "'.$today["yday"].'"); ?>'; file_put_contents('users/' . $user . '.php', $str, FILE_APPEND | LOCK_EX); } else{ echo "<br><a style='color: red;'>LOST</a>"; $str = '
        <?php $player["points"]-=30; ?>'; file_put_contents('users/' . $me . '.php', $str, FILE_APPEND | LOCK_EX); $str = '
        <?php $player["points"]+=10; ?>'; file_put_contents('users/' . $user . '.php', $str, FILE_APPEND | LOCK_EX); } } else echo ""; }else echo "seems like " . $user . " is dead or have already been attacked today"; } else echo "seems like " . $user . " is not registered";?>