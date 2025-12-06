<?php
namespace Opencart\Catalog\Controller\Extension\Anima\Startup;

/**
 * Class Startup
 * 
 * This class handles theme initialization on catalog startup
 */
class Startup extends \Opencart\System\Engine\Controller {
	/**
	 * Index method - called on catalog startup
	 * Sets up the theme path
	 */
	public function index(): void {
		// Register the theme directory
		if ($this->config->get('config_theme') == 'anima') {
			// Set theme directory
			$this->config->set('template_directory', 'extension/anima/catalog/view/template/');
		}
	}
}
