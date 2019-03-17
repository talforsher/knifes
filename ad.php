<!DOCTYPE html>
<html>

<head>
    <title>KnifeS administrator</title>
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#F00BA4" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="text-center">
        <h1 style="font-size: 300%">ADMIN</h1>
        <img src="knifes/images/knife.png" class="rounded" width="100px" alt="...">
    </div>
    <h4 style="text-align: center" id="details">
        <form class="form-inline" id="admin">
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
    </h4>
    <script type="text/javascript">
        $("#admin").submit(function(e) {
            var url = "knifes/admin.php"; // the script where you handle the form input.

            $.ajax({
                type: "GET",
                url: url,
                data: $("#admin").serialize(), // serializes the form's elements.
                success: function(data) {
                    $("#details").html(data); // show response from the php script.
                }
            })
            e.preventDefault();
        }); // avoid to execute the
    </script>
</body>

</html>