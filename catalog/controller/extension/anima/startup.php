<?php
namespace Opencart\Catalog\Controller\Extension\Anima;

/**
 * Class Startup
 * 
 * Theme initialization and event registration for Anima theme
 */
class Startup extends \Opencart\System\Engine\Controller {
    /**
     * Initialize theme on startup
     * 
     * @return void
     */
    public function index(): void {
        // Check if Anima theme is active
        if ($this->config->get('config_theme') == 'anima') {
            // Load theme language
            $this->load->language('extension/anima/theme');
            
            // Register events for theme modifications
            $this->registerEvents();
            
            // Add global CSS and JS
            $this->addThemeAssets();
        }
    }
    
    /**
     * Register theme events
     * 
     * @return void
     */
    private function registerEvents(): void {
        // Events are registered via admin panel during installation
        // This method is for runtime event registration if needed
    }
    
    /**
     * Add theme CSS and JavaScript assets
     * 
     * @return void
     */
    private function addThemeAssets(): void {
        // Add CSS files
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/globals.css', 'stylesheet', 0);
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/styleguide.css', 'stylesheet', 1);
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/desktop-1.css', 'stylesheet', 2);
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/custom.css', 'stylesheet', 3);
        
        // Add JS files
        $this->document->addScript('catalog/view/theme/anima/javascript/common.js', 'footer');
    }
}
