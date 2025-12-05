<?php
class ControllerStartupAnima extends Controller {
    public function index() {
        // Theme initialization
        $this->load->model('setting/setting');
        $theme = $this->config->get('config_theme');
        $this->document->setTitle($this->language->get('heading_title'));

        // Load CSS files
        $this->document->addStyle('catalog/view/theme/' . $theme . '/stylesheet/anima.css');

        // RTL Support
        if ($this->language->get('direction') == 'rtl') {
            $this->document->addStyle('catalog/view/theme/' . $theme . '/stylesheet/anima-rtl.css');
        }

        // Google Fonts Integration
        $this->document->addLink('https://fonts.googleapis.com/css?family=Roboto:400,700', 'stylesheet', 'text/css');

        // Other startup code can follow here
    }
}