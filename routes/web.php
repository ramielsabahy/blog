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
Route::get('/login', function(){
	return view('auth.login');
});
// Registering a user to newsletter service powered by mailchimp
Route::post('/subscribe', function(){
	$email = request('email');

	Newsletter::subscribe($email);

	Session::flash('success', 'Successfully subscribed.');

	return redirect()->back();
});

Route::get('/', ['uses' => 'FrontEndController@index' , 'as' => 'index']);
Route::get('/post/{slug}', ['uses' => 'FrontEndController@singlePost', 'as' => 'post.single']);

Route::get('/category/{id}', ['uses' => 'FrontEndController@category', 'as' => 'category.single']);
Route::get('/tag/{id}', ['uses' => 'FrontEndController@tag', 'as' => 'tag.single']);

// Route for searching Posts of the Blog
Route::get('/results', function(){
	$post = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();

	return view('results')->with('posts', $post)
						  ->with('title', 'Search results : ' . request('query'))
                          ->with('info', \App\Setting::get()->first())
                          ->with('categories', \App\Category::take(5)->get())
                          ->with('query', request('query'));
});

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
	Route::get('/dashboard', ['uses' => 'HomeController@index', 'as' => 'home']);

	Route::get('/post/create',['uses' => 'PostsController@create', 'as' => 'post.create']);
	Route::post('/post/store',['uses' => 'PostsController@store', 'as' => 'post.store']);
	Route::get('/posts',['uses' => 'PostsController@index', 'as' => 'posts']);
	Route::get('/posts/trashed',['uses' => 'PostsController@trashed', 'as' => 'posts.trashed']);
    Route::get('/post/delete/{id}',['uses' => 'PostsController@destroy', 'as' => 'post.delete']);
    Route::get('/post/edit/{id}', ['uses' => 'PostsController@edit', 'as' => 'post.edit']);
    Route::post('/post/update/{id}',['uses' => 'PostsController@update', 'as' => 'post.update']);
    Route::get('/posts/kill/{id}',['uses' => 'PostsController@kill', 'as' => 'post.kill']);
    Route::get('/posts/restore/{id}',['uses' => 'PostsController@restore', 'as' => 'post.restore']);

	Route::get('/category/create',['uses' => 'CategoriesController@create', 'as' => 'category.create']);
	Route::get('/categories',['uses' => 'CategoriesController@index', 'as' => 'categories']);
	Route::post('/category/store',['uses' => 'CategoriesController@store', 'as' => 'category.store']);
	Route::get('/category/edit/{id}', ['uses' => 'CategoriesController@edit', 'as' => 'category.edit']);
	Route::get('/category/delete/{id}', ['uses' => 'CategoriesController@destroy', 'as' => 'category.delete']);
	Route::post('/category/update/{id}',['uses' => 'CategoriesController@update', 'as' => 'category.update']);

    Route::get('/tag/create',['uses' => 'TagsController@create', 'as' => 'tag.create']);
	Route::get('/tags', ['uses' => 'TagsController@index', 'as' => 'tags']);
	Route::get('/tag/edit/{id}', ['uses' => 'TagsController@edit', 'as' => 'tag.edit']);
	Route::get('/tag/delete/{id}', ['uses' => 'TagsController@destroy', 'as' => 'tag.delete']);
	Route::post('/tag/update/{id}', ['uses' => 'TagsController@update', 'as' => 'tag.update']);
    Route::post('/tag/store',['uses' => 'TagsController@store', 'as' => 'tag.store']);


    Route::get('/users', ['uses' => 'UsersController@index', 'as' => 'users']);
    Route::get('/user/create', ['uses' => 'UsersController@create', 'as' => 'user.create']);
    Route::post('/user/store', ['uses' => 'UsersController@store', 'as' => 'user.store']);
	
	Route::get('/user/make-admin/{id}', ['uses' => 'UsersController@admin', 'as' => 'user.admin']);
	Route::get('/user/remove-admin/{id}', ['uses' => 'UsersController@notAdmin', 'as' => 'user.notAdmin']);

	Route::get('/user/profile', ['uses' => 'ProfilesController@index', 'as' => 'user.profile']);
	Route::get('/user/delete/{id}', ['uses' => 'UsersController@destroy', 'as' => 'user.delete']);
	Route::post('/user/profile/update', ['uses' => 'ProfilesController@update', 'as' => 'user.profile.update']);

	Route::get('/settings', ['uses' => 'SettingsController@index', 'as' => 'settings']);
	Route::post('/settings/update', ['uses' => 'SettingsController@update', 'as' => 'settings.update']);

});

Route::get('/firebase' , ['uses' => 'FirebaseController@index', 'as' => 'send']);
Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');

Route::get('auth/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');


