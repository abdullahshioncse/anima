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
	 * Event method - handles view template override
	 * This is called before any view is loaded via the event system
	 *
	 * @param string $route The route being rendered
	 * @param array $args The arguments being passed to the view
	 * @return void
	 */
	public function event(string &$route, array &$args): void {
		// Check if we're in the catalog (not admin)
		if (substr($route, 0, 7) != 'catalog') {
			return;
		}
		
		// Remove 'catalog/view/' prefix from route
		$route_parts = explode('/', $route);
		
		// Build the potential theme template path
		// Route comes as catalog/view/common/header
		// We need it as extension/anima/catalog/view/template/common/header
		
		if (count($route_parts) >= 3 && $route_parts[0] == 'catalog' && $route_parts[1] == 'view') {
			// Remove catalog/view from the beginning
			array_shift($route_parts); // Remove 'catalog'
			array_shift($route_parts); // Remove 'view'
			
			$template_path = implode('/', $route_parts);
			
			// Check if template exists in our theme
			$theme_template = 'extension/anima/catalog/view/template/' . $template_path . '.twig';
			
			if (is_file(DIR_EXTENSION . 'anima/catalog/view/template/' . $template_path . '.twig')) {
				// Override with our theme template
				$args[0] = $theme_template;
			}
		}
	}
}
