<?php
/**
 * Substitute
 *
 * Copyright (c) 2012 Ramon Torres
 *
 * Licensed under the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) 2012 Ramon Torres
 * @license The MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace substitute;

/**
 * Substitute template
 *
 * @package substitute
 */
class Template {

	/**
	 * Template body
	 *
	 * @var string
	 */
	protected $body = '';

	/**
	 * Constructor
	 *
	 * @param string $body template body
	 */
	public function __construct($body) {
		$this->body = $body;
	}

	/**
	 * Renders the template using provided vars
	 *
	 * @param array $vars key-value pairs of variables and their values
	 */
	public function render($vars = array()) {
		$delimiter = uniqid();

		$result = $this->body;

		$keys = array_keys($vars);

		foreach ($keys as $key) {
			$result = str_replace("{{$key}}", "{$delimiter}.{$key}.{$delimiter}", $result);
		}

		$search  = array_map(function ($name) use ($delimiter) { return "{$delimiter}.{$name}.{$delimiter}"; }, $keys);
		$replace = array_values($vars);

		return str_replace($search, $replace, $result);
	}
}
