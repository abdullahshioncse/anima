<?php
namespace Opencart\Catalog\Controller\Extension\OcThemeAnima\Startup;
class ThemeAnima extends \Opencart\System\Engine\Controller {
	public function index(): void {
		if ($this->config->get('config_theme') == 'theme_anima' && $this->config->get('theme_theme_anima_status')) {
			// Add event via code instead of DB
			// Could also just set view/common/header/before
			$this->event->register('view/*/before', new \Opencart\System\Engine\Action('extension/oc_theme_anima/startup/theme_anima.event'));
		}
	}

	public function event(string &$route, array &$args, mixed &$output): void {
		$override = ['common/header','common/footer','common/home','product/product','product/category'];

		if (in_array($route, $override)) {
			$route = 'extension/oc_theme_anima/' . $route;
		}
	}
}
