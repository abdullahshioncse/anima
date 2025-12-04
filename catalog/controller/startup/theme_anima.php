<?php
namespace Opencart\Catalog\Controller\Startup;

class ThemeAnima extends \Opencart\System\Engine\Controller {
    public function index(): void {
        // Load theme assets
        if ($this->config->get('theme_anima_status')) {
            // Add CSS files
            $this->document->addStyle('catalog/view/stylesheet/globals.css');
            $this->document->addStyle('catalog/view/stylesheet/styleguide.css');
            
            // Add specific page CSS based on route
            $route = isset($this->request->get['route']) ? $this->request->get['route'] : 'common/home';
            
            // Map routes to CSS files
            $css_map = [
                'common/home' => 'catalog/view/stylesheet/desktop-1.css',
                'product/category' => 'catalog/view/stylesheet/desktop-2.css',
                'product/product' => 'catalog/view/stylesheet/desktop-2.css',
                'information/information' => 'catalog/view/stylesheet/desktop-4.css',
            ];
            
            if (isset($css_map[$route])) {
                $this->document->addStyle($css_map[$route]);
            }
            
            // Add mobile CSS for mobile devices
            if ($this->request->isMobile()) {
                $this->document->addStyle('catalog/view/stylesheet/iphone-13-u38-14-1.css');
            }
        }
    }
}
