<?php

namespace Towersystems\Grid\Data;

use Towersystems\GRid\Parameters;

interface DriverInterface {

	/**
	 * [getDataSource description]
	 *
	 * @param  array      $configuration [description]
	 * @param  Parameters $parameters    [description]
	 * @return [type]                    [description]
	 */
	public function getDataSource(array $configuration, Parameters $parameters);

}