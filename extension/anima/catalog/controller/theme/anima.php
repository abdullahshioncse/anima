<?php
namespace Opencart\Catalog\Controller\Extension\Anima\Theme;

/**
 * Class Anima
 *
 * Catalog controller for Anima theme
 *
 * @package Opencart\Catalog\Controller\Extension\Anima\Theme
 */
class Anima extends \Opencart\System\Engine\Controller {
	/**
	 * Index method - theme initialization
	 *
	 * @return void
	 */
	public function index(): void {
		$this->response->setOutput('');
	}
}
