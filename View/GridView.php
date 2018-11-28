<?php

namespace Towersystems\Grid\View;

use Towersystems\Grid\Definition\Grid;
use Towersystems\Grid\Parameters;
use Webmozart\Assert\Assert;

class GridView implements GridViewInterface {

	/** @var [type] [description] */
	private $data;

	/** @var [type] [description] */
	private $definition;

	/** @var [type] [description] */
	private $parameters;

	/**
	 * @param mixed $data
	 * @param Grid $definition
	 */
	public function __construct($data, Grid $definition, Parameters $parameters) {
		$this->data = $data;
		$this->definition = $definition;
		$this->parameters = $parameters;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDefinition() {
		return $this->definition;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getParameters() {
		return $this->parameters;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getSortingOrder($fieldName) {

		$this->assertFieldIsSortable($fieldName);

		$currentSorting = $this->getCurrentlySortedBy();

		if (array_key_exists($fieldName, $currentSorting)) {
			return $currentSorting[$fieldName];
		}

		$definedSorting = $this->definition->getSorting();

		echo "<pre>";
		print_r($this->definition);die;
		return reset($definedSorting) ?: null;
	}

	/**
	 * {@inheritdoc}
	 */
	public function isSortedBy($fieldName) {
		$this->assertFieldIsSortable($fieldName);

		if ($this->parameters->has('sorting')) {
			return array_key_exists($fieldName, $this->parameters->get('sorting'));
		}

		$sortingDefinition = $this->getDefinition()->getSorting();
		$sortedFields = array_keys($sortingDefinition);

		return $fieldName === array_shift($sortedFields);
	}

	/**
	 * @return array|mixed
	 */
	private function getCurrentlySortedBy() {
		return $this->parameters->has('sorting')
		? array_merge($this->definition->getSorting(), $this->parameters->get('sorting'))
		: $this->definition->getSorting()
		;
	}

	/**
	 * @param string $fieldName
	 *
	 * @throws \InvalidArgumentException
	 */
	private function assertFieldIsSortable($fieldName) {
		Assert::true($this->definition->hasField($fieldName), sprintf('Field "%s" does not exist.', $fieldName));
		Assert::true(
			$this->definition->getField($fieldName)->isSortable(),
			sprintf('Field "%s" is not sortable.', $fieldName)
		);
	}
}