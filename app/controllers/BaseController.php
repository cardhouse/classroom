<?php

use Classroom\Promotions\Promo;

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		$promos = Promo::orderBy('promo_code')->get();

		/**
		 * Share variables across all layouts
		 */
		View::share('promo_codes', $promos);
		View::share('currentUser', Auth::user());
		
	}
}
