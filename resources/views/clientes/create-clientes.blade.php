<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Crear clientes</title>
</head>
<body>
    
    @include('header')

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form method="post" action="{{route('clientes.store')}}">
            @csrf                                       <!-- A los post hay que agregar esta directiva de laravel, que envía un token -->
            <div>
                <label>Razón Social</label>
                <input name="razon_social">             <!-- el name del input se debe corresponder con el key del post en el método (en este caso store) -->
            </div>
            <div>
                <label>CUIT</label>
                <input name="cuit">
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>