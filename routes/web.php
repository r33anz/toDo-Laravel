<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('productos', function () {
    $p =  Product2::all();
    return view('productos.index',compact('p'));
})-> name('productos.index');

Route::get('productos/crear',function(){
    return view('productos.create');
}) -> name('productos.create');

Route::post('productos',function(Request $request){
    
    $newP = new Product2;
    $newP -> descripcion = $request -> input('descripcion');
    $newP -> precio = $request -> input('precio');
    $newP -> save();
    return redirect() -> route('productos.index') -> with('info','Producto creado exitosamente');
}) -> name('productos.guardar');
