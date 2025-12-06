<?php
namespace Opencart\Catalog\Controller\Extension\Theme;

/**
 * Class Anima
 * 
 * Catalog controller for Anima Theme extension
 * Compatible with OpenCart 4.1.0.3
 */
class Anima extends \Opencart\System\Engine\Controller {
    
    /**
     * Main index method - Load theme
     */
    public function index(): string {
        $this->load->language('extension/theme/anima');
        
        // Load theme settings
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('theme_anima');
        
        // Add custom CSS if set
        if (isset($settings['theme_anima_custom_css']) && !empty($settings['theme_anima_custom_css'])) {
            $this->document->addStyle('data:text/css;base64,' . base64_encode($settings['theme_anima_custom_css']));
        }
        
        return '';
    }
    
    /**
     * Get theme settings for use in templates
     */
    public function getSettings(): array {
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('theme_anima');
        
        return [
            'status' => isset($settings['theme_anima_status']) ? $settings['theme_anima_status'] : 0,
            'image_category_width' => isset($settings['theme_anima_image_category_width']) ? $settings['theme_anima_image_category_width'] : 300,
            'image_category_height' => isset($settings['theme_anima_image_category_height']) ? $settings['theme_anima_image_category_height'] : 300,
            'image_product_width' => isset($settings['theme_anima_image_product_width']) ? $settings['theme_anima_image_product_width'] : 800,
            'image_product_height' => isset($settings['theme_anima_image_product_height']) ? $settings['theme_anima_image_product_height'] : 800,
            'image_thumb_width' => isset($settings['theme_anima_image_thumb_width']) ? $settings['theme_anima_image_thumb_width'] : 100,
            'image_thumb_height' => isset($settings['theme_anima_image_thumb_height']) ? $settings['theme_anima_image_thumb_height'] : 100,
            'product_limit' => isset($settings['theme_anima_product_limit']) ? $settings['theme_anima_product_limit'] : 16,
            'product_per_row' => isset($settings['theme_anima_product_per_row']) ? $settings['theme_anima_product_per_row'] : 4,
            'primary_color' => isset($settings['theme_anima_primary_color']) ? $settings['theme_anima_primary_color'] : '#ff7c17',
            'secondary_color' => isset($settings['theme_anima_secondary_color']) ? $settings['theme_anima_secondary_color'] : '#1c1c1c',
            'font_family' => isset($settings['theme_anima_font_family']) ? $settings['theme_anima_font_family'] : 'Poppins',
            'phone' => isset($settings['theme_anima_phone']) ? $settings['theme_anima_phone'] : '965-22091914',
            'sale_banner_text' => isset($settings['theme_anima_sale_banner_text']) ? $settings['theme_anima_sale_banner_text'] : 'حصل على خصم 20٪ قبل نهاية نوفمبر!'
        ];
    }
}
