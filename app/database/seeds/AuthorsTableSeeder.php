<?php

class AuthorsTableSeeder extends Seeder {

public function run()
{
	// kosongkan database
	DB:: table( 'authors' ) -> delete();

	// buat array untuk diinput
	$authors = [
			[ 'id' => 1 , 'name' => 'Mohammad Fauzil Adhim' , 'created_at' => '2014-05-01 11:15:22' , 'updated_at' => '2014-05-01 11:15:22' ],
			[ 'id' => 2, 'name' => 'Salim A. Fillah' , 'created_at' => '2014-05-01 11:15:22' , 'updated_at' => '2014-05-01 11:15:22' ],
			[ 'id' => 3, 'name' => 'Aam Amiruddin' , 'created_at' => '2014-05-01 11:15:22' , 'updated_at' => '2014-05-01 11:15:22' ],
		];

	// insert data ke database
	DB:: table( 'authors' ) -> insert( $authors);
	}

}