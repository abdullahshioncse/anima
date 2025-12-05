<?php
namespace Opencart\Admin\Controller\Theme;

use Opencart\System\Library\Controller;

class Anima extends Controller {
    public function index() {
        // Load language file
        $this->load->language('theme/anima');

        // Set document title
        $this->document->setTitle($this->language->get('heading_title'));

        // Load model to access theme data
        $this->load->model('setting/setting');

        // Check for post request
        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            // Save settings if posted
            $this->model_setting_setting->editSetting('anima', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('theme/anima', 'user_token=' . $this->session->data['user_token'], true));
        }

        // Load existing settings
        $data['anima'] = $this->model_setting_setting->getSetting('anima');

        // Load the view
        $data['header'] = $this->load->controller('common/header');
        $data['footer'] = $this->load->controller('common/footer');
        $this->response->setOutput($this->load->view('theme/anima', $data));
    }
}