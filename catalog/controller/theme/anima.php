<?php
namespace Opencart\Catalog\Controller\Theme;

/**
 * Class Anima
 * 
 * OpenCart 4.1.0.3 Compatible Theme Controller
 * 
 * @package Opencart\Catalog\Controller\Theme
 */
class Anima extends \Opencart\System\Engine\Controller {
    
    /**
     * Index method - Main theme loader
     * 
     * @return string
     */
    public function index(): string {
        $this->load->language('theme/anima');
        
        // Load required models
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        
        // Prepare data for templates
        $data = $this->prepareData();
        
        // Return the rendered template
        return $this->load->view('theme/anima/template/common/home', $data);
    }
    
    /**
     * Prepare common data for all pages
     * 
     * @return array
     */
    private function prepareData(): array {
        $data = [];
        
        // Store information
        $data['name'] = $this->config->get('config_name');
        $data['telephone'] = $this->config->get('config_telephone');
        $data['email'] = $this->config->get('config_email');
        
        // Logo
        if ($this->config->get('config_logo')) {
            $data['logo'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
        } else {
            $data['logo'] = '';
        }
        
        // Base URL
        $data['base'] = $this->config->get('config_url');
        $data['home'] = $this->url->link('common/home');
        
        // Direction (RTL/LTR)
        $data['direction'] = $this->language->get('direction');
        $data['lang'] = $this->language->get('code');
        
        // Cart
        $data['cart'] = $this->url->link('checkout/cart');
        $data['cart_total'] = $this->cart->countProducts();
        
        // Wishlist
        if ($this->customer->isLogged()) {
            $this->load->model('account/wishlist');
            $data['wishlist'] = $this->url->link('account/wishlist');
            $data['wishlist_total'] = $this->model_account_wishlist->getTotalWishlist();
        } else {
            $data['wishlist'] = $this->url->link('account/wishlist');
            $data['wishlist_total'] = isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0;
        }
        
        // Account
        if ($this->customer->isLogged()) {
            $data['account'] = $this->url->link('account/account');
        } else {
            $data['account'] = $this->url->link('account/login');
        }
        
        // Search
        $data['search'] = $this->url->link('product/search');
        
        // Categories for menu
        $data['categories'] = $this->getCategories();
        
        // Meta tags
        if (isset($this->request->get['route'])) {
            $route = $this->request->get['route'];
        } else {
            $route = 'common/home';
        }
        
        $data['title'] = $this->document->getTitle();
        $data['description'] = $this->document->getDescription();
        $data['keywords'] = $this->document->getKeywords();
        
        // Styles and Scripts
        $data['styles'] = $this->document->getStyles();
        $data['scripts'] = $this->document->getScripts();
        $data['links'] = $this->document->getLinks();
        $data['analytics'] = $this->document->getAnalytics();
        
        // Footer links
        $data['contact'] = $this->url->link('information/contact');
        $data['privacy_policy'] = $this->url->link('information/information', 'information_id=3');
        $data['return_policy'] = $this->url->link('information/information', 'information_id=6');
        $data['about_us'] = $this->url->link('information/information', 'information_id=4');
        $data['terms'] = $this->url->link('information/information', 'information_id=5');
        $data['help'] = $this->url->link('information/contact');
        
        // Newsletter action
        $data['newsletter_action'] = $this->url->link('account/newsletter');
        
        // Powered by
        $data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y'));
        
        return $data;
    }
    
    /**
     * Get categories for navigation menu
     * 
     * @return array
     */
    private function getCategories(): array {
        $this->load->model('catalog/category');
        
        $categories = [];
        
        $results = $this->model_catalog_category->getCategories(0);
        
        foreach ($results as $result) {
            $children = [];
            
            $children_results = $this->model_catalog_category->getCategories($result['category_id']);
            
            foreach ($children_results as $child) {
                $children[] = [
                    'category_id' => $child['category_id'],
                    'name' => $child['name'],
                    'href' => $this->url->link('product/category', 'path=' . $result['category_id'] . '_' . $child['category_id'])
                ];
            }
            
            $categories[] = [
                'category_id' => $result['category_id'],
                'name' => $result['name'],
                'children' => $children,
                'href' => $this->url->link('product/category', 'path=' . $result['category_id'])
            ];
        }
        
        return $categories;
    }
    
    /**
     * Get featured products for homepage
     * 
     * @param int $limit
     * @return array
     */
    public function getFeaturedProducts(int $limit = 8): array {
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        
        $products = [];
        
        $featured = $this->config->get('config_product_featured');
        
        if (!empty($featured)) {
            $product_ids = array_slice($featured, 0, $limit);
            
            foreach ($product_ids as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                
                if ($product_info) {
                    $products[] = $this->formatProduct($product_info);
                }
            }
        }
        
        return $products;
    }
    
    /**
     * Get latest products
     * 
     * @param int $limit
     * @return array
     */
    public function getLatestProducts(int $limit = 8): array {
        $this->load->model('catalog/product');
        
        $products = [];
        
        $results = $this->model_catalog_product->getProducts(['sort' => 'p.date_added', 'order' => 'DESC', 'start' => 0, 'limit' => $limit]);
        
        foreach ($results as $result) {
            $products[] = $this->formatProduct($result);
        }
        
        return $products;
    }
    
    /**
     * Format product data for template
     * 
     * @param array $product_info
     * @return array
     */
    private function formatProduct(array $product_info): array {
        $this->load->model('tool/image');
        
        if ($product_info['image']) {
            $image = $this->model_tool_image->resize($product_info['image'], 300, 300);
        } else {
            $image = $this->model_tool_image->resize('placeholder.png', 300, 300);
        }
        
        if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
            $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        } else {
            $price = false;
        }
        
        if ((float)$product_info['special']) {
            $special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        } else {
            $special = false;
        }
        
        return [
            'product_id' => $product_info['product_id'],
            'thumb' => $image,
            'name' => $product_info['name'],
            'model' => $product_info['model'],
            'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, 200) . '..',
            'price' => $price,
            'special' => $special,
            'new' => strtotime($product_info['date_added']) > strtotime('-30 days'),
            'rating' => $product_info['rating'],
            'href' => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
        ];
    }
}
