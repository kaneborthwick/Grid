<?php

namespace Towersystems\Grid\Definition;

interface DefinitionConverterInterface {

	/**
	 * [convert description]
	 *
	 * @param  [type] $code          [description]
	 * @param  array  $configuration [description]
	 * @return [type]                [description]
	 */
	public function convert($code, array $configuration = []): Grid;

}
