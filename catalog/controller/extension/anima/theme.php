<?php
namespace Opencart\Catalog\Controller\Extension\Anima;

/**
 * Class Theme
 * 
 * Main theme controller for Anima OpenCart theme
 */
class Theme extends \Opencart\System\Engine\Controller {
    /**
     * Initialize theme settings and assets
     * 
     * @return void
     */
    public function index(): void {
        $this->load->language('extension/anima/theme');
        $this->load->model('extension/anima/theme');
        
        // Get theme settings
        $settings = $this->model_extension_anima_theme->getSettings();
        
        // Add theme stylesheets
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/globals.css');
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/styleguide.css');
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/desktop-1.css');
        $this->document->addStyle('catalog/view/theme/anima/stylesheet/custom.css');
        
        // Add theme JavaScript
        $this->document->addScript('catalog/view/theme/anima/javascript/common.js');
        
        // Store settings in session for access by other controllers
        $this->session->data['anima_settings'] = $settings;
    }
    
    /**
     * Get theme header data
     * 
     * @return array<string, mixed>
     */
    public function getHeaderData(): array {
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/category');
        
        $data = [];
        
        // Logo
        if ($this->config->get('config_logo') && is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
            $data['logo'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
        } else {
            $data['logo'] = '';
        }
        
        $data['name'] = $this->config->get('config_name');
        
        // Phone number
        $data['telephone'] = $this->config->get('config_telephone');
        
        // Navigation categories
        $data['categories'] = $this->getCategories();
        
        // Cart count
        $data['cart_count'] = $this->cart->countProducts();
        
        // Wishlist count
        if ($this->customer->isLogged()) {
            $this->load->model('account/wishlist');
            $data['wishlist_count'] = $this->model_account_wishlist->getTotalWishlist();
        } else {
            $data['wishlist_count'] = isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0;
        }
        
        // Customer logged in status
        $data['logged'] = $this->customer->isLogged();
        
        // Sale banner text
        $data['sale_banner_text'] = $this->model_extension_anima_theme->getSetting('sale_banner_text', 'حصل على خصم 20٪ قبل نهاية نوفمبر!');
        $data['sale_banner_enabled'] = $this->model_extension_anima_theme->getSetting('sale_banner_enabled', true);
        
        // URLs
        $data['home'] = $this->url->link('common/home', 'language=' . $this->config->get('config_language'));
        $data['wishlist'] = $this->url->link('account/wishlist', 'language=' . $this->config->get('config_language'));
        $data['account'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language'));
        $data['login'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language'));
        $data['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language'));
        $data['cart'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'));
        $data['checkout'] = $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'));
        $data['search'] = $this->url->link('product/search', 'language=' . $this->config->get('config_language'));
        
        // RTL support
        $data['direction'] = $this->language->get('direction');
        $data['lang'] = $this->language->get('code');
        
        return $data;
    }
    
    /**
     * Get theme footer data
     * 
     * @return array<string, mixed>
     */
    public function getFooterData(): array {
        $this->load->model('extension/anima/theme');
        $this->load->model('catalog/information');
        
        $data = [];
        
        // Newsletter text
        $data['newsletter_title'] = $this->language->get('text_newsletter_title');
        $data['newsletter_placeholder'] = $this->language->get('text_email');
        
        // Shop now menu (categories)
        $data['shop_menu'] = $this->getCategories(4);
        
        // Contact menu
        $data['contact_menu'] = [];
        $data['contact_menu'][] = [
            'text' => $this->language->get('text_contact'),
            'href' => $this->url->link('information/contact', 'language=' . $this->config->get('config_language'))
        ];
        
        // Add information pages
        $informations = $this->model_catalog_information->getInformations();
        foreach ($informations as $information) {
            $data['contact_menu'][] = [
                'text' => $information['title'],
                'href' => $this->url->link('information/information', 'language=' . $this->config->get('config_language') . '&information_id=' . $information['information_id'])
            ];
        }
        
        // Quick links
        $data['quick_links'] = [];
        $data['quick_links'][] = [
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', 'language=' . $this->config->get('config_language'))
        ];
        $data['quick_links'][] = [
            'text' => $this->language->get('text_about'),
            'href' => $this->url->link('information/information', 'language=' . $this->config->get('config_language') . '&information_id=' . $this->config->get('config_about_id'))
        ];
        
        // Copyright
        $data['copyright'] = '@' . date('Y');
        
        // Payment icons
        $data['payment_icons'] = ['visa', 'mastercard', 'applepay'];
        
        // Social links
        $data['social_links'] = $this->model_extension_anima_theme->getSocialLinks();
        
        return $data;
    }
    
    /**
     * Get navigation categories
     * 
     * @param int $limit Maximum number of categories
     * @return array<int, array<string, mixed>>
     */
    private function getCategories(int $limit = 0): array {
        $this->load->model('catalog/category');
        
        $categories = [];
        
        $results = $this->model_catalog_category->getCategories(0);
        
        $count = 0;
        foreach ($results as $result) {
            if ($limit > 0 && $count >= $limit) {
                break;
            }
            
            $categories[] = [
                'category_id' => $result['category_id'],
                'name'        => $result['name'],
                'href'        => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $result['category_id'])
            ];
            
            $count++;
        }
        
        return $categories;
    }
}
