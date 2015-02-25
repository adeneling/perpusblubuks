<?php

class BookUserTableSeeder extends Seeder {

	public function run()
	{
		// kosongkan database
		DB:: table( 'book_user' ) -> delete();
	
		// Karena id dari user dari Sentry selalu berubah ketika melakukan db:seed, kita ambil id user dengan query.
		$userId = User:: where( 'email' , 'user.user@gmail.com' ) -> first() -> id;
	
		// buat array untuk diinput
	$bookusers = [
	[ 'id' => 1 , 'book_id' => 1 , 'user_id' => $userId, 'returned' => 0, 'created_at' => '2014-05-20 08:03:57' , 'updated_at' => '2014-05-20 08:03:57' ],
	[ 'id' => 2, 'book_id' => 2, 'user_id' => $userId, 'returned' => 0, 'created_at' => '2014-05-20 08:03:57' , 'updated_at' => '2014-05-20 08:03:57' ],
	];
	
		// insert data ke database
		DB:: table( 'book_user' ) -> insert( $bookusers);
	}
	
}