<?php

namespace Towersystems\Grid\Definition;

class Grid {

	/**
	 * @var string
	 */
	private $code;

	/**
	 * @var string
	 */
	private $driver;

	/**
	 * @var array
	 */
	private $driverConfiguration;

	/**
	 * @var array
	 */
	private $sorting = [];

	/**
	 * @var array
	 */
	private $limits = [];

	/**
	 * @var array
	 */
	private $fields = [];

	/**
	 * @var array
	 */
	private $filters = [];

	/**
	 * @param string $code
	 * @param string $driver
	 * @param array $driverConfiguration
	 */
	private function __construct($code, $driver, array $driverConfiguration) {
		$this->code = $code;
		$this->driver = $driver;
		$this->driverConfiguration = $driverConfiguration;
	}

	/**
	 * @param string $code
	 * @param string $driver
	 * @param array $driverConfiguration
	 *
	 * @return self
	 */
	public static function fromCodeAndDriverConfiguration($code, $driver, array $driverConfiguration) {
		return new self($code, $driver, $driverConfiguration);
	}

	/**
	 * @return string
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getDriver() {
		return $this->driver;
	}

	/**
	 * @return array
	 */
	public function getDriverConfiguration() {
		return $this->driverConfiguration;
	}

	/**
	 * @param array $driverConfiguration
	 */
	public function setDriverConfiguration(array $driverConfiguration) {
		$this->driverConfiguration = $driverConfiguration;
	}

	/**
	 * @return array
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * @param array $sorting
	 */
	public function setSorting(array $sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * @return array
	 */
	public function getLimits() {
		return $this->limits;
	}

	/**
	 * @param array $limits
	 */
	public function setLimits(array $limits) {
		$this->limits = $limits;
	}

	/**
	 * @return array
	 */
	public function getFields() {
		return $this->fields;
	}

	/**
	 * @return array
	 */
	public function getEnabledFields() {
		return $this->getEnabledItems($this->getFields());
	}

	/**
	 * @param Field $field
	 */
	public function addField(Field $field) {
		$name = $field->getName();

		if ($this->hasField($name)) {
			throw new \InvalidArgumentException(sprintf('Field "%s" already exists.', $name));
		}

		$this->fields[$name] = $field;
	}

	/**
	 * @param string $name
	 */
	public function removeField($name) {
		if ($this->hasField($name)) {
			unset($this->fields[$name]);
		}
	}

	/**
	 * @param string $name
	 *
	 * @return Field
	 */
	public function getField($name) {
		if (!$this->hasField($name)) {
			throw new \InvalidArgumentException(sprintf('Field "%s" does not exist.', $name));
		}

		return $this->fields[$name];
	}

	/**
	 * @param Field $field
	 */
	public function setField(Field $field) {
		$name = $field->getName();

		$this->fields[$name] = $field;
	}

	/**
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasField($name) {
		return array_key_exists($name, $this->fields);
	}

	/**
	 * @param array $items
	 *
	 * @return array
	 */
	private function getEnabledItems(array $items) {
		$filteredItems = [];
		foreach ($items as $item) {
			if ($item->isEnabled()) {
				$filteredItems[] = $item;
			}
		}

		return $filteredItems;
	}

	/**
	 * @return array
	 */
	public function getFilters() {
		return $this->filters;
	}

	/**
	 * @return array
	 */
	public function getEnabledFilters() {
		return $this->getEnabledItems($this->getFilters());
	}

	/**
	 * @param Filter $filter
	 */
	public function addFilter(Filter $filter) {
		if ($this->hasFilter($name = $filter->getName())) {
			throw new \InvalidArgumentException(sprintf('Filter "%s" already exists.', $name));
		}

		$this->filters[$name] = $filter;
	}

	/**
	 * @param string $name
	 */
	public function removeFilter($name) {
		if ($this->hasFilter($name)) {
			unset($this->filters[$name]);
		}
	}

	/**
	 * @param string $name
	 *
	 * @return Filter
	 */
	public function getFilter($name) {
		if (!$this->hasFilter($name)) {
			throw new \InvalidArgumentException(sprintf('Filter "%s" does not exist.', $name));
		}

		return $this->filters[$name];
	}

	/**
	 * @param Filter $filter
	 */
	public function setFilter(Filter $filter) {
		$name = $filter->getName();

		$this->filters[$name] = $filter;
	}

	/**
	 * @param string $name
	 *
	 * @return bool
	 */
	public function hasFilter($name) {
		return array_key_exists($name, $this->filters);
	}

}