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
		$keys = array_keys($vars);
		$vals = array_values($vars);

		$keys = array_map(function ($k) {
			return '{' . $k . '}';
		}, $keys);

		return strtr($this->body, array_combine($keys, $vals));
	}
}
