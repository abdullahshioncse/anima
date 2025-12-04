<?php
namespace Opencart\Admin\Controller\Extension\Theme;

/**
 * Class Anima
 * 
 * Admin Controller for Anima Theme Settings
 * OpenCart 4.1.0.3 Compatible
 * 
 * @package Opencart\Admin\Controller\Extension\Theme
 */
class Anima extends \Opencart\System\Engine\Controller {
    
    private array $error = [];
    
    /**
     * Index method - Display theme settings
     * 
     * @return void
     */
    public function index(): void {
        $this->load->language('extension/theme/anima');
        
        $this->document->setTitle($this->language->get('heading_title'));
        
        $this->load->model('setting/setting');
        
        // Save settings
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('theme_anima', $this->request->post);
            
            $this->session->data['success'] = $this->language->get('text_success');
            
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme'));
        }
        
        // Prepare data
        $data = $this->prepareData();
        
        // Set breadcrumbs
        $data['breadcrumbs'] = $this->getBreadcrumbs();
        
        // Load view
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
        $this->response->setOutput($this->load->view('extension/theme/anima', $data));
    }
    
    /**
     * Prepare data for the view
     * 
     * @return array
     */
    private function prepareData(): array {
        $data = [];
        
        // Language strings
        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        
        // Entry labels
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_logo'] = $this->language->get('entry_logo');
        $data['entry_sale_banner'] = $this->language->get('entry_sale_banner');
        $data['entry_phone'] = $this->language->get('entry_phone');
        $data['entry_email'] = $this->language->get('entry_email');
        $data['entry_social_facebook'] = $this->language->get('entry_social_facebook');
        $data['entry_social_twitter'] = $this->language->get('entry_social_twitter');
        $data['entry_social_instagram'] = $this->language->get('entry_social_instagram');
        
        // Buttons
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        
        // Error messages
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
        
        // Success message
        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];
            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }
        
        // Actions
        $data['action'] = $this->url->link('extension/theme/anima', 'user_token=' . $this->session->data['user_token']);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');
        
        // Settings
        if (isset($this->request->post['theme_anima_status'])) {
            $data['theme_anima_status'] = $this->request->post['theme_anima_status'];
        } else {
            $data['theme_anima_status'] = $this->config->get('theme_anima_status');
        }
        
        if (isset($this->request->post['theme_anima_logo'])) {
            $data['theme_anima_logo'] = $this->request->post['theme_anima_logo'];
        } else {
            $data['theme_anima_logo'] = $this->config->get('theme_anima_logo');
        }
        
        if (isset($this->request->post['theme_anima_sale_banner'])) {
            $data['theme_anima_sale_banner'] = $this->request->post['theme_anima_sale_banner'];
        } else {
            $data['theme_anima_sale_banner'] = $this->config->get('theme_anima_sale_banner');
        }
        
        if (isset($this->request->post['theme_anima_phone'])) {
            $data['theme_anima_phone'] = $this->request->post['theme_anima_phone'];
        } else {
            $data['theme_anima_phone'] = $this->config->get('theme_anima_phone');
        }
        
        if (isset($this->request->post['theme_anima_email'])) {
            $data['theme_anima_email'] = $this->request->post['theme_anima_email'];
        } else {
            $data['theme_anima_email'] = $this->config->get('theme_anima_email');
        }
        
        // Social media links
        if (isset($this->request->post['theme_anima_social_facebook'])) {
            $data['theme_anima_social_facebook'] = $this->request->post['theme_anima_social_facebook'];
        } else {
            $data['theme_anima_social_facebook'] = $this->config->get('theme_anima_social_facebook');
        }
        
        if (isset($this->request->post['theme_anima_social_twitter'])) {
            $data['theme_anima_social_twitter'] = $this->request->post['theme_anima_social_twitter'];
        } else {
            $data['theme_anima_social_twitter'] = $this->config->get('theme_anima_social_twitter');
        }
        
        if (isset($this->request->post['theme_anima_social_instagram'])) {
            $data['theme_anima_social_instagram'] = $this->request->post['theme_anima_social_instagram'];
        } else {
            $data['theme_anima_social_instagram'] = $this->config->get('theme_anima_social_instagram');
        }
        
        return $data;
    }
    
    /**
     * Get breadcrumbs
     * 
     * @return array
     */
    private function getBreadcrumbs(): array {
        $breadcrumbs = [];
        
        $breadcrumbs[] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];
        
        $breadcrumbs[] = [
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme')
        ];
        
        $breadcrumbs[] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/theme/anima', 'user_token=' . $this->session->data['user_token'])
        ];
        
        return $breadcrumbs;
    }
    
    /**
     * Validate form data
     * 
     * @return bool
     */
    private function validate(): bool {
        if (!$this->user->hasPermission('modify', 'extension/theme/anima')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        
        return !$this->error;
    }
    
    /**
     * Install theme
     * 
     * @return void
     */
    public function install(): void {
        // Create any necessary database tables or default settings
        $this->load->model('setting/setting');
        
        $defaults = [
            'theme_anima_status' => 1,
            'theme_anima_phone' => '965-22091914',
            'theme_anima_sale_banner' => 'حصل على خصم 20٪ قبل نهاية نوفمبر!'
        ];
        
        $this->model_setting_setting->editSetting('theme_anima', $defaults);
    }
    
    /**
     * Uninstall theme
     * 
     * @return void
     */
    public function uninstall(): void {
        // Clean up settings
        $this->load->model('setting/setting');
        $this->model_setting_setting->deleteSetting('theme_anima');
    }
}
