<?php

namespace Towersystems\Grid\Provider;

use Towersystems\Grid\Definition\Grid;

interface GridProviderInterface {

	/**
	 * [get description]
	 *
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function get($code): Grid;
}