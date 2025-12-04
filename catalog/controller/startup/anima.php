<?php
namespace Opencart\Catalog\Controller\Startup;

/**
 * Class Anima
 * 
 * Startup controller for Anima theme initialization
 * OpenCart 4.0.1.3 Compatible
 */
class Anima extends \Opencart\System\Engine\Controller {
    /**
     * Initialize theme settings and configurations
     */
    public function index(): void {
        // Set RTL direction for Arabic language
        if ($this->config->get('theme_anima_rtl') || $this->language->get('direction') == 'rtl') {
            $this->config->set('theme_direction', 'rtl');
        }
        
        // Register theme stylesheet
        $this->document->addStyle('catalog/view/stylesheet/anima.css');
        
        // Add viewport meta tag for responsive design
        $this->document->addMeta('viewport', 'width=device-width, initial-scale=1.0, maximum-scale=1.0');
        
        // Set theme-specific configurations
        $this->config->set('theme_anima_product_limit', 12);
        $this->config->set('theme_anima_product_description_length', 200);
        
        // Load custom fonts
        $this->document->addStyle('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700');
    }
}
