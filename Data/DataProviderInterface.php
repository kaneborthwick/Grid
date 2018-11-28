<?php

namespace Towersystems\Grid\Data;

use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

interface DataProviderInterface {

	/**
	 * [getData description]
	 *
	 * @param  Grid       $grid       [description]
	 * @param  Parameters $parameters [description]
	 * @return [type]                 [description]
	 */
	public function getData(Grid $grid, Parameters $parameters);

}