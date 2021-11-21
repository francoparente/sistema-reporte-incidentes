<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clientes</title>
</head>
<body>

    @include('header')
    <div>
        <label>Razón Social</label>
        <label>{{$cliente->razon_social}}</label>
    </div>
    <div>
        <label>CUIT</label>
        <label>{{$cliente->cuit}}</label>
    </div>
</body>
</html>