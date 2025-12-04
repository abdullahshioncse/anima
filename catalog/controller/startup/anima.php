<?php
namespace Opencart\Catalog\Controller\Startup;

class Anima extends \Opencart\System\Engine\Controller {
    public function index(): void {
        // Set the theme directory
        if ($this->config->get('theme_anima_status')) {
            $this->config->set('template_engine', 'twig');
            $this->config->set('template_directory', 'catalog/view/template/');
        }
        
        // Add theme CSS to the document
        $this->document->addStyle('catalog/view/stylesheet/globals.css');
        $this->document->addStyle('catalog/view/stylesheet/styleguide.css');
        $this->document->addStyle('catalog/view/stylesheet/desktop-1.css');
    }
}
