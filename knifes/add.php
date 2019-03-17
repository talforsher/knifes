<?php
if(isset($_GET["new"])) 
{
$user = $_GET["new"];
$pass = $_GET["newpass"];
$myfile = fopen("users/".strtolower($user).".php", "x");
$txt = '<?php $player = array("pass"=>"'.strtolower($pass).'", "points"=>100, "friends"=>array(""),"dates"=>array(""), "requests"=>array(""), "myrequests"=>array("") ); ?>';
 fwrite($myfile, $txt); fclose($myfile); }
 else if (isset($_GET['reset'])){
    $user = strtolower($_GET["reset"]);
    include 'users/' . $user . '';
    $myfile = fopen("users/".$user."", "w");
    $txt = '<?php $player = array("pass"=>"'.$player["pass"].'", "points"=>100, "friends"=>array(""),"dates"=>array(""), "requests"=>array(""), "myrequests"=>array("") ); ?>';
     fwrite($myfile, $txt); fclose($myfile); }
 elseif(isset($_GET["del"])) { 
    unlink("users/".$_GET['del'].""); } ?>

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#scores" aria-expanded="false" aria-controls="scores">
    players and scores
  </button>

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#add" aria-expanded="false" aria-controls="add">
    add player
  </button>

    <div class="collapse" id="scores">
        <div class="card card-body">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">player</th>
                        <th scope="col">pass</th>
                        <th scope="col">points</th>
                        <th scope="col">knives</th>
                    </tr>
                </thead>
                <?php
$knife = "<img src='knifes/images/knife.svg' width='30px'>";
if($_GET["pass"]=="forsher"){
  echo "welcome administrator!<br>";
  $users = scandir("./users");
  $count=0;
  $ucount=$count+2;
  $size = sizeof($users)-2;
  while ($count < $size) {
    include "./users/$users[$ucount]";
    $user = substr($users[$ucount],0,-4);
    $knives = sizeof($player["friends"]);
    $hash=$ucount-1;
    $del = '<button onclick = "delit(this)" id="'.$users[$ucount].'" type="button" class="btn btn-danger">delete</button>';
    $res = '<button onclick = "reset(this)" id="'.$users[$ucount].'" type="button" class="btn btn-warning">reset</button>';
    echo "<tbody>
    <tr>
      <th scope='row'>".$hash.$del.$res."</th><td>$user</td><td>".$player["pass"]."</td><td>".$player["points"]."</td><td>";
      for($i=0; $i < $knives ; $i++){echo $knife;};
      echo "</td></tr>";
    $count++;
    $ucount++;
  }
}
else echo "wrong password";
?>
                    </tbody>
            </table>
        </div>
    </div>

    <div class="collapse" id="add">
        <div class="card card-body">

            <form class="form-inline" id="addform">
                <div class="form-group">
                    <label for="email">player:</label>
                    <input type="text" class="form-control" name="new">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="text" class="form-control" name="newpass">
                </div>
                <input type="hidden" name="pass" value="forsher">
                <button type="submit" class="btn btn-default">add</button>
            </form>

        </div>
    </div>
    <script type="text/javascript">
         setInterval(function()
{ 
    $( "#moshe" ).load('http://knifes.co.il/knifes/admin.php?pass=forsher' + " #moshe" );
}, 10000);
        $("#addform").submit(function(e) {
            var url = "/knifes/add.php"; // the script where you handle the form input.

            $.ajax({
                type: "GET",
                url: url,
                data: $("#addform").serialize(), // serializes the form's elements.
                success: function(data) {
                    $("#details").html(data); // show response from the php script.
                }
            })
            e.preventDefault();
        }); // avoid to execute the
        function delit(but) {
            var url = "/knifes/add.php"; // the script where you handle the form input.

            $.ajax({
                type: "GET",
                url: url,
                data: {
                    pass: "forsher",
                    del: but.id
                }, // serializes the form's elements.
                success: function(data) {
                    $("#details").html(data); // show response from the php script.
                }
            })
        }
    </script>