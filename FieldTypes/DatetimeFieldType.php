<?php

namespace Towersystems\Grid\FieldTypes;

use Towersystems\Grid\DataExtractor\DataExtractorInterface;
use Towersystems\Grid\Definition\Field;
use Webmozart\Assert\Assert;

/**
 *
 */
class DatetimeFieldType implements FieldTypeInterface {

	/** @var [type] [description] */
	private $options = [
		'format' => 'Y:m:d H:i:s',
	];

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
		$options = array_merge($this->options, $options);

		if (null === $value) {
			return null;
		}

		Assert::isInstanceOf($value, \DateTime::class);

		return $value->format($options['format']);
	}

}