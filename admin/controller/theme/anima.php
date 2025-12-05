<?php
namespace Opencart\Admin\Controller\Theme;

class Anima extends \Opencart\System\Engine\Controller {
    private array $error = [];

    public function index(): void {
        $this->load->language('theme/anima');

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
            'href' => $this->url->link('theme/anima', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('theme/anima.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');

        $data['theme_anima_status'] = $this->config->get('theme_anima_status');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('theme/anima', $data));
    }

    public function save(): void {
        $this->load->language('theme/anima');

        $json = [];

        if (!$this->user->hasPermission('modify', 'theme/anima')) {
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

    public function install(): void {
        $this->load->model('setting/setting');

        $settings = [
            'theme_anima_status' => 1
        ];

        $this->model_setting_setting->editSetting('theme_anima', $settings);
    }

    public function uninstall(): void {
        $this->load->model('setting/setting');

        $this->model_setting_setting->deleteSetting('theme_anima');
    }
}
