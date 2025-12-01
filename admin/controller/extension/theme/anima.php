<?php
namespace Opencart\Admin\Controller\Extension\Theme;

/**
 * Class Anima
 * 
 * Admin controller for Anima theme settings
 */
class Anima extends \Opencart\System\Engine\Controller {
    /**
     * @var string Error warning message
     */
    private string $error_warning = '';
    
    /**
     * Display theme settings page
     * 
     * @return void
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
            'href' => $this->url->link('extension/theme/anima', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'])
        ];
        
        $data['save'] = $this->url->link('extension/theme/anima.save', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');
        
        $store_id = isset($this->request->get['store_id']) ? (int)$this->request->get['store_id'] : 0;
        
        // Load settings
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('theme_anima', $store_id);
        
        // Theme Status
        $data['theme_anima_status'] = $settings['theme_anima_status'] ?? 0;
        
        // Sale Banner
        $data['theme_anima_sale_banner_enabled'] = $settings['theme_anima_sale_banner_enabled'] ?? 1;
        $data['theme_anima_sale_banner_text'] = $settings['theme_anima_sale_banner_text'] ?? 'حصل على خصم 20٪ قبل نهاية نوفمبر!';
        
        // Colors
        $data['theme_anima_color_primary'] = $settings['theme_anima_color_primary'] ?? '#ff7c17';
        $data['theme_anima_color_secondary'] = $settings['theme_anima_color_secondary'] ?? '#1c1c1c';
        $data['theme_anima_color_background'] = $settings['theme_anima_color_background'] ?? '#ffffff';
        $data['theme_anima_color_text'] = $settings['theme_anima_color_text'] ?? '#1c1c1c';
        
        // Social Links
        $data['theme_anima_facebook'] = $settings['theme_anima_facebook'] ?? '';
        $data['theme_anima_twitter'] = $settings['theme_anima_twitter'] ?? '';
        $data['theme_anima_instagram'] = $settings['theme_anima_instagram'] ?? '';
        $data['theme_anima_youtube'] = $settings['theme_anima_youtube'] ?? '';
        $data['theme_anima_whatsapp'] = $settings['theme_anima_whatsapp'] ?? '';
        
        // Product Display
        $data['theme_anima_product_limit'] = $settings['theme_anima_product_limit'] ?? 15;
        $data['theme_anima_product_description_length'] = $settings['theme_anima_product_description_length'] ?? 100;
        $data['theme_anima_image_category_width'] = $settings['theme_anima_image_category_width'] ?? 80;
        $data['theme_anima_image_category_height'] = $settings['theme_anima_image_category_height'] ?? 80;
        $data['theme_anima_image_thumb_width'] = $settings['theme_anima_image_thumb_width'] ?? 303;
        $data['theme_anima_image_thumb_height'] = $settings['theme_anima_image_thumb_height'] ?? 307;
        $data['theme_anima_image_popup_width'] = $settings['theme_anima_image_popup_width'] ?? 500;
        $data['theme_anima_image_popup_height'] = $settings['theme_anima_image_popup_height'] ?? 500;
        $data['theme_anima_image_product_width'] = $settings['theme_anima_image_product_width'] ?? 228;
        $data['theme_anima_image_product_height'] = $settings['theme_anima_image_product_height'] ?? 228;
        $data['theme_anima_image_additional_width'] = $settings['theme_anima_image_additional_width'] ?? 74;
        $data['theme_anima_image_additional_height'] = $settings['theme_anima_image_additional_height'] ?? 74;
        $data['theme_anima_image_related_width'] = $settings['theme_anima_image_related_width'] ?? 200;
        $data['theme_anima_image_related_height'] = $settings['theme_anima_image_related_height'] ?? 200;
        $data['theme_anima_image_compare_width'] = $settings['theme_anima_image_compare_width'] ?? 90;
        $data['theme_anima_image_compare_height'] = $settings['theme_anima_image_compare_height'] ?? 90;
        $data['theme_anima_image_wishlist_width'] = $settings['theme_anima_image_wishlist_width'] ?? 47;
        $data['theme_anima_image_wishlist_height'] = $settings['theme_anima_image_wishlist_height'] ?? 47;
        $data['theme_anima_image_cart_width'] = $settings['theme_anima_image_cart_width'] ?? 47;
        $data['theme_anima_image_cart_height'] = $settings['theme_anima_image_cart_height'] ?? 47;
        $data['theme_anima_image_location_width'] = $settings['theme_anima_image_location_width'] ?? 268;
        $data['theme_anima_image_location_height'] = $settings['theme_anima_image_location_height'] ?? 50;
        
        // Banner
        $this->load->model('design/banner');
        $data['banners'] = $this->model_design_banner->getBanners();
        $data['theme_anima_banner_home'] = $settings['theme_anima_banner_home'] ?? 0;
        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
        $this->response->setOutput($this->load->view('extension/theme/anima', $data));
    }
    
    /**
     * Save theme settings
     * 
     * @return void
     */
    public function save(): void {
        $this->load->language('extension/theme/anima');
        
        $json = [];
        
        if (!$this->user->hasPermission('modify', 'extension/theme/anima')) {
            $json['error'] = $this->language->get('error_permission');
        }
        
        if (!$json) {
            $this->load->model('setting/setting');
            
            $store_id = isset($this->request->get['store_id']) ? (int)$this->request->get['store_id'] : 0;
            
            $this->model_setting_setting->editSetting('theme_anima', $this->request->post, $store_id);
            
            $json['success'] = $this->language->get('text_success');
        }
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    
    /**
     * Install theme (register events)
     * 
     * @return void
     */
    public function install(): void {
        $this->load->model('setting/event');
        
        // Register events
        $this->model_setting_event->addEvent([
            'code'        => 'theme_anima',
            'description' => 'Anima Theme - Header Event',
            'trigger'     => 'catalog/view/common/header/before',
            'action'      => 'extension/anima/event.headerBefore',
            'status'      => 1,
            'sort_order'  => 0
        ]);
        
        $this->model_setting_event->addEvent([
            'code'        => 'theme_anima',
            'description' => 'Anima Theme - Footer Event',
            'trigger'     => 'catalog/view/common/footer/before',
            'action'      => 'extension/anima/event.footerBefore',
            'status'      => 1,
            'sort_order'  => 0
        ]);
        
        $this->model_setting_event->addEvent([
            'code'        => 'theme_anima',
            'description' => 'Anima Theme - Product Event',
            'trigger'     => 'catalog/view/product/product/before',
            'action'      => 'extension/anima/event.productBefore',
            'status'      => 1,
            'sort_order'  => 0
        ]);
        
        $this->model_setting_event->addEvent([
            'code'        => 'theme_anima',
            'description' => 'Anima Theme - Category Event',
            'trigger'     => 'catalog/view/product/category/before',
            'action'      => 'extension/anima/event.categoryBefore',
            'status'      => 1,
            'sort_order'  => 0
        ]);
        
        $this->model_setting_event->addEvent([
            'code'        => 'theme_anima',
            'description' => 'Anima Theme - Startup Event',
            'trigger'     => 'catalog/controller/startup/before',
            'action'      => 'extension/anima/startup.index',
            'status'      => 1,
            'sort_order'  => 0
        ]);
    }
    
    /**
     * Uninstall theme (remove events)
     * 
     * @return void
     */
    public function uninstall(): void {
        $this->load->model('setting/event');
        
        $this->model_setting_event->deleteEventByCode('theme_anima');
    }
}
