<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Models\Round;
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845

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

///////////////////SPA routes//////////////////////////
Route::get(
    '/{any?}',
    function () {
        return view('index');
    }
)->where('any', '^(?!api\/)[\/\w\.\,-]*');

<<<<<<< HEAD

// Route::get('/t',function(){
//     Round::where('name', 'ROUND1')->first()->update(['id' => '1']);
//     Round::where('name', 'ROUND2')->first()->update(['id' => '2']);
// });




=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
// require __DIR__.'/auth.php';
