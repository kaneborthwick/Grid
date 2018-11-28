<?php

namespace Towersystems\Grid\Renderer;

use Towersystems\Grid\Definition\Field;
use Towersystems\Grid\Definition\Filter;
use Towersystems\Grid\Renderer\GridRendererInterface;
use Towersystems\Grid\View\GridViewInterface;

interface GridRendererInterface {

	/**
	 * [render description]
	 *
	 * @param  GridViewInterface $gridView [description]
	 * @param  [type]            $template [description]
	 * @return [type]                      [description]
	 */
	public function render(GridViewInterface $gridView, $template = null);

	/**
	 * [renderField description]
	 *
	 * @param  GridViewInterface $gridView [description]
	 * @param  Field             $field    [description]
	 * @param  [type]            $data     [description]
	 * @return [type]                      [description]
	 */
	public function renderField(GridViewInterface $gridView, Field $field, $data);

	/**
	 * [renderFilter description]
	 *
	 * @param  GridViewInterface $gridView [description]
	 * @param  Filter            $filter   [description]
	 * @return [type]                      [description]
	 */
	public function renderFilter(GridViewInterface $gridView, Filter $filter);

}