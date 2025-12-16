<?php
namespace Opencart\Catalog\Controller\Extension\Anima;

/**
 * Class Module
 * 
 * Module controller for product displays (Featured, Latest, Special, Bestseller, Carousel, Banner, Category)
 */
class Module extends \Opencart\System\Engine\Controller {
    /**
     * Display featured products
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function featured(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        
        $data = [];
        $data['products'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 4;
        
        if (!empty($setting['product'])) {
            $products = $setting['product'];
        } else {
            $products = [];
            $results = $this->model_catalog_product->getProducts(['sort' => 'p.sort_order', 'order' => 'ASC', 'start' => 0, 'limit' => $limit]);
            foreach ($results as $result) {
                $products[] = $result['product_id'];
            }
        }
        
        foreach ($products as $product_id) {
            $product_info = $this->model_catalog_product->getProduct($product_id);
            
            if ($product_info) {
                $data['products'][] = $this->model_extension_anima_theme->formatProduct($product_info);
            }
        }
        
        $data['heading_title'] = $this->language->get('heading_featured');
        $data['button_cart'] = $this->language->get('button_cart');
        $data['button_wishlist'] = $this->language->get('button_wishlist');
        
        return $this->load->view('extension/anima/module/featured', $data);
    }
    
    /**
     * Display latest products
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function latest(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/product');
        
        $data = [];
        $data['products'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 4;
        
        $filter_data = [
            'sort'  => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => $limit
        ];
        
        $results = $this->model_catalog_product->getProducts($filter_data);
        
        foreach ($results as $result) {
            $data['products'][] = $this->model_extension_anima_theme->formatProduct($result);
        }
        
        $data['heading_title'] = $this->language->get('heading_latest');
        $data['button_cart'] = $this->language->get('button_cart');
        $data['button_wishlist'] = $this->language->get('button_wishlist');
        $data['button_view_all'] = $this->language->get('button_view_all');
        
        // Categories for tab navigation
        $this->load->model('catalog/category');
        $categories = $this->model_catalog_category->getCategories(0);
        $data['categories'] = [];
        $count = 0;
        foreach ($categories as $category) {
            if ($count >= 3) break;
            $data['categories'][] = [
                'category_id' => $category['category_id'],
                'name'        => $category['name'],
                'href'        => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id'])
            ];
            $count++;
        }
        
        return $this->load->view('extension/anima/module/latest', $data);
    }
    
    /**
     * Display special/sale products
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function special(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/product');
        
        $data = [];
        $data['products'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 4;
        
        $results = $this->model_catalog_product->getProductSpecials(['start' => 0, 'limit' => $limit]);
        
        foreach ($results as $result) {
            $product_info = $this->model_catalog_product->getProduct($result['product_id']);
            if ($product_info) {
                $data['products'][] = $this->model_extension_anima_theme->formatProduct($product_info);
            }
        }
        
        $data['heading_title'] = $this->language->get('heading_special');
        $data['button_cart'] = $this->language->get('button_cart');
        $data['button_wishlist'] = $this->language->get('button_wishlist');
        
        return $this->load->view('extension/anima/module/special', $data);
    }
    
    /**
     * Display bestseller products
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function bestseller(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/product');
        
        $data = [];
        $data['products'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 4;
        
        $results = $this->model_catalog_product->getBestSellerProducts($limit);
        
        foreach ($results as $result) {
            $data['products'][] = $this->model_extension_anima_theme->formatProduct($result);
        }
        
        $data['heading_title'] = $this->language->get('heading_bestseller');
        $data['button_cart'] = $this->language->get('button_cart');
        $data['button_wishlist'] = $this->language->get('button_wishlist');
        
        return $this->load->view('extension/anima/module/bestseller', $data);
    }
    
    /**
     * Display product carousel/slider
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function carousel(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/product');
        
        $data = [];
        $data['products'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 8;
        
        if (!empty($setting['product'])) {
            foreach ($setting['product'] as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);
                if ($product_info) {
                    $data['products'][] = $this->model_extension_anima_theme->formatProduct($product_info);
                }
            }
        } else {
            $results = $this->model_catalog_product->getProducts(['sort' => 'p.date_added', 'order' => 'DESC', 'start' => 0, 'limit' => $limit]);
            foreach ($results as $result) {
                $data['products'][] = $this->model_extension_anima_theme->formatProduct($result);
            }
        }
        
        $data['heading_title'] = isset($setting['title']) ? $setting['title'] : $this->language->get('heading_carousel');
        $data['autoplay'] = isset($setting['autoplay']) ? $setting['autoplay'] : true;
        $data['interval'] = isset($setting['interval']) ? (int)$setting['interval'] : 5000;
        
        return $this->load->view('extension/anima/module/carousel', $data);
    }
    
    /**
     * Display banner
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function banner(array $setting): string {
        $this->load->model('extension/anima/theme');
        $this->load->model('design/banner');
        $this->load->model('tool/image');
        
        $data = [];
        $data['banners'] = [];
        
        if (!empty($setting['banner_id'])) {
            $results = $this->model_design_banner->getBanner($setting['banner_id']);
            
            foreach ($results as $result) {
                if (is_file(DIR_IMAGE . $result['image'])) {
                    $data['banners'][] = [
                        'title' => $result['title'],
                        'link'  => $result['link'],
                        'image' => $this->model_tool_image->resize($result['image'], isset($setting['width']) ? (int)$setting['width'] : 1440, isset($setting['height']) ? (int)$setting['height'] : 500)
                    ];
                }
            }
        }
        
        $data['width'] = isset($setting['width']) ? (int)$setting['width'] : 1440;
        $data['height'] = isset($setting['height']) ? (int)$setting['height'] : 500;
        
        return $this->load->view('extension/anima/module/banner', $data);
    }
    
    /**
     * Display category grid
     * 
     * @param array<string, mixed> $setting Module settings
     * @return string Rendered output
     */
    public function category(array $setting): string {
        $this->load->language('extension/anima/module');
        $this->load->model('catalog/category');
        $this->load->model('tool/image');
        
        $data = [];
        $data['categories'] = [];
        
        $limit = isset($setting['limit']) ? (int)$setting['limit'] : 6;
        
        $results = $this->model_catalog_category->getCategories(0);
        
        $count = 0;
        foreach ($results as $result) {
            if ($count >= $limit) break;
            
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], isset($setting['width']) ? (int)$setting['width'] : 300, isset($setting['height']) ? (int)$setting['height'] : 300);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', isset($setting['width']) ? (int)$setting['width'] : 300, isset($setting['height']) ? (int)$setting['height'] : 300);
            }
            
            $data['categories'][] = [
                'category_id' => $result['category_id'],
                'name'        => $result['name'],
                'image'       => $image,
                'href'        => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $result['category_id'])
            ];
            
            $count++;
        }
        
        $data['heading_title'] = $this->language->get('heading_category');
        
        return $this->load->view('extension/anima/module/category', $data);
    }
}
