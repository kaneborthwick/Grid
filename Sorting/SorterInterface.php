<?php

namespace Towersystems\Grid\Sorting;

use Towersystems\Grid\Data\DataSourceInterface;
use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

/**
 *
 */
interface SorterInterface {

	/**
	 * [sort description]
	 *
	 * @param  DataSourceInterface $dataSource [description]
	 * @param  Grid                $grid       [description]
	 * @param  Parameters          $parameters [description]
	 * @return [type]                          [description]
	 */
	public function sort(DataSourceInterface $dataSource, Grid $grid, Parameters $parameters): void;

}