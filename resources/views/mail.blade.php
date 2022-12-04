<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hi, {{ $name }}, you have one's registing request to confirm, Please choose your one of options below!</h1>
    <ul>
        <li><a href="http://127.0.0.1:8000/user/confirm?token={{$token}}&user_id={{$user_id}}">Accept</a></li>
        <li><a href="http://127.0.0.1:8000/user/deny?token={{$token}}&user_id={{$user_id}}">Deny</a></li>
    </ul>

</body>

=======
~~ resources/views/layouts/app.blade.php ~~

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sending Email with Laravel Mailer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f714ee491f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <a class="navbar-brand" href="#">Tasks</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            </div>
        </nav>
        <br>
        @yield('content')
    </div>
</body>
>>>>>>> ef19d6dc00a4e04690f03c857a4030966e634ab6
</html>