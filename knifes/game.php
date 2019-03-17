<b><?php echo $_SESSION["user"] ?><br></b>
<img class="avatar" src="knifes/images/<?php 
            session_start();

            if (file_exists("images/".$_SESSION['user'].".jpeg"))
            { echo "{$_GET[ 'user']}.jpeg\"";} else echo "knife.png\" style='border-radius: 0px;' "; ?> alt="... "/>
         <?php
            $pass = strtolower($_SESSION["pass"]);
            $user = strtolower($_SESSION["user"]);
            if(include 'users/'. $user . '.php'){
            if(true){
            $friends = sizeof($player['friends']);
            $knife = "<img src='knifes/images/knife.svg' width='30px'>";
            echo "<br>" . $player['points'] . "points<br>";
            for($count=0; $count < $friends ; $count++){echo $knife;}; echo "knives<br>"; ?>
    <?php
            }
            else
               echo "<br>you are dead";
             }
            else
               echo ", you are not registered, or wrong password";
            ?>