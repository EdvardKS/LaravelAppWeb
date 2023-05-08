<?php

namespace App\Http\Controllers;

use App\Models\Encargo;
use App\Models\Product;
use Illuminate\Http\Request;

class EncargoController extends Controller
{

    //Muestra la lista de encargos con fecha de entrega futura
    public function index()
    {
        $encargos = Encargo::where('hora_entrega', '>', now())
            ->with('product') // Carga la relación del producto
            ->orderBy('hora_entrega')
            ->get();

        return view('admin.encargos.index', ['encargos' => $encargos]);
    }

    // Muestra la vista de creación de un nuevo encargo.
    public function create()
    {

        return view('admin.encargos.create');
    }


    // Guarda un nuevo encargo desde el panel de administración y redirige con un mensaje de éxito.
    public function storePanel(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'hora_pedido' => 'required|date_format:H:i',
            'description' => 'required|string',
        ]);

        // Crear un nuevo objeto Encargo con los datos del formulario
        $encargo = new Encargo([
            'nombre_apellidos' => $request->name,
            'hora_entrega' => $request->date . " " . $request->hora_pedido,
            'detalles' => $request->description
        ]);

        $encargo->save();

        return redirect()->route('encargos.index')->with('success', 'Encargo creado exitosamente');
    }



    // Guarda un nuevo encargo desde una solicitud externa y devuelve una respuesta de éxito.
    public function store(Request $request)
    {
        $datos = json_decode($request[0]);
        // Encuentra el producto utilizando el nombre recibido
        $producto = Product::where('name', $datos->{"pedido-usuario"})->first();

        // Crear un nuevo objeto Encargo con los datos recibidos
        $encargo = new Encargo([
            'nombre_apellidos' =>$datos->{"identidad-usuario"} ,
            'menu_id' => $producto->id,
            'detalles' =>$datos->{"detalles"},
            'hora_entrega' => $datos->{"hora-usuario"},
            'email' =>$datos->{"email-usuario"} ,
            'telefono' => $datos->{"telefono-usuario"},
            'codigo_postal' =>$datos->{"cp-usuario"},
        ]);


        $encargo->save();

        return response()->json($encargo);
        //return redirect()->back()->with('success', 'Encargo realizado con éxito');
    }


    // Actualiza y muestra la tabla de encargos con fecha de entrega futura.
    public function refresh()
    {
        $encargos = Encargo::where('hora_entrega', '>', now())
            ->orderBy('hora_entrega')
            ->get();
        return view('admin.encargos._table', compact('encargos'));
    }


    // Marca un encargo como entregado y redirige con un mensaje de éxito.
    public function entregado(Encargo $encargo)
    {
        $encargo->entregado = true;
        $encargo->save();

        return redirect()->back()->with('success', 'Encargo entregado con éxito.');
    }
}
