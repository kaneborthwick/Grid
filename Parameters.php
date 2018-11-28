<?php

namespace Towersystems\Grid;

class Parameters {

	/**
	 * @var array
	 */
	private $parameters;

	/**
	 * @param array $parameters
	 */
	public function __construct(array $parameters = []) {
		$this->parameters = $parameters;
	}

	/**
	 * @return array
	 */
	public function all() {
		return $this->parameters;
	}

	/**
	 * @return array
	 */
	public function keys() {
		return array_keys($this->parameters);
	}

	/**
	 * @param string $key
	 * @param mixed $default
	 *
	 * @return mixed
	 */
	public function get($key, $default = null) {
		return $this->has($key) ? $this->parameters[$key] : $default;
	}

	/**
	 * @param string $key
	 *
	 * @return bool
	 */
	public function has($key) {
		return array_key_exists($key, $this->parameters);
	}

}