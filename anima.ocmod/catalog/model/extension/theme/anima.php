<?php
namespace Opencart\Catalog\Model\Extension\Theme;

/**
 * Class Anima
 * 
 * Catalog model for Anima Theme extension
 * Compatible with OpenCart 4.1.0.3
 */
class Anima extends \Opencart\System\Engine\Model {
    
    /**
     * Get theme settings
     */
    public function getSettings(): array {
        $this->load->model('setting/setting');
        $settings = $this->model_setting_setting->getSetting('theme_anima');
        
        return $settings;
    }
}
