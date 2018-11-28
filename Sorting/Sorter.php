<?php

namespace Towersystems\Grid\Sorting;

use Towersystems\Grid\Data\DataSourceInterface;
use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;

/**
 *
 */
class Sorter implements SorterInterface {

	/**
	 * {@inheritdoc}
	 */
	public function sort(DataSourceInterface $dataSource, Grid $grid, Parameters $parameters): void{

		$expressionBuilder = $dataSource->getExpressionBuilder();
		$sorting = $parameters->get('sorting', $grid->getSorting());

		foreach ($sorting as $field => $order) {

			$gridField = $grid->getField($field);
			$property = $gridField->getSortable();

			$expressionBuilder->addOrderBy($property, $order);
		}

	}

}