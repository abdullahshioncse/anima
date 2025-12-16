<?php
namespace Opencart\Catalog\Controller\Extension\Anima;

/**
 * Class Event
 * 
 * Event handlers for modifying core OpenCart functionality
 */
class Event extends \Opencart\System\Engine\Controller {
    /**
     * Modify product page before render
     * 
     * @param string $route
     * @param array<string, mixed> $args
     * @param mixed $output
     * @return void
     */
    public function productBefore(string &$route, array &$args, mixed &$output): void {
        $this->load->model('extension/anima/theme');
        
        // Add additional product data for Anima theme
        if (isset($args['product_id'])) {
            $product_id = (int)$args['product_id'];
            $args['labels'] = $this->model_extension_anima_theme->getProductLabels($product_id);
        }
    }
    
    /**
     * Modify category page before render
     * 
     * @param string $route
     * @param array<string, mixed> $args
     * @param mixed $output
     * @return void
     */
    public function categoryBefore(string &$route, array &$args, mixed &$output): void {
        // Add additional category styling data
    }
    
    /**
     * Modify header before render
     * 
     * @param string $route
     * @param array<string, mixed> $args
     * @param mixed $output
     * @return void
     */
    public function headerBefore(string &$route, array &$args, mixed &$output): void {
        $this->load->controller('extension/anima/theme');
        
        // Merge Anima header data
        $header_data = $this->controller_extension_anima_theme->getHeaderData();
        $args = array_merge($args, $header_data);
    }
    
    /**
     * Modify footer before render
     * 
     * @param string $route
     * @param array<string, mixed> $args
     * @param mixed $output
     * @return void
     */
    public function footerBefore(string &$route, array &$args, mixed &$output): void {
        $this->load->controller('extension/anima/theme');
        
        // Merge Anima footer data
        $footer_data = $this->controller_extension_anima_theme->getFooterData();
        $args = array_merge($args, $footer_data);
    }
    
    /**
     * Add theme assets to every page
     * 
     * @param string $route
     * @param array<string, mixed> $args
     * @return void
     */
    public function addAssets(string &$route, array &$args): void {
        if ($this->config->get('config_theme') == 'anima') {
            // Add responsive CSS based on device
            $this->document->addStyle('catalog/view/theme/anima/stylesheet/custom.css');
        }
    }
}
