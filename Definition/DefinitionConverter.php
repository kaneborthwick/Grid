<?php

namespace Towersystems\Grid\Definition;

class DefinitionConverter implements DefinitionConverterInterface {

	/**
	 * {@inheritdoc}
	 */
	public function convert($code, array $configuration = []): Grid{

		$grid = Grid::fromCodeAndDriverConfiguration(
			$code,
			$configuration['driver']['name'],
			$configuration['driver']['options']
		);

		foreach ($configuration['fields'] as $name => $fieldConfiguration) {
			$grid->addField($this->convertField($name, $fieldConfiguration));
		}

		if (array_key_exists('sorting', $configuration)) {
			$grid->setSorting($configuration['sorting']);
		}

		if (array_key_exists('filters', $configuration)) {
			foreach ($configuration['filters'] as $name => $filterConfiguration) {
				$grid->addFilter($this->convertFilter($name, $filterConfiguration));
			}
		}

		return $grid;

	}

	/**
	 * @param string $name
	 * @param array $configuration
	 *
	 * @return Field
	 */
	private function convertField($name, array $configuration) {
		$field = Field::fromNameAndType($name, $configuration['type']);

		if (array_key_exists('path', $configuration)) {
			$field->setPath($configuration['path']);
		}
		if (array_key_exists('label', $configuration)) {
			$field->setLabel($configuration['label']);
		}
		if (array_key_exists('enabled', $configuration)) {
			$field->setEnabled($configuration['enabled']);
		}
		if (array_key_exists('sortable', $configuration)) {
			$field->setSortable($configuration['sortable']);
		}
		if (array_key_exists('position', $configuration)) {
			$field->setPosition($configuration['position']);
		}
		if (array_key_exists('options', $configuration)) {
			$field->setOptions($configuration['options']);
		}

		return $field;
	}

	/**
	 * @param string $name
	 * @param array $configuration
	 *
	 * @return Filter
	 */
	private function convertFilter($name, array $configuration) {
		$filter = Filter::fromNameAndType($name, $configuration['type']);

		if (array_key_exists('label', $configuration)) {
			$filter->setLabel($configuration['label']);
		}
		if (array_key_exists('template', $configuration)) {
			$filter->setTemplate($configuration['template']);
		}
		if (array_key_exists('enabled', $configuration)) {
			$filter->setEnabled($configuration['enabled']);
		}
		if (array_key_exists('position', $configuration)) {
			$filter->setPosition($configuration['position']);
		}
		if (array_key_exists('options', $configuration)) {
			$filter->setOptions($configuration['options']);
		}
		if (array_key_exists('form_options', $configuration)) {
			$filter->setFormOptions($configuration['form_options']);
		}
		if (array_key_exists('default_value', $configuration)) {
			$filter->setCriteria($configuration['default_value']);
		}

		return $filter;
	}

}
