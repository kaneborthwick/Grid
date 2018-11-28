<?php

namespace Towersystems\Grid\DataExtractor;

use Towersystems\Grid\Definition\Field;

interface DataExtractorInterface {

	/**
	 * @param Field $field
	 * @param mixed $data
	 *
	 * @return mixed
	 */
	public function get(Field $field, $data);

}