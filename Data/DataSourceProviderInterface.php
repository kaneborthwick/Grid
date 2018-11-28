<?php

namespace Towersystems\Grid\Data;

use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

interface DataSourceProviderInterface {

	/**
	 * [getDataSource description]
	 *
	 * @param  Grid       $grid       [description]
	 * @param  Parameters $parameters [description]
	 * @return DataSourceInterface                 [description]
	 */
	public function getDataSource(Grid $grid, Parameters $parameters): DataSourceInterface;
}