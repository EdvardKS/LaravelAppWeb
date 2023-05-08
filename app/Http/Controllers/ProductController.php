<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // Muestra la vista de la lista de productos según la búsqueda y la página actual.
    public function index(Request $request)
    {
        $currentPage = $request->input('page') ?? 1;

        //Se recibe la búsqueda del usuario en el parámetro $request
        $text = trim($request->get('text'));

        $userRoleId = auth()->user()->rol_id;
        $userRole = Rol::find($userRoleId)->name;

        //Se realiza la búsqueda teniendo en cuenta lo introducido por el usuario.
        $productos = DB::table('products')
            ->where('name', 'LIKE', '%' . $text . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.products.index', compact('productos', 'text', 'userRole', 'currentPage'));
    }


    // Obtiene todas las categorías y las muestra en la vista de productos.
    public function getAllCategories()
    {
        $categorias = Category::all();
        return view('products', compact('categorias'));
    }

    // Muestra la vista para crear un nuevo producto.
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    // Guarda un nuevo producto en la base de datos y redirige con un mensaje de éxito.
    public function store(Request $request)
    {
        try {

            //validamos los campos correspondientes ->  'image' => 'required|image|mimetypes:image/jpg,image/jpeg|max:2048',
            $request->validate(
                [
                    'name' => 'required',
                    'image' => 'required|image|mimetypes:image/jpg,image/jpeg',
                    'category_id' => 'required',
                    'description' => 'nullable',
                ]
            );

            // Subo la imagen
            // Antes cambio el nombre de la imagen añadiendole el tiempo para que siempre sea distinto
            // Utilizo move y no store ni storeAs "Guardarlo como" porque queremos por un lado mover solo la imagen con el nuevo nombre
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img/products'), $imageName);

            // En bd nos gaurdamos solo el nombre
            //Si pasa la validacion creamos un objeto y se almacena en la base de datos
            Product::create(array_merge($request->all(), ['image' => $imageName]));
            return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['image' => 'Error al subir la imagen: ' . $e->getMessage()]);
        }
    }

    // Muestra la vista con los detalles del producto.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Muestra la vista para editar un producto.
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Actualiza un producto existente en la base de datos y redirige con un mensaje de éxito o de información si no se realizaron cambios.
    public function update(Request $request, Product $product)
    {

        // Primero validamos los campos correspondientes
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
        ]);

        // Comparar valores actuales con valores en la solicitud
        $updatedData = $request->only(['name', 'description', 'category_id']);
        $hasChanges = false;

        foreach ($updatedData as $key => $value) {
            if ($product->$key != $value) {
                $hasChanges = true;
                break;
            }
        }

        // Si se ha enviado una imagen en la solicitud

        if ($request->hasFile('image')) {
            // Subir la imagen y actualizar el registro del producto
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
            $hasChanges = true;
        } else {
            // Si esta vacío hay que hacer algo
        }

        // Actualizar el registro del producto solo si hay cambios
        if ($hasChanges) {
            $product->update($updatedData);
            return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
        } else {
            return redirect()->route('products.index')->with('info', 'No se realizaron cambios en el producto');
        }
    }

    // Elimina completamente un producto de la base de datos y redirige con un mensaje de error si el producto ya ha sido eliminado lógicamente.
    public function destroy($id)
    {
        $currentPage = request()->input('current_page') ?? 1;
        $product = Product::withTrashed()->find($id);

        if ($product->trashed()) {
            // Si el registro ya ha sido eliminado lógicamente, redirecciona a la lista de productos
            return redirect()->route('products.index')->with('error', 'El producto ya ha sido eliminado.');
        }

        // Si el registro existe, borrarlo completamente
        $product->forceDelete();
        return redirect()->route('products.index', ['page' => $currentPage]);
    }

    // Elimina lógicamente un producto de la base de datos y redirige con un mensaje de error si el producto ya ha sido eliminado lógicamente.
    public function borrado($id)
    {
        $currentPage = request()->input('current_page') ?? 1;
        $product = Product::withTrashed()->findOrFail($id);

        if ($product->trashed()) {
            return redirect()->route('products.index', ['page' => $currentPage])->with('error', 'El producto ya ha sido eliminado.');
        }

        //Borrado lógico
        $product->delete();
        return redirect()->route('products.index');
    }

    // Restaura un producto eliminado lógicamente y redirige a la lista de productos.
    public function restore($id)
    {
        $currentPage = request()->input('current_page') ?? 1;
        $producto = Product::withTrashed()->findOrFail($id);
        $producto->restore();

        return redirect()->route('products.index', ['page' => $currentPage]);
    }
}
