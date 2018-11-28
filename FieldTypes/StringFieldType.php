<?php

namespace Towersystems\Grid\FieldTypes;

use Towersystems\Grid\DataExtractor\DataExtractorInterface;
use Towersystems\Grid\Definition\Field;

/**
 *
 */
class StringFieldType implements FieldTypeInterface {

	/**
	 * @var DataExtractorInterface
	 */
	private $dataExtractor;

	/**
	 * @param DataExtractorInterface $dataExtractor
	 */
	public function __construct(DataExtractorInterface $dataExtractor) {
		$this->dataExtractor = $dataExtractor;
	}

	/**
	 * {@inheritdoc}
	 */
	public function render(Field $field, $data, array $options) {
		$value = $this->dataExtractor->get($field, $data);

		return is_string($value) ? htmlspecialchars($value) : $value;
	}

}