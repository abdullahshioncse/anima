<?php
namespace Opencart\Admin\Controller\Extension\Anima\Theme;

class Anima extends \Opencart\System\Engine\Controller {
    private $error = [];

    public function index() {
        $this->load->language('extension/anima/theme/anima');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('theme_anima', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme'));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

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
            'href' => $this->url->link('extension/anima/theme/anima', 'user_token=' . $this->session->data['user_token'])
        ];

        $data['save'] = $this->url->link('extension/anima/theme/anima', 'user_token=' . $this->session->data['user_token']);
        $data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');

        // Configuration fields
        if (isset($this->request->post['theme_anima_status'])) {
            $data['theme_anima_status'] = $this->request->post['theme_anima_status'];
        } else {
            $data['theme_anima_status'] = $this->config->get('theme_anima_status');
        }

        if (isset($this->request->post['theme_anima_telephone'])) {
            $data['theme_anima_telephone'] = $this->request->post['theme_anima_telephone'];
        } else {
            $data['theme_anima_telephone'] = $this->config->get('theme_anima_telephone');
        }

        if (isset($this->request->post['theme_anima_newsletter_text'])) {
            $data['theme_anima_newsletter_text'] = $this->request->post['theme_anima_newsletter_text'];
        } else {
            $data['theme_anima_newsletter_text'] = $this->config->get('theme_anima_newsletter_text');
        }

        if (isset($this->request->post['theme_anima_sale_banner'])) {
            $data['theme_anima_sale_banner'] = $this->request->post['theme_anima_sale_banner'];
        } else {
            $data['theme_anima_sale_banner'] = $this->config->get('theme_anima_sale_banner');
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/anima/theme/anima', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/anima/theme/anima')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    public function install() {
        // Set default values on installation
        $this->load->model('setting/setting');
        
        $defaults = [
            'theme_anima_status' => 1,
            'theme_anima_telephone' => '965-22091914',
            'theme_anima_newsletter_text' => 'هل ترغب في الاشتراك في نشرتنا الإخبارية؟',
            'theme_anima_sale_banner' => 'حصل على خصم 20٪ قبل نهاية نوفمبر!'
        ];
        
        $this->model_setting_setting->editSetting('theme_anima', $defaults);
    }

    public function uninstall() {
        // Clean up settings on uninstall
        $this->load->model('setting/setting');
        $this->model_setting_setting->deleteSetting('theme_anima');
    }
}
