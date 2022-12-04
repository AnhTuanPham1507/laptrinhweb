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

</html>