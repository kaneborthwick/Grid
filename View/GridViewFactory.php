<?php

namespace Towersystems\Grid\View;

use Towersystems\Grid\Data\DataProviderInterface;
use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

class GridViewFactory implements GridViewFactoryInterface {

	/**
	 * @var DataProviderInterface
	 */
	private $dataProvider;

	/**
	 * @param DataProviderInterface $dataProvider
	 */
	public function __construct(DataProviderInterface $dataProvider) {
		$this->dataProvider = $dataProvider;
	}

	/**
	 * {@inheritdoc}
	 */
	public function create(Grid $grid, Parameters $parameters): GridViewInterface {
		return new GridView($this->dataProvider->getData($grid, $parameters), $grid, $parameters);
	}

}