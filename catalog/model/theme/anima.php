<?php
namespace Opencart\Catalog\Model\Theme;

/**
 * Class Anima
 * 
 * OpenCart 4.1.0.3 Compatible Theme Model
 * 
 * @package Opencart\Catalog\Model\Theme
 */
class Anima extends \Opencart\System\Engine\Model {
    
    /**
     * Get theme settings from database
     * 
     * @param string $key
     * @return mixed
     */
    public function getSetting(string $key) {
        $query = $this->db->query("SELECT value FROM " . DB_PREFIX . "setting WHERE `key` = '" . $this->db->escape($key) . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");
        
        if ($query->num_rows) {
            return json_decode($query->row['value'], true);
        }
        
        return null;
    }
    
    /**
     * Get theme configuration
     * 
     * @return array
     */
    public function getThemeConfig(): array {
        $config = [];
        
        $config['theme_name'] = 'Anima';
        $config['theme_version'] = '1.0.0';
        $config['rtl_support'] = true;
        $config['responsive'] = true;
        
        // Get custom settings from database
        $settings = $this->getSetting('theme_anima');
        
        if ($settings) {
            $config = array_merge($config, $settings);
        }
        
        return $config;
    }
    
    /**
     * Get banner by banner_id
     * 
     * @param int $banner_id
     * @return array
     */
    public function getBanner(int $banner_id): array {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "banner b LEFT JOIN " . DB_PREFIX . "banner_image bi ON (b.banner_id = bi.banner_id) LEFT JOIN " . DB_PREFIX . "banner_image_description bid ON (bi.banner_image_id = bid.banner_image_id) WHERE b.banner_id = '" . (int)$banner_id . "' AND b.status = '1' AND bid.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY bi.sort_order ASC");
        
        return $query->rows;
    }
    
    /**
     * Get featured products
     * 
     * @param int $limit
     * @return array
     */
    public function getFeaturedProducts(int $limit = 8): array {
        $this->load->model('catalog/product');
        
        $products = [];
        
        // Get featured product IDs from settings
        $featured_ids = $this->config->get('config_product_featured');
        
        if (!empty($featured_ids)) {
            $product_ids = array_slice($featured_ids, 0, $limit);
            
            foreach ($product_ids as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                
                if ($product_info) {
                    $products[] = $product_info;
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
        
        $data = [
            'sort' => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ];
        
        return $this->model_catalog_product->getProducts($data);
    }
    
    /**
     * Get special offers
     * 
     * @param int $limit
     * @return array
     */
    public function getSpecialProducts(int $limit = 8): array {
        $this->load->model('catalog/product');
        
        $data = [
            'sort' => 'ps.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ];
        
        return $this->model_catalog_product->getProducts($data);
    }
    
    /**
     * Get popular/best-selling products
     * 
     * @param int $limit
     * @return array
     */
    public function getPopularProducts(int $limit = 8): array {
        $this->load->model('catalog/product');
        
        $data = [
            'sort' => 'p.viewed',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ];
        
        return $this->model_catalog_product->getProducts($data);
    }
    
    /**
     * Log theme event
     * 
     * @param string $event_name
     * @param array $data
     * @return void
     */
    public function logEvent(string $event_name, array $data = []): void {
        $this->db->query("INSERT INTO " . DB_PREFIX . "event_log SET 
            `code` = 'theme_anima',
            `keyword` = '" . $this->db->escape($event_name) . "',
            `value` = '" . $this->db->escape(json_encode($data)) . "',
            `date_added` = NOW()
        ");
    }
}
