<?php
namespace Opencart\Catalog\Model\Extension\Anima;

/**
 * Class Theme
 * 
 * Model for database operations and data retrieval for Anima theme
 */
class Theme extends \Opencart\System\Engine\Model {
    /**
     * Get featured products
     * 
     * @param int $limit Maximum products to return
     * @return array<int, array<string, mixed>>
     */
    public function getFeaturedProducts(int $limit = 4): array {
        $this->load->model('catalog/product');
        
        $filter_data = [
            'sort'  => 'p.sort_order',
            'order' => 'ASC',
            'start' => 0,
            'limit' => $limit
        ];
        
        $results = $this->model_catalog_product->getProducts($filter_data);
        
        $products = [];
        foreach ($results as $result) {
            $products[] = $this->formatProduct($result);
        }
        
        return $products;
    }
    
    /**
     * Get latest products
     * 
     * @param int $limit Maximum products to return
     * @return array<int, array<string, mixed>>
     */
    public function getLatestProducts(int $limit = 4): array {
        $this->load->model('catalog/product');
        
        $filter_data = [
            'sort'  => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ];
        
        $results = $this->model_catalog_product->getProducts($filter_data);
        
        $products = [];
        foreach ($results as $result) {
            $products[] = $this->formatProduct($result);
        }
        
        return $products;
    }
    
    /**
     * Get special/sale products
     * 
     * @param int $limit Maximum products to return
     * @return array<int, array<string, mixed>>
     */
    public function getSpecialProducts(int $limit = 4): array {
        $this->load->model('catalog/product');
        
        $results = $this->model_catalog_product->getProductSpecials(['start' => 0, 'limit' => $limit]);
        
        $products = [];
        foreach ($results as $result) {
            $product_info = $this->model_catalog_product->getProduct($result['product_id']);
            if ($product_info) {
                $products[] = $this->formatProduct($product_info);
            }
        }
        
        return $products;
    }
    
    /**
     * Get bestseller products
     * 
     * @param int $limit Maximum products to return
     * @return array<int, array<string, mixed>>
     */
    public function getBestsellerProducts(int $limit = 4): array {
        $this->load->model('catalog/product');
        
        $results = $this->model_catalog_product->getBestSellerProducts($limit);
        
        $products = [];
        foreach ($results as $result) {
            $products[] = $this->formatProduct($result);
        }
        
        return $products;
    }
    
    /**
     * Get product labels (New, Sale, Out of Stock, Bestseller)
     * 
     * @param int $product_id Product ID
     * @return array<int, array<string, mixed>>
     */
    public function getProductLabels(int $product_id): array {
        $this->load->model('catalog/product');
        $this->load->language('extension/anima/theme');
        
        $labels = [];
        
        $product_info = $this->model_catalog_product->getProduct($product_id);
        
        if (!$product_info) {
            return $labels;
        }
        
        // Check if product is new (added within last 30 days)
        $date_added = strtotime($product_info['date_added']);
        $thirty_days_ago = strtotime('-30 days');
        if ($date_added > $thirty_days_ago) {
            $labels[] = [
                'text'  => $this->language->get('label_new'),
                'class' => 'label-new'
            ];
        }
        
        // Check if product has special price (on sale)
        if ($product_info['special'] && (float)$product_info['special'] > 0) {
            $discount = round(((float)$product_info['price'] - (float)$product_info['special']) / (float)$product_info['price'] * 100);
            $labels[] = [
                'text'  => '-' . $discount . '%',
                'class' => 'label-sale'
            ];
        }
        
        // Check if product is out of stock
        if ($product_info['quantity'] <= 0) {
            $labels[] = [
                'text'  => $this->language->get('label_out_of_stock'),
                'class' => 'label-out-of-stock'
            ];
        }
        
        // Check if product is bestseller
        $bestsellers = $this->model_catalog_product->getBestSellerProducts(10);
        foreach ($bestsellers as $bestseller) {
            if ($bestseller['product_id'] == $product_id) {
                $labels[] = [
                    'text'  => $this->language->get('label_bestseller'),
                    'class' => 'label-bestseller'
                ];
                break;
            }
        }
        
        return $labels;
    }
    
    /**
     * Format product data for theme display
     * 
     * @param array<string, mixed> $product_info Product data from database
     * @return array<string, mixed>
     */
    public function formatProduct(array $product_info): array {
        $this->load->model('tool/image');
        $this->load->model('catalog/product');
        
        // Image
        if ($product_info['image']) {
            $image = $this->model_tool_image->resize(html_entity_decode($product_info['image'], ENT_QUOTES, 'UTF-8'), $this->config->get('config_image_product_width') ?: 303, $this->config->get('config_image_product_height') ?: 307);
        } else {
            $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('config_image_product_width') ?: 303, $this->config->get('config_image_product_height') ?: 307);
        }
        
