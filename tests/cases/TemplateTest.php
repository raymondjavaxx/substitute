<?php

use \substitute\Template;

/**
 * Test case for \substitute\Template
 */
class TemplateTest extends \PHPUnit_Framework_TestCase {

	public function testRender() {
		$template = new Template('{a} {b}!');
		$result = $template->render(array('a' => 'Hello', 'b' => 'World'));
		$this->assertEquals('Hello World!', $result);
	}

	public function testRenderShouldReplaceAllInstances() {
		$template = new Template('{a} {a} {b}!');
		$result = $template->render(array('a' => 'Hello', 'b' => 'World'));
		$this->assertEquals('Hello Hello World!', $result);
	}

	public function testRenderShouldNotBeRecursive() {
		$template = new Template('{a} {b}');
		$result = $template->render(array('a' => 'Hello {b}', 'b' => 'World'));
		$this->assertEquals('Hello {b} World', $result);
	}

	public function testRenderShouldKeepUnsetVariables() {
		$template = new Template('{a} {b} {c}');
		$result = $template->render(array('a' => 'Hello', 'b' => 'World'));
		$this->assertEquals('Hello World {c}', $result);
	}
}
