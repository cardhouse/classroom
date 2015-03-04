<?php

use Classroom\Promotions\Promo;
use Classroom\LocalClasses\LocalClassesRepository;
use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {

    use CommanderTrait;
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
		$repo = new LocalClassesRepository;
		$classes = $repo->getAll();

		/**
		 * Share variables across all layouts
		 */
		View::share('promo_codes', $promos);
		View::share('currentUser', Auth::user());
		View::share('classes', $classes);
	}
}
