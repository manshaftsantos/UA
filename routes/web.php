<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'HomeController@register')->name('register');

Route::get('/test', function () {
    $matricule = '11R1211';
    $arr = str_split($matricule);
    $array_number = [0,1,3,4,5,6];
    $nombre_entier = 0;
    
    // dd(ctype_digit($arr[2]),ctype_alpha($arr[2]));

    if (strlen($matricule) == 7) {
        if (ctype_alpha($arr[2])) {
            for ($i=0; $i < 6; $i++) { 
                if (ctype_digit($arr[$array_number[$i]])) {
                    $nombre_entier++;
                }
            }
            if ($nombre_entier == 6) {
                echo "matricule correct";
            }
            else {
                echo "matricule incorrect";
            }
        }
        else
        {
            echo "matricule erroné";
        }
    }
    else {
        echo "votre matricule doit contenir setp(7) caracteres";
    }
});
