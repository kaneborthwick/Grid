<?php

namespace Towersystems\Grid\Data;

use Towersystems\Grid\Parameters;

interface DataSourceInterface {

	const CONDITION_AND = 'and';
	const CONDITION_OR = 'or';

	/**
	 * @param mixed $expression
	 * @param string $condition
	 *
	 * @return mixed
	 */
	public function restrict($expression, $condition = self::CONDITION_AND);

	/**
	 * @return ExpressionBuilderInterface
	 */
	public function getExpressionBuilder();

	/**
	 * @param Parameters $parameters
	 *
	 * @return mixed
	 */
	public function getData(Parameters $parameters);
}