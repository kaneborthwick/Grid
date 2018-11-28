<?php

namespace Towersystems\Grid\Filtering;

use Towersystems\Grid\Data\DataSourceInterface;

interface FilterInterface {

	/**
	 * [apply description]
	 * @param  DataSourceInterface $dataSource [description]
	 * @param  [type]              $name       [description]
	 * @param  [type]              $data       [description]
	 * @param  array               $options    [description]
	 * @return [type]                          [description]
	 */
	public function apply(DataSourceInterface $dataSource, $name, $data, array $options);

}