<?php
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel
{
	public function books()
	{
		return $this-> belongsToMany( 'Book' ) -> withPivot( 'returned' ) -> withTimestamps();
	}
}