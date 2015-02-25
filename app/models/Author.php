<?php

class Author extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'name' =>'required|unique:authors,name,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];
	
	public function books(){
		return $this->hasMany('Book');
	}
	public static function boot()
	{
		
		parent:: boot();
		
		self:: deleting( function( $author)
		{
			// mengecek apakah penulis masih punya buku
			if ( $author-> books-> count() > 0) {
			$html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ' ;
			$html .= '<ul>' ;
			foreach ( $author-> books as $book) {
			$html .= " <li> $book->title</li> " ;
			}
			$html .= '</ul>' ;
			Session:: flash( 'errorMessage' , $html );
			return false;
			}
			});
	}


}