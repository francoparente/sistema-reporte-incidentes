<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->has('razon_social')){}

        $razonSocialBuscada = $request->get('razon_social');
        $cuitBuscado = $request->get('cuit');

        // $clientes = DB::select('SELECT * FROM cliente');
        $clientes = DB::table('cliente')
            ->select('*')                                                   // No hace falta ponerlo, por defecto toma todas las columnas.
            ->where('razon_social', 'like', "%{$razonSocialBuscada}%")
            ->where('cuit','like',"{$cuitBuscado}%")                        // Para poner un AND, simplemente pongo otro "where()". Para poner un OR uso "orWhere()"  
            ->get();

        $parametros = [
            'clientes' => $clientes,
            'titulo' => "Listado de clientes"
        ];
        return view('clientes.clientes', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parametros = [
            'titulo' => "Crear cliente"
        ];
        return view('clientes.create-clientes', $parametros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required',
            'cuit' => 'required|numeric'
        ]);
        $razonSocialACrear = $request->post('razon_social');      // el key del post se debe corresponder con el name del input de la vista
        $cuitACrear = $request->post('cuit');

        DB::insert('INSERT INTO cliente (razon_social, cuit) VALUES (?, ?)', [$razonSocialACrear, $cuitACrear]);
        return response()->redirectTo('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!is_numeric($id))
            return response('ID INVÁLIDO - Debe ingresar un número.', 404);
        $cliente = DB::table('cliente')
            ->where('id', '=', $id)
            ->first();  
        
        $parametros = [
            'titulo' => "Cliente número $id",
            'cliente'=> $cliente
        ];

                                                //este método me devuelve el primer registro. También está latest().
        return view('clientes.show-clientes', $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
