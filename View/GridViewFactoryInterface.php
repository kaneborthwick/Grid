<?php

namespace Towersystems\Grid\View;

use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

interface GridViewFactoryInterface {

	/**
	 * [create description]
	 *
	 * @param  Grid       $grid       [description]
	 * @param  Parameters $parameters [description]
	 * @return [type]                 [description]
	 */
	public function create(Grid $grid, Parameters $parameters): GridViewInterface;

}