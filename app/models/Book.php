<?php

class Book extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'title' => 'required|unique:books,title,:id' ,
		'author_id' => 'required|exists:authors,id' ,
		'amount' => 'numeric',
		'cover' => 'image|mimes:png,jpg,bmp,jpeg|max:2048'
	];

	// Don't forget to fill this array
	protected $fillable = ['title','author_id','amount','cover'];
	
	public function author(){
		return $this->belongsTo('Author');
	}

	public function users()
	{
		return $this-> belongsToMany('User') -> withPivot( 'returned' ) -> withTimestamps();
	}
/*
	public function borrow()
	{
		// ambil user yang sedang login
		$user = Sentry:: getUser();

		// attach user ke buku
		return $this-> users() -> attach( $user);
	}
*/
	public function borrow()
	{
		$user = Sentry:: getUser();
		
		// cek apakah buku ini sedang dipinjam oleh user
		if( $user-> books() -> wherePivot( 'book_id' , $this-> id) -> wherePivot( 'returned' , 0) -> count() > 0 ) {
			throw new BookAlreadyBorrowedException( "Buku $this->title sedang Anda pinjam. " );
		}
	
		if( $this-> stock == 0) {
			throw new BookOutOfStockException( "Buku $this->title sudah tidak tersedia. " );
		}
		
		return $this-> users()->attach($user);
	}

	public function returnBack()
	{
		$user = Sentry:: getUser();
		DB:: table( 'book_user' )
			-> where( 'book_id' , $this-> id)
			-> where( 'user_id' , $user-> id)
			-> where( 'returned' , 0)
			-> update( array(
			'returned' => 1 ,
			'updated_at' => $this-> freshTimestamp()
	));
	}
	protected $appends = [ 'stock' ];
	
	public function getStockAttribute()
	{
		$borrowed = DB:: table( 'book_user' )
		-> where( 'book_id' , $this-> id)
		-> where( 'returned' , 0)
		-> count();
		$stock = $this-> amount - $borrowed;
		return $stock;
	}

	public static function boot()
	{
		parent:: boot();
		//MODEL OBSERVER
		self:: updating( function( $book)
		{
			$borrowed = DB:: table( 'book_user' )
			-> where( 'book_id' , $book-> id)
			-> where( 'returned' , 0)
			-> count();
			
			if ( $book-> amount < $borrowed) {
				Session:: flash( 'errorMessage' , " Jumlah buku $book->title harus >= $borrowed" );
				return false;
			}
		});
		//MODEL OBSERVER
		self:: deleting( function( $book)
		{
			$borrowed = DB:: table( 'book_user' )
			-> where( 'book_id' , $book-> id)
			-> where( 'returned' , 0)
			-> count();
			if ( $borrowed > 0) {
				Session:: flash( 'errorMessage' , " Buku $book->title masih dipinjam. " );
				return false;
			}
		});

	}

	

}