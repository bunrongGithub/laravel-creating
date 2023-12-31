<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
   //return view('welcome');
   $users = DB::select("select * from users");
   /** Create new user */
   /**$user = DB::insert('insert into users (username,email,password) values (?,?,?)',[
      'ron sarouen',
      'bunbunrong993@gmail.com',
      '16072002'
   ]);*/
   /** update step one */

   /** $user = DB::update("update users set email = 'rong12@gmail.com' where id = 2");*/ 

   /**Update step two */

   /**$user = DB::update("update users set email =? where id = ?",[
      'narakota67@gmail.com',
      '1',
   ]);*/
   
   /** Delete the users */
   
   /**$user = DB::delete('delete from users where id = ?',[
      '2'
   ]);*/

   dd($users);
});

Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
