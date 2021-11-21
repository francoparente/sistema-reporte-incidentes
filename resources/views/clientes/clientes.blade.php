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
        <label>Filtre por CUIT o Razón Social</label>
        <form method="get" action="{{ route('clientes.index') }}">  <!--en action pongo el recurso (clientes) y el método (index)-->
            <input name="razon_social" placeholder="Razón Social">
            <input name="cuit" placeholder="CUIT">
            <button type="submit">Filtrar</button>
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Razón Social</th>
                    <th>CUIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $unCliente)
                    <tr>
                        <td> {{ $unCliente -> razon_social }} </td>
                        <td> {{ $unCliente -> cuit }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>