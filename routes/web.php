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


/*
Route::get('/', function () {
    return view('welcome');
});
*/
// pass data from view to controller


Route::get('/test1', function () {
    return "Welcome test 1";
});


// route parameter

// هاي الطريقة بعد الرابط لازم يكون في الرقم الخاص مثلا بصورة او اي شي
Route::get('/show-number{id}', function ($id) {
    return view($id);
});

// هنا ممكن نرجع رقم او ما نرجع اشيي
Route::get('/show-string{id?}', function () {
    return view('welcome');
});

//route name

// هاي علشان لما انا بدي اعمل استدعاء رابط بكتب بس الاسم الي انا حطتيه
//{{\route('Mohamed')}}
Route::get('/test', function () {
    return view('welcome');
})->name('Mohamed');


//name space
// فكرة النيم سبيس علشان تعرف كل الراوترات علي هذا المجدل بدل ما تضل تكتب اسم المجلد سلاش بعدين الراوت
Route::namespace('Front')->group(function () {
    Route::get('user', 'UserController@showUserName');
});

// middleware
//بتعملي صلاحيات علي الروابط ممنوع يفتح صفحة اليوزر غير لما يعمل تسجيل دخول علي الموقع
Route::group(['middleware' => 'auth'], function () {
    Route::get('user', 'UserController@showUserName');
});

// middleware علي مستوى الرابط
Route::get('user', 'Front\UserController@showUserName')->middleware('auth');
Route::get('user1', 'Front\UserController@showUserName1');
Route::get('user3', 'Front\UserController@showUserName3');


//pass data from view to controller
// pass data  in api
/*
Route::get('/', function () {

    $string = array('name' => 'mohammed', 'id' => 5);
    return view('welcome', $string);
});
*/
// pass data  in object
Route::get('/', function () {
    // يتم كتابة الاري باي طريقة تريد بس يفضل الاري بالطريقة الاولة لانه الثانية تعتبر كناتج a هوا mohammed  وناتج ال b  هوا  ahmed
    //$dataview=['mohammed 1','ahmed'];
    $dataemty = [];  //  اعملت اري علشان اجرب عليه قصة الامتي الي موجودة في الwelcome   وضيفتها زي else  انه ادا ما فيه داتا تطبعلي الامتي

    $dataview = ['a' => 'mohammed 1', 'b' => 'ahmed'];
    return view('welcome', compact('dataemty'));
});

//Route Resource

Route::resource('news', 'NewsController');


//route in view page botestrap
Route::get('/landing', function () {

    return view('landing');
});

// هاي الراوتات انضافت اتمتكك من ال npm
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

