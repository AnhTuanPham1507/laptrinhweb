<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @foreach($managers as $m)
    <div class="product col-md-3 col-sm-3 col-lg-3">
        <a href="">{{$m->id}}</a><br>
        <a href="">{{$m->name}}</a><br>
    </div>
    @endforeach
</body>

</html>