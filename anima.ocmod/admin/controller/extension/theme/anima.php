<?php
namespace Opencart\Admin\Controller\Extension\Theme;

/**
 * Class Anima
 * 
 * Admin controller for Anima Theme extension
 * Compatible with OpenCart 4.1.0.3
 */
class Anima extends \Opencart\System\Engine\Controller {
    
    /**
     * Main index method - Display theme settings page
     */
    public function index(): void {
        $this->load->language('extension/theme/anima');
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $data['breadcrumbs'] = [];
        
        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];
        
        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme')
        ];
        
        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/theme/anima', 'user_token=' . $this->session->data['user_token'])
        ];
        
        $data['save'] = $this->url->link('extension/theme/anima.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');
        
        // Load current settings
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('theme_anima');
        
        // Theme Status
        $data['theme_anima_status'] = isset($settings['theme_anima_status']) ? $settings['theme_anima_status'] : false;
        
        // Product Image Dimensions
        $data['theme_anima_image_category_width'] = isset($settings['theme_anima_image_category_width']) ? $settings['theme_anima_image_category_width'] : 300;
        $data['theme_anima_image_category_height'] = isset($settings['theme_anima_image_category_height']) ? $settings['theme_anima_image_category_height'] : 300;
        $data['theme_anima_image_product_width'] = isset($settings['theme_anima_image_product_width']) ? $settings['theme_anima_image_product_width'] : 800;
        $data['theme_anima_image_product_height'] = isset($settings['theme_anima_image_product_height']) ? $settings['theme_anima_image_product_height'] : 800;
        $data['theme_anima_image_thumb_width'] = isset($settings['theme_anima_image_thumb_width']) ? $settings['theme_anima_image_thumb_width'] : 100;
        $data['theme_anima_image_thumb_height'] = isset($settings['theme_anima_image_thumb_height']) ? $settings['theme_anima_image_thumb_height'] : 100;
        
        // Products Display Settings
        $data['theme_anima_product_limit'] = isset($settings['theme_anima_product_limit']) ? $settings['theme_anima_product_limit'] : 16;
        $data['theme_anima_product_per_row'] = isset($settings['theme_anima_product_per_row']) ? $settings['theme_anima_product_per_row'] : 4;
        
        // Color Scheme
        $data['theme_anima_primary_color'] = isset($settings['theme_anima_primary_color']) ? $settings['theme_anima_primary_color'] : '#ff7c17';
        $data['theme_anima_secondary_color'] = isset($settings['theme_anima_secondary_color']) ? $settings['theme_anima_secondary_color'] : '#1c1c1c';
        
        // Custom CSS
        $data['theme_anima_custom_css'] = isset($settings['theme_anima_custom_css']) ? $settings['theme_anima_custom_css'] : '';
        
        // Typography
        $data['theme_anima_font_family'] = isset($settings['theme_anima_font_family']) ? $settings['theme_anima_font_family'] : 'Poppins';
        
        // Header and Footer Text
        $data['theme_anima_phone'] = isset($settings['theme_anima_phone']) ? $settings['theme_anima_phone'] : '965-22091914';
        $data['theme_anima_sale_banner_text'] = isset($settings['theme_anima_sale_banner_text']) ? $settings['theme_anima_sale_banner_text'] : 'حصل على خصم 20٪ قبل نهاية نوفمبر!';
        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
        $this->response->setOutput($this->load->view('extension/theme/anima', $data));
    }
    
    /**
     * Save theme settings
     */
    public function save(): void {
        $this->load->language('extension/theme/anima');
        
        $json = [];
        
        if (!$this->user->hasPermission('modify', 'extension/theme/anima')) {
            $json['error'] = $this->language->get('error_permission');
        }
        
        if (!$json) {
            $this->load->model('setting/setting');
            
            $this->model_setting_setting->editSetting('theme_anima', $this->request->post);
            
            $json['success'] = $this->language->get('text_success');
        }
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    
    /**
     * Install method - called when extension is installed
     */
    public function install(): void {
        $this->load->model('extension/theme/anima');
        $this->model_extension_theme_anima->install();
    }
    
    /**
     * Uninstall method - called when extension is uninstalled
     */
    public function uninstall(): void {
        $this->load->model('extension/theme/anima');
        $this->model_extension_theme_anima->uninstall();
    }
}
