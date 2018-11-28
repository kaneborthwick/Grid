<?php

namespace Towersystems\Grid\Filter;

use Towersystems\Grid\Data\DataSourceInterface;
use Towersystems\Grid\Filtering\FilterInterface;

class DateFilter implements FilterInterface {

	const NAME = 'date';

	/**
	 * {@inheritdoc}
	 */
	public function apply(DataSourceInterface $dataSource, $name, $data, array $options) {
		$expressionBuilder = $dataSource->getExpressionBuilder();

		$field = isset($options['field']) ? $options['field'] : $name;

		$from = $this->getDateTime($data['from']);
		if (null !== $from) {
			$expressionBuilder->greaterThanOrEqual($field, $from);
		}

		$to = $this->getDateTime($data['to']);
		if (null !== $to) {
			$expressionBuilder->lessThan($field, $to);
		}
	}

	/**
	 * @param string[] $data
	 *
	 * @return null|string
	 */
	private function getDateTime(array $data) {
		if (empty($data['date'])) {
			return null;
		}

		if (empty($data['time'])) {
			return $data['date'];
		}

		return $data['date'] . ' ' . $data['time'];
	}
}