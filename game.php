<?php
session_start();
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == "no" ){
$_SESSION["user"] = strtolower($_POST["user"]);
$_SESSION["pass"] = strtolower($_POST["pass"]);
}
?>
<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        @keyframes float {
            0% {
                transform: translatex(10px);
            }
            50% {
                transform: translate(-3px, -8px);
            }
            100% {
                transform: translatex(10px);
            }
        }

        @keyframes spin {
            50% {
                transform: rotate(180deg);
            }
            100% {
                transform: rotate(-360deg)
            }
        }

        .avatar {
            width: 115px;
            height: 115px;
            box-sizing: border-box;
            border-radius: 10%;
            overflow: hidden;
            transform: translatey(0px);
            animation: float 5s ease-in-out infinite;
            img {
                width: 100%;
                height: auto;
            }

        }

        .form-control{
            background-color: #0005!important;
            border: 3px solid #ccc!important;
            color: #00ffe2!important;
        }

        @keyframes Gradient {
            0% {
                background-position: 0% 50%
            }
            50% {
                background-position: 100% 50%
            }
            100% {
                background-position: 0% 50%
            }
    </style>
    <title>
        <?php echo $_SESSION["user"]; ?> - KnifeS</title>
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#F00BA4" />
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="300">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="functions.js"></script>
</head>

<body style=" color: #fff;
  background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
  background-size: 400% 400%;
  -webkit-animation: Gradient 15s ease infinite;
  -moz-animation: Gradient 15s ease infinite;
  animation: Gradient 15s ease infinite;">
  <div style="margin:auto; width:300px; padding-top:8vh;">
    <div>
        <h1 id="div1" style="text-align: center">
            <b style="font-weight: 1000; line-height: 0;
    font-size: 60px;
    font-variant-caps: all-petite-caps;"><?php echo $_SESSION["user"] ?><br></b>
            <img id="avatar" class="avatar" src="<?php
            if (file_exists("knifes/images/".$_SESSION['user'].".jpeg"))
            { echo "/knifes/images/".$_SESSION['user'].".jpeg\"";
    }
        else{ echo "https://source.unsplash.com/100x100/?animal\"  style='border-radius: 100%; opacity: 0.7; border: blanchedalmond; 
    border-style: double;'  ";} ?> alt="... "/>
         <?php
            $pass = strtolower($_SESSION["pass"]);
            $user = strtolower($_SESSION["user"]);
            if((include 'knifes/users/'. $user . '.php') && $player["pass"] ==$pass){
            $_SESSION['logged'] = "yes";
            if($player["points"]>0 && $player["pass"] ==$pass ){
            $friends = sizeof($player['friends']);
            $knife = "<img src='knifes/images/knife.svg' width='30px'>"; echo "<br>" . $player['points'] . "points<br>"; for($count=0; $count
            < $friends ; $count++){echo $knife;}; echo "knives<br>"; ?>
        </h1>
    </div>
    <h1 style="text-align: center">
        <form id="sendToFriend" class="form-inline">
            <div class="form-group">
                <label for="knife">Make Action</label>
                <input list="players" autocomplete="off" class="form-control" name="friend">
                <datalist id="players">
                <?php
                $plrs = scandir("knifes/users");
  $cnt=0;
  $ucnt=$cnt+2;
  $siz = sizeof($plrs)-2;
  while ($cnt < $siz) {
    $usr = substr($plrs[$ucnt],0,-4);
        echo "<option value='$usr'>";
    $cnt++;

    $ucnt++;
  }
                ?>

               </datalist>
            </div>
            <input type="hidden" name="user" value=<?php echo $user ?>>
            <input type="hidden" name="pass" value=<?php echo $pass ?>>
            <button style="background: #5cdd5899" id="request" class="btn btn-default">
            peace</button>
            <button id="makeAttack" style="background: #ff0000a8" class="btn btn-default">
            attack</button>
        </form>


        <?php
            }
            else
              echo "<br>you are dead";
             }
            else{
              $_SESSION['logged'] = "no";
              echo "<br> you are not registered, or wrong password!<br>";
              echo "<a href='/'><button>home page</button></a>";
            }
            ?>
    </h1>
    <div id="yes" style="text-align: center; zoom: 0.8;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  how to play
</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="color: black">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">KnifeS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        ask friend to make knife.<br> the request will cost you 10 points.<br> if your friend will send you too / sent you<br> you will both get another knife.<br><br> if you wish to attack somebody<br> you should enter the friend's name and attack.<br> the winner is the one with more points and knives.<br> every knife equal to 25 points.<br> if the attacker and defender has same strengh,<br> the defender will win.<br> the winner gets 10 more points.<br> the looser slaughtered by 30.<br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $("#sendToFriend").submit(function(e) {
            var url = "knifes/friend.php"; // the script where you handle the form input.

            $.ajax({
                type: "GET",
                url: url,
                data: $("#sendToFriend").serialize(), // serializes the form's elements.
                success: function(mata) {
                    $("#yes").html(mata); // show response from the php script.
                }
            })
            url = "knifes/game.php";
            setTimeout(function() {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: $("#sendToFriend").serialize(), // serializes the form's elements.
                    success: function(gata) {

                        $("#div1").html(gata);

                    }
                })
            }, 1000);


            e.preventDefault();
        }); // avoid to execute the
        $("#makeAttack").click(function(e) {
            var url = "knifes/attack.php"; // the script where you handle the form input.

            $.ajax({
                type: "GET",
                url: url,
                data: $("#sendToFriend").serialize(), // serializes the form's elements.
                success: function(mata) {
                    $("#yes").html(mata); // show response from the php script.
                    console.log(mata.length);
                    if (mata.length < 1000)
                    window.location.href = 'https://knifes.co.il';
                }
            })
            url = "knifes/game.php";
            setTimeout(function() {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: $("#sendToFriend").serialize(), // serializes the form's elements.
                    success: function(gata) {

                        $("#div1").html(gata);
                    }
                })
            }, 1000);


            e.preventDefault();
        }); // avoid to execute the actual submit of the form.
        $('#avatar').on('mousedown', function() {
            $('#avatar')[0].style.animation = 'spin 1s linear infinite';
        }).on('mouseup mouseleave', function() {
            $('#avatar')[0].style.animation = 'float 5s ease-in-out infinite';
        });
        $('#avatar').on('touchstart', function() {
            $('#avatar')[0].style.animation = 'spin 1s linear infinite';
        }).on('touchend', function() {
            $('#avatar')[0].style.animation = 'float 5s ease-in-out infinite';
        });
    </script>
</body>

</html>
