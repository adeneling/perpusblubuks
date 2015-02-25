<?php
Route:: get( '/' , 'GuestController@index' );

Route:: group( array( 'before' => 'auth' ), function () {
	Route:: get( 'profile' , array( 'as' => 'member.profile' , 'uses' => 'MemberController@profile' ));
	Route:: get( 'profile/edit' , array( 'as' => 'member.profile.edit' , 'uses' => 'MemberController@editProfile' ));
	Route:: post( 'profile' , array( 'as' => 'member.profile.update' , 'uses' => 'MemberController@updateProfile' ));
	Route:: get( 'editpassword' , array( 'as' => 'home.editpassword' , 'uses' => 'HomeController@editPassword' ));
	Route:: post( 'updatepassword' , array( 'as' => 'home.updatepassword' , 'uses' => 'HomeController@updatePassword' ));


	Route::get('dashboard', array('as'=>'dashboard', 'uses'=>'HomeController@dashboard'));
	Route:: get( 'books' , array( 'as' => 'member.books' , 'uses' => 'MemberController@books' ));
	Route:: get( 'books/{book}/borrow' , array( 'as' => 'books.borrow' , 'uses' => 'BooksController@borrow' ));
	Route:: get( 'books/{book}/return' , array( 'as' => 'books.return' , 'uses' => 'BooksController@returnBack' ));
	
	Route:: group( array( 'prefix' => 'admin' , 'before' => 'admin' ), function()
	{
		Route:: resource( 'authors' , 'AuthorsController' );
	});
});

Route:: group( array( 'prefix' => 'admin' , 'before' => 'admin' ), function(){
	Route:: resource( 'authors' , 'AuthorsController' );
	Route:: resource( 'books' , 'BooksController' );
});


Route:: get( 'login' , array( 'guest.login' , 'uses' => 'GuestController@login' ));
Route:: post( 'authenticate' , 'HomeController@authenticate' );
Route:: get( 'logout' , 'HomeController@logout' );

Route:: get( 'datatable/books/borrow' , array( 'as' => 'datatable.books.borrow' , 'uses' => 'BooksController@borrowDatatable' ));


?>
