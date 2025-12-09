<?php
namespace Opencart\Admin\Controller\Extension\ThemeAnima\Theme;

class ThemeAnima extends \Opencart\System\Engine\Controller {
    private array $error = [];

    public function index(): void {
        $this->load->language('extension/theme_anima/theme/theme_anima');

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
            'href' => $this->url->link('extension/theme_anima/theme/theme_anima', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('extension/theme_anima/theme/theme_anima.save', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');

        $this->load->model('setting/setting');

        if (isset($this->request->get['store_id'])) {
            $data['theme_anima_status'] = $this->model_setting_setting->getValue('theme_anima_status', $this->request->get['store_id']);
        } else {
            $data['theme_anima_status'] = $this->config->get('theme_anima_status');
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/theme_anima/theme/theme_anima', $data));
    }

    public function save(): void {
        $this->load->language('extension/theme_anima/theme/theme_anima');

        $json = [];

        if (!$this->user->hasPermission('modify', 'extension/theme_anima/theme/theme_anima')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            $this->load->model('setting/setting');

            $this->model_setting_setting->editSetting('theme_anima', $this->request->post, $this->request->get['store_id']);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function install(): void {
        // Installation logic
    }

    public function uninstall(): void {
        // Uninstallation logic
    }
}
