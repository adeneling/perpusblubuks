<?php

class MemberController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/**
	* Tampilkan halaman peminjaman buku
	* @return response
	*/
	public function __construct()
	{
		// Letakan filter regularUser sebelum memanggil semua method
		$this-> beforeFilter( 'regularUser' );
	}

	public function editProfile()
	{
		return View:: make( 'profile.edit' ) -> withTitle( 'Perbaharui Profil' )-> withUser(Sentry:: getUser());
	}
	
	public function updateProfile()
	{
		$user = Sentry:: getUser();
		try
		{
				// Perbaharui data user
			$user-> email = Input:: get( 'email' );
			$user-> first_name = Input:: get( 'first_name' );
			$user-> last_name = Input:: get( 'last_name' );

			$user-> save();
			// Simpan data user
			if ( $user-> save())
			{
				return Redirect:: route( 'member.profile' ) -> with( 'successMessage' , 'Profil berhasil diperbaharui.' );
			}
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			return Redirect:: back() -> with( 'errorMessage' , $e-> getMessage()) -> withInput();
		}
	}

	public function profile()
	{
		$user = Sentry:: getUser();
		return View:: make( 'profile.show' ) -> withTitle( 'Profil' )
		-> withUser( $user);
	}


	public function books()
	{
		return View:: make( 'books.borrow' ) -> withTitle( 'Pilih buku' );
	}

	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
