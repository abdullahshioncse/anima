<?php
namespace Opencart\Catalog\Controller\Extension\Anima\Startup;

class Anima extends \Opencart\System\Engine\Controller {
    public function index() {
        // Check if theme is enabled
        if ($this->config->get('theme_anima_status')) {
            // Set theme directory
            $this->config->set('template_directory', 'extension/anima/');
            
            // Load theme settings
            $this->registry->set('anima_config', [
                'telephone' => $this->config->get('theme_anima_telephone') ?: '965-22091914',
                'newsletter_text' => $this->config->get('theme_anima_newsletter_text') ?: 'هل ترغب في الاشتراك في نشرتنا الإخبارية؟',
                'sale_banner' => $this->config->get('theme_anima_sale_banner') ?: 'حصل على خصم 20٪ قبل نهاية نوفمبر!'
            ]);
        }
    }
}
