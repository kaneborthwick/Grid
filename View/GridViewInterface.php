<?php

namespace Towersystems\Grid\View;

interface GridViewInterface {

	/**
	 * [getData description]
	 *
	 * @return [type] [description]
	 */
	public function getData();

	/**
	 * [getDefinition description]
	 *
	 * @return [type] [description]
	 */
	public function getDefinition();

	/**
	 * [getParameters description]
	 *
	 * @return [type] [description]
	 */
	public function getParameters();

	/**
	 * [getSortingOrder description]
	 *
	 * @param  [type] $fieldName [description]
	 * @return [type]            [description]
	 */
	public function getSortingOrder($fieldName);

}