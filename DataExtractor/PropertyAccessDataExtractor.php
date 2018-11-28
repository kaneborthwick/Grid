<?php

namespace Towersystems\Grid\DataExtractor;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Towersystems\Grid\Definition\Field;

class PropertyAccessDataExtractor implements DataExtractorInterface {

	/**
	 * @var PropertyAccessorInterface
	 */
	private $propertyAccessor;

	/**
	 * [__construct description]
	 */
	public function __construct() {
		$this->propertyAccessor = PropertyAccess::createPropertyAccessor();
	}

	/**
	 * {@inheritdoc}
	 */
	public function get(Field $field, $data) {
		return $this->propertyAccessor->getValue($data, $field->getPath());
	}

}