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
class Template
{
	/**
	 * Template body
	 *
	 * @var string
	 */
	protected $body = '';

	/**
	 * Constructor
	 *
	 * @param null|string $body template body
	 */
	public function __construct($body = null)
	{
		if (!is_null($body)) {
			$this->setBody($body);
		}
	}
	
	public function setBody($body)
	{
		$this->body = (string) $body;
	}

	/**
	 * Renders the template using provided vars
	 *
	 * @param array $vars key-value pairs of variables and their values
	 * @return string
	 */
	public function render($vars = array())
	{
		$keys 	= array_keys($vars);
		$values	= array_values($vars);

		$keys = array_map(function ($key) {
			return '{' . $key . '}';
		}, $keys);

		return strtr($this->body, array_combine($keys, $values));
	}
}
