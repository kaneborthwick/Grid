<?php

namespace Towersystems\Grid\Data;

use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;
use Towersystems\Grid\Sorting\SorterInterface;

class DataProvider implements DataProviderInterface {

	/** @var [type] [description] */
	protected $dataSourceProvider;

	/** @var [type] [description] */
	protected $sorter;

	/**
	 * [__construct description]
	 *
	 * @param DataSourceProviderInterface $dataSourceProvider [description]
	 */
	public function __construct(
		DataSourceProviderInterface $dataSourceProvider,
		SorterInterface $sorter
	) {
		$this->dataSourceProvider = $dataSourceProvider;
		$this->sorter = $sorter;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getData(Grid $grid, Parameters $parameters) {
		$dataSource = $this->dataSourceProvider->getDataSource($grid, $parameters);
		$this->sorter->sort($dataSource, $grid, $parameters);

		return $dataSource->getData($parameters);
	}

}