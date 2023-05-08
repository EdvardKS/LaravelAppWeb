<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rol;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

   // Muestra la lista de categorías o productos en una categoría específica
    public function index(Request $request)
    {
        $titulo = "Asador la Morenica a la carta";
        $productos = Category::all();

        // Verifica si se ha enviado el parámetro "category" en la URL
        if ($request->has("categoria")) {
            $categoria = Category::findOrFail($request->query("categoria"));
            $productos = $categoria->productos; // Collection
            // $productos = $categoria->productos()->where("name", "Cortezas")->first(); // Relation (hasMany, belongToMany, etc)
            $titulo = $categoria->name;
        }

        // Retorna la vista 'products' con las variables 'titulo' y 'productos'
        return view('products', ['titulo' => $titulo, 'productos' => $productos]);
    }


    // Muestra la lista de categorías en el panel de administración
    public function indexCrud(Request $request)
    {
        
        // Obtiene el valor del parámetro 'text' de la URL y lo almacena en la variable $text
        $text = trim($request->get('text'));

        // Obtiene el ID del rol del usuario autenticado y busca el nombre del rol en la tabla de roles
        $userRoleId = auth()->user()->rol_id;
        $userRole = Rol::find($userRoleId)->name;

        // Realiza una consulta a la tabla de categorías buscando las coincidencias del texto ingresado 
        $categorias = DB::table('categories')
            ->where('name', 'LIKE', '%' . $text . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);
        
        // Retorna la vista 'admin.categories.index' con las variables 'categorias', 'text' y 'userRole'
        return view('admin.categories.index', compact('categorias', 'text', 'userRole'));
    }

    //Muestra la vista de creación de categorías
    public function create()
    {
        return view('admin.categories.create');
    }

    // Almacena una nueva categoría en la base de datos
    public function store(Request $request)
    {
        // Valida los datos ingresados en el formulario de creación de categorías
        $request->validate([
            'id' => 'required|unique:categories,id',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        // Crea una nueva categoría en la base de datos
        Category::create($request->all());

        // Redirige al usuario a la lista de categorías en el panel de administración
        return redirect()->route('categories.indexCrud');
    }

    // Muestra una categoría específica en una vista
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Muestra el formulario de edición para una categoría específica    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Actualiza una categoría específica en la base de datos
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.indexCrud');
    }

    // Elimina una categoría específica de la base de datos
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Obtener el ID de la categoría "Sin categoría"
        $defaultCategoryId = Category::where('name', 'Sin categoría')->first()->id;

        // Actualizar los productos asociados a la categoría eliminada
        $category->productos()->update(['category_id' => $defaultCategoryId]);

        //Borrado completo
        $category->forceDelete();
        return redirect()->route('categories.indexCrud');
    }

    //Realiza el borrado lógico de una categoría especifica
    public function borrado($id)
    {
        $category = Category::findOrFail($id);
        // Obtener el ID de la categoría "Sin categoría"
        $defaultCategoryId = Category::where('name', 'Sin categoría')->first()->id;

        // Actualizar los productos asociados a la categoría eliminada
        $category->productos()->update(['category_id' => $defaultCategoryId]);
        
        //Borrado lógico
        $category->delete();
        return redirect()->route('categories.indexCrud');
    }

    //Restaura una categoría previamente borrada mediante el borrado lógico
    public function restore($id)
    {
        // Encuentra la categoría eliminada (con borrado lógico) por ID 
        $category = Category::withTrashed()->findOrFail($id);
        
        $category->restore();

        return redirect()->route('categories.indexCrud');
    }
}