        // Price formatting
        if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
            $price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        } else {
            $price = false;
        }
        
        // Special price
        if (!is_null($product_info['special']) && (float)$product_info['special'] >= 0) {
            $special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            $original_price = $price;
            $price = $special;
        } else {
            $special = false;
            $original_price = false;
        }
        
        // Rating
        $rating = (int)$product_info['rating'];
        
        // Labels
        $labels = $this->getProductLabels((int)$product_info['product_id']);
        
        // Product URL
        $href = $this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $product_info['product_id']);
        
        return [
            'product_id'     => $product_info['product_id'],
            'thumb'          => $image,
            'name'           => $product_info['name'],
            'description'    => \Opencart\System\Helper\Utf8::substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length') ?: 100) . '..',
            'model'          => $product_info['model'],
            'price'          => $price,
            'special'        => $special,
            'original_price' => $original_price,
            'tax'            => $this->config->get('config_tax') ? $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']) : false,
            'minimum'        => $product_info['minimum'] > 0 ? $product_info['minimum'] : 1,
            'rating'         => $rating,
            'quantity'       => $product_info['quantity'],
            'in_stock'       => $product_info['quantity'] > 0,
            'labels'         => $labels,
            'href'           => $href
        ];
    }
    
    /**
     * Get all theme settings
     * 
     * @return array<string, mixed>
     */
    public function getSettings(): array {
        $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "setting` WHERE `code` = 'theme_anima'");
        
        $settings = [];
        foreach ($query->rows as $result) {
            if (!$result['serialized']) {
                $settings[$result['key']] = $result['value'];
            } else {
                $settings[$result['key']] = json_decode($result['value'], true);
            }
        }
        
        return $settings;
    }
    
    /**
     * Get specific theme setting
     * 
     * @param string $key Setting key
     * @param mixed $default Default value if not found
     * @return mixed
     */
    public function getSetting(string $key, mixed $default = null): mixed {
        $settings = $this->getSettings();
        
        $full_key = 'theme_anima_' . $key;
        
        return $settings[$full_key] ?? $default;
    }
    
    /**
     * Get social media links
     * 
     * @return array<string, string>
     */
    public function getSocialLinks(): array {
        return [
            'facebook'  => $this->getSetting('facebook', ''),
            'twitter'   => $this->getSetting('twitter', ''),
            'instagram' => $this->getSetting('instagram', ''),
            'youtube'   => $this->getSetting('youtube', ''),
            'whatsapp'  => $this->getSetting('whatsapp', '')
        ];
    }
    
    /**
     * Get theme color scheme
     * 
     * @return array<string, string>
     */
    public function getColorScheme(): array {
        return [
            'primary'    => $this->getSetting('color_primary', '#ff7c17'),
            'secondary'  => $this->getSetting('color_secondary', '#1c1c1c'),
            'background' => $this->getSetting('color_background', '#ffffff'),
            'text'       => $this->getSetting('color_text', '#1c1c1c')
        ];
    }
    
    /**
     * Get banners by position
     * 
     * @param string $position Banner position
     * @return array<int, array<string, mixed>>
     */
    public function getBanners(string $position = 'home'): array {
        $this->load->model('design/banner');
        $this->load->model('tool/image');
        
        $banner_id = $this->getSetting('banner_' . $position, 0);
        
        if (!$banner_id) {
            return [];
        }
        
        $results = $this->model_design_banner->getBanner($banner_id);
        
        $banners = [];
        foreach ($results as $result) {
            if (is_file(DIR_IMAGE . $result['image'])) {
                $banners[] = [
                    'title' => $result['title'],
                    'link'  => $result['link'],
                    'image' => $this->model_tool_image->resize($result['image'], 1440, 500)
                ];
            }
        }
        
        return $banners;
    }
    
    /**
     * Get category data with image
     * 
     * @param int $parent_id Parent category ID
     * @param int $limit Maximum categories to return
     * @return array<int, array<string, mixed>>
     */
    public function getCategories(int $parent_id = 0, int $limit = 0): array {
        $this->load->model('catalog/category');
        $this->load->model('tool/image');
        
        $results = $this->model_catalog_category->getCategories($parent_id);
        
        $categories = [];
        $count = 0;
        foreach ($results as $result) {
            if ($limit > 0 && $count >= $limit) {
                break;
            }
            
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 300, 300);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', 300, 300);
            }
            
            $categories[] = [
                'category_id' => $result['category_id'],
                'name'        => $result['name'],
                'image'       => $image,
                'href'        => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $result['category_id'])
            ];
            
            $count++;
        }
        
        return $categories;
    }
}
