<?php
namespace Opencart\Admin\Model\Extension\Theme;

/**
 * Class Anima
 * 
 * Admin model for Anima Theme extension
 * Compatible with OpenCart 4.1.0.3
 */
class Anima extends \Opencart\System\Engine\Model {
    
    /**
     * Install theme - Create any required database tables or initial settings
     */
    public function install(): void {
        // Set default theme settings
        $this->load->model('setting/setting');
        
        $default_settings = [
            'theme_anima_status' => 1,
            'theme_anima_image_category_width' => 300,
            'theme_anima_image_category_height' => 300,
            'theme_anima_image_product_width' => 800,
            'theme_anima_image_product_height' => 800,
            'theme_anima_image_thumb_width' => 100,
            'theme_anima_image_thumb_height' => 100,
            'theme_anima_product_limit' => 16,
            'theme_anima_product_per_row' => 4,
            'theme_anima_primary_color' => '#ff7c17',
            'theme_anima_secondary_color' => '#1c1c1c',
            'theme_anima_custom_css' => '',
            'theme_anima_font_family' => 'Poppins',
            'theme_anima_phone' => '965-22091914',
            'theme_anima_sale_banner_text' => 'حصل على خصم 20٪ قبل نهاية نوفمبر!'
        ];
        
        $this->model_setting_setting->editSetting('theme_anima', $default_settings);
    }
    
    /**
     * Uninstall theme - Remove settings
     */
    public function uninstall(): void {
        $this->load->model('setting/setting');
        $this->model_setting_setting->deleteSetting('theme_anima');
    }
}
