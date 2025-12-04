<?php
namespace Opencart\Catalog\Controller\Common;

/**
 * Anima Theme Home Controller Example
 * 
 * This is an example of how to extend OpenCart's home controller
 * to work with the Anima theme templates.
 * 
 * To use this, you would need to either:
 * 1. Modify the existing OpenCart home controller
 * 2. Use OpenCart's event system to inject this data
 * 3. Create a module to handle product display
 */
class AnimaHome extends \Opencart\System\Engine\Controller {
    
    /**
     * Get recommended products for "You May Like" section
     */
    private function getRecommendedProducts($limit = 4) {
        $this->load->model('catalog/product');
        
        $products = [];
        
        // Get featured products or bestsellers
        $results = $this->model_catalog_product->getProducts([
            'sort'  => 'p.viewed',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ]);
        
        foreach ($results as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 300, 300);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', 300, 300);
            }
            
            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price = false;
            }
            
            if ((float)$result['special']) {
                $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $special = false;
            }
            
            $products[] = [
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'name'        => $result['name'],
                'model'       => $result['model'],
                'price'       => $price,
                'special'     => $special,
                'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
            ];
        }
        
        return $products;
    }
    
    /**
     * Get latest/new arrival products
     */
    private function getLatestProducts($limit = 4) {
        $this->load->model('catalog/product');
        
        $products = [];
        
        // Get latest products
        $results = $this->model_catalog_product->getProducts([
            'sort'  => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ]);
        
        foreach ($results as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 300, 300);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', 300, 300);
            }
            
            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price = false;
            }
            
            if ((float)$result['special']) {
                $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $special = false;
            }
            
            $products[] = [
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'name'        => $result['name'],
                'model'       => $result['model'],
                'price'       => $price,
                'special'     => $special,
                'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
            ];
        }
        
        return $products;
    }
    
    /**
     * Example usage in home controller
     */
    public function getThemeData() {
        $data = [];
        
        // Get products for "You May Like" section
        $data['products'] = $this->getRecommendedProducts(4);
        
        // Get products for "New Arrivals" section
        $data['latest_products'] = $this->getLatestProducts(4);
        
        return $data;
    }
}
