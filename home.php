<!DOCTYPE html>
<html>

<head>
<title>Knifes game</title>
<meta name="Description" content="Make friends, or make knives. an interactive game for friends who like to show each other who's the best strategist in the gang. gain power and peace agreements before you attack other players and win the first position. ">
<meta name="Keywords" content="knives with friends, knifes, krav-maga, knives game">
    <meta charset="utf-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background-color: black;
    background-image: radial-gradient(white, rgba(255,255,255,.2) 2px, transparent 40px), radial-gradient(white, rgba(255,255,255,.15) 1px, transparent 30px), radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 40px), radial-gradient(rgba(255,255,255,.4), rgba(255,255,255,.1) 2px, transparent 30px);
    background-size: 550px 550px, 350px 350px, 250px 250px, 150px 150px;
    background-position: 0 0, 40px 60px, 130px 270px, 70px 100px;">
    <br>
    <div class="card text-center" style="width: auto;">
        <div class="card-body">
            <h1 class="card-title">KnifeS</h1>
            <h6 class="card-subtitle mb-2 text-muted">Make friends, Make knives</h6>
            <p class="card-text">
                <img src="knifes/images/knife.png" class="rounded" style="transition-delay: 4s; transform: rotateX(-20deg);" width="200px" alt="...">
                <h1 style="text-align: center">
                    <form class="form-inline" action="game" method="POST">
                        <div class="form-group">
                            <label for="email">player:</label>
                            <input type="text" class="form-control" name="user">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </h1>
                <a href="admin" class="btn btn-default" style="background-color: #eaa5ff;">ADMIN</a>
            </p>
        </div>
    </div>
</body>

</html>
