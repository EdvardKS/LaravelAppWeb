<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\HorariosApertura;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailpit;

class PublicController extends Controller
{
    //Este método nos permite recoger los menus y categorías que luego se imprimen en la vista
    function home()
    {
        // Consulta a la tabla Settings y filtra los registros que tienen el valor 'home_uno_uno' en la columna 'lugar'
        $home_uno_uno = Setting::all()->where('lugar', '=', 'home_uno_uno')->first();
        $home_uno_dos = Setting::all()->where('lugar', '=', 'home_uno_dos')->first();
        $home_uno_tres = Setting::all()->where('lugar', '=', 'home_uno_tres')->first();

        $home_dos_uno = Setting::all()->where('lugar', '=', 'home_dos_uno')->first();
        $home_dos_dos = Setting::all()->where('lugar', '=', 'home_dos_dos')->first();
        $home_dos_tres = Setting::all()->where('lugar', '=', 'home_dos_tres')->first();
        $home_dos_cuatro = Setting::all()->where('lugar', '=', 'home_dos_cuatro')->first();

        // Crea un array 'pro' con las imágenes de los registros consultados previamente
        $pro = [
            $home_uno_uno->image,
            $home_uno_dos->image,
            $home_uno_tres->image
        ];

        // Crea un array 'cat' con las imágenes de los registros consultados previamente
        $cat = [
            $home_dos_uno->image,
            $home_dos_dos->image,
            $home_dos_tres->image,
            $home_dos_cuatro->image
        ];

        // Consulta a la tabla Product y Category además filtra los registros que tienen imágenes que coinciden con el array 
        // Ordena los resultados en función del orden en el que aparecen las imágenes en el array 
        $products = Product::whereIn('image', $pro)->orderByRaw("FIELD(image, '" . implode("','", $pro) . "')")->get();
        $categories = Category::whereIn('image', $cat)->orderByRaw("FIELD(image, '" . implode("','", $cat) . "')")->get();


        return view('home', ['productos' => $products, 'categorias' => $categories]);
    }

    // Este método muestra los ajustes relacionados con la configuración de la página de inicio y el menú
    public function showSettings()
    {
        // Consulta a la tabla Settings y filtra los registros que tienen los valores especificados en la columna 'lugar'
        $homeSettings = Setting::whereIn('lugar', [
            'home_uno_uno', 'home_uno_dos', 'home_uno_tres',
            'home_dos_uno', 'home_dos_dos', 'home_dos_tres', 'home_dos_cuatro'
        ])->get();

        
        $menu = Product::where('category_id', 1)->get();


        $categories = Category::all();

        return view('admin.settings.index', ['settings' => $homeSettings, 'menus' => $menu, 'categories' => $categories]);
    }

    // Este método guarda los ajustes de la página de inicio y el menú en la base de datos
    public function saveSettings(Request $request)
    {
        
        // Obtiene todos los datos del formulario enviado, excepto el token CSRF
        $settings = $request->except(['_token']);

        foreach ($settings as $lugar => $image) {
                // Actualiza o crea un nuevo registro en la tabla Settings con los valores de 'lugar' e 'image'
            Setting::updateOrCreate(['lugar' => $lugar], ['image' => $image]);
        }

        return redirect()->route('settings.index');
    }

    // Este método muestra la vista para realizar un encargo
    public function makeOrder()
    {
        $days = Day::all();

        $menu = Product::where('category_id', 1)->get();

        // Retorna la vista 'make-order' con las variables 'productos' y 'days'
        return view('make-order', ['productos' => $menu, 'days' => $days]);
    }


   
    // Este método envía un correo electrónico utilizando los datos proporcionados en el formulario
    public function enviarCorreo(Request $request)
    {
        // Crea un array asociativo con la información del formulario
        $data = [
            'nombre' => $request->input('nombre-usuario') . ' ' . $request->input('apellidos-usuario'),
            'email' => $request->input('email-usuario'),
            'mensaje' => $request->input('comentario-usuario')
        ];

        // Envía un correo electrónico a la dirección especificada
        Mail::to('info@asadorlamorenica.com')->send(new ContactanosMailpit($data));

        return redirect()->back()->with('success', 'Correo enviado exitosamente!');
    }





    function unsubscribe()
    {
        return view('unsubscribe');
    }

    function products(Request $req)
    {
        return view('products', ['productos' => $req]);
    }

    function whoWeAre()
    {
        return view('who-we-are');
    }

    function contact()
    {
        $horarios = HorariosApertura::all();
        return view('contact', ['horarios' => $horarios]);
    }

    function privacyPolices()
    {
        return view('privacy-policies');
    }

    function privacyCookies()
    {
        return view('privacy-cookies');
    }

    function legalWarning()
    {
        return view('legal-warning');
    }

    function faqs()
    {
        return view('faqs');
    }

    function sitemap()
    {
        $categories = Category::all();
        return view('sitemap', compact('categories'));
    }
}
