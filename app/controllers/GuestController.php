<?php

class GuestController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.guest';
	
	public function login()
	{
	// redirect ke dashboard jika user sudah login
		if (Sentry:: check()) {
			Session:: reflash();
			return Redirect:: to( 'dashboard' );
		}

		$this-> layout-> content = View:: make( 'guest.login' );
	}
	
	public function index()
	{
	// Redirect ke dashboard jika user sudah login
		if (Sentry:: check()) {
			return Redirect:: to( 'dashboard' );
		}
	// Tampilkan halaman index
	$this-> layout-> content = View:: make( 'guest.index' ) -> withTitle( " Daftar Buku" );
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
