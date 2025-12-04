<?php
namespace Opencart\Admin\Controller\Theme;

class Anima extends \Opencart\System\Engine\Controller {
    public function index(): void {
        $this->load->language('theme/anima');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('theme/anima', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_status'] = $this->language->get('entry_status');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['user_token'] = $this->session->data['user_token'];

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('theme/anima', $data));
    }

    public function install(): void {
        $this->load->model('setting/setting');
        
        $this->model_setting_setting->editSetting('theme_anima', [
            'theme_anima_status' => 1
        ]);
    }

    public function uninstall(): void {
        $this->load->model('setting/setting');
        
        $this->model_setting_setting->deleteSetting('theme_anima');
    }
}
