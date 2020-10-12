<?php

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
    return view('publicpages.home');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//public pages controller-----------------------

Route::get('/', 'publicController@index');
Route::get('/supplier/view/{id}', 'publicController@viewSupplier');
Route::get('/customer/view/{id}','publicController@viewCustomer'); // view cutomer

Route::get('/community/view', 'publicController@community');
//-help
Route::get('/help/view', 'publicController@helpView'); // help view
Route::get('/help/FAQ', 'publicController@faq'); // help view
Route::post('/help/faq/question', 'publicController@faqAdd');




//login reg-----------------------------

Route::get('/registration', 'registrationController@regcategory'); //view category form

Route::get('/registration/customer', 'registrationController@customerform'); //view cus form
Route::post('/register/customer','registrationController@registerCustomer'); //save

Route::get('/registration/supplier', 'registrationController@supplierform'); //view sup form
Route::post('/register/supplier','registrationController@registerSupplier'); //save

Route::get('/login', 'loginController@viewlogin'); //view login form
Route::post('/login/user','loginController@loginUser'); //login ettempt

Route::post('login', [ 'as' => 'login', 'uses' => 'loginController@viewlogin']);

//search------------------------

Route::get('/search/index', 'searchController@index');
Route::get('/live_search/action', 'searchController@action')->name('live_search.action');

Route::get('/live_search/customerlist', 'searchController@customerlist')->name('live_search.customerlist');

//supplire pages-------------
Route::get('/supplier/index', 'supplierController@index');
Route::get('/supplier/editprofile', 'supplierController@editprofile');
Route::post('/supplier/profile/update', 'supplierController@updateprofile');//update profile

Route::get('/supplier/profile/addproducts', 'supplierController@addProductsView');//view
Route::post('/supplier/addProduct', 'supplierController@addProduct');//addproducts function

Route::get("/find/customer/{homeTown}", 'searchController@customerlistView');//addproducts function

//**Admin routs********************************************************** */

///Admin-Dashboard
Route::get('/admin', 'adminController@dashboard');
Route::get('/admin/viewuser/customer/{id}', 'adminController@viewcustomer');
Route::get('/admin/viewuser/supplier/{id}', 'adminController@viewsupplier');

//View users
Route::get('admin/mailbox/{email}', 'adminController@mailusers');
Route::get('admin/removeuser/customer/{id}', 'adminController@removecustomer');
Route::get('admin/removeuser/supplier/{id}', 'adminController@removesupplier');

///Admin-Advertisements
Route::resource('/admin/advertisements', 'advertismentController');
Route::get('/deleteAds/{id}', 'advertismentController@remove');//destroy
Route::post('/updateAds/{id}', 'advertismentController@update');

//Admin-Profile
Route::get('/admin/profile', 'adminController@viewprofile');
Route::post('/admin/profile/update', 'adminController@updateprofile');

//Admin-products
Route::get('/admin/products', 'adminController@viewproducts');
/* Route::get('/admin/addproducts', 'adminController@addproducts'); */
Route::post('/admin/products/store', 'adminController@productsstore');//save products
Route::get('/admin/manageproducts/{id}', 'adminController@manageproducts');//manage products
Route::post('admin/updateproductimages/{id}', 'adminController@updateproducts');//update products  
Route::get('/admin/deleteproduct/{id}', 'adminController@deleteproducts');

//Admin-MailBox
Route::get('/admin/mailbox', 'adminController@mailbox');
Route::post('/admin/sendmail', 'adminController@sendmail');

//Admin - customer list
Route::get('/admin/customerlist', 'adminController@viewcustomerslist');

//Admin - help
Route::get('/admin/faq/view', 'adminController@viewHelp'); // help view
Route::post('/admin/faq/view/post/{id}', 'adminController@saveHelp'); // help view
Route::get('/admin/faq/remove/{id}', 'adminController@removeHelp'); 
Route::post('/admin/faq/view/post/', 'adminController@newHelp'); 


//-------------------------------hansana--------------------
//------------------------------customer ordeers------------------------------//

Route::get('/customer/orders/{id}', 'publicController@viewCustomerOrders');
Route::post('/customer/orders/reserve', 'reserveController@reserveorder');
Route::get('/supplier/myorders/{id}', 'supplierController@viewmyorders');
Route::get('/supplier/myorders', 'supplierController@viewOrderslist');



//===================================suba========================================================//

Route::get('/show', 'orderController@showorder');

Route::post('/upadtedata','orderController@upadteorder');

Route::get('/createOrder', 'orderController@getproductname');
Route::post('/h','orderController@createorder');

Route::get('/delete/{id}','orderController@removeorder');

Route::get('/se','SearchController@index');
Route::get('/search','SearchController@search');

Route::get('/reservedsppliers/{id}','orderController@reservedsuppliers');
Route::post('/viewreservedonesupplier','orderController@viewreservedonesupplier');
Route::get('/showsuppliertocustomerdashboard','orderController@showordertocustomer');

//rating

Route::get('posts', 'HomeController@posts')->name('posts');

Route::post('post/post', 'HomeController@postPost'); 

Route::get('posts/{id}', 'HomeController@show');

//-----------------customer pages------------------

Route::get('/customer/index','customerController@index');// customer after login


//=========================================//


//----------------------------------------pdf test-----------



 Route::get('/genaratepdf','NotesController@generatePDF'); //test

 Route::get('/supplier/generatebill','supplierController@downloadPdf');
 //Route::get('/supplier/viewbill/{id}','supplierController@viewBill');
 Route::get('pdfview',array('as'=>'pdfview','uses'=>'supplierController@viewBill'));


 //------------------------------------piumi new----------------------------

 //header links
Route::get('/aboutus', 'publicController@aboutus');
Route::get('/contactus', 'publicController@contactus');
Route::get('/comment', 'publicController@comment');

Route::get('/addcomment', 'publicController@addCommentsView');//view
Route::post('/addcomment', 'publicController@addComment');//view
Route::post('/showcomment/{id}', 'publicController@showComment');//view

Route::get('/customer/editprofile', 'customerController@editprofile');
Route::post('/customer/profile/update', 'customerController@updateprofile');//update profile

//----------------supplier products

Route::post('/showProducts/{id}', 'supplierController@showproduct');//view


Route::get('/supplier/view', 'supplierController@updateView');

Route::get('/supplier/editProduct/{id}', 'supplierController@editProduct');
Route::post('/supplier/product/update/{id}', 'supplierController@updateProduct');

Route::get('/deleteProduct/{id}', 'supplierController@remove');//delete


//===============udar-------------------

//------------------comments-----------------

Route::post('/comments', 'commentsController@store');