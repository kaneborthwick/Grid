<?php

namespace Towersystems\Grid\Provider;

use Towersystems\Grid\Definition\DefinitionConverterInterface;
use Towersystems\Grid\Definition\Grid;

/**
 *
 */
class GridProvider implements GridProviderInterface {

	/** @var array [description] */
	private $grids = [];

	/**
	 * [__construct description]
	 *
	 */
	public function __construct(DefinitionConverterInterface $converter, array $gridConfigurations = []) {
		foreach ($gridConfigurations as $code => $gridConfiguration) {
			$this->grids[$code] = $converter->convert($code, $gridConfiguration);
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function get($code): Grid {

		if (!array_key_exists($code, $this->grids)) {
			throw new \Exception($code);
		}

		return clone $this->grids[$code];
	}

}