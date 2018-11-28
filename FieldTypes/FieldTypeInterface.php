<?php

namespace Towersystems\Grid\FieldTypes;

use Towersystems\Grid\Definition\Field;

interface FieldTypeInterface {

	/**
	 * [render description]
	 *
	 * @param  Field  $field   [description]
	 * @param  [type] $data    [description]
	 * @param  array  $options [description]
	 * @return [type]          [description]
	 */
	public function render(Field $field, $data, array $options);

}