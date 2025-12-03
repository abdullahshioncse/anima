<?php
namespace Opencart\Admin\Controller\Extension\Anima\Theme;

/**
 * Class Anima
 *
 * Admin controller for Anima theme settings
 *
 * @package Opencart\Admin\Controller\Extension\Anima\Theme
 */
class Anima extends \Opencart\System\Engine\Controller {
	/**
	 * @var array
	 */
	private array $error = [];

	/**
	 * Index method - displays theme settings page
	 *
	 * @return void
	 */
	public function index(): void {
		$this->load->language('extension/anima/theme/anima');

		$this->document->setTitle($this->language->get('heading_title'));

		// Load settings model
		$this->load->model('setting/setting');

		// Handle form submission
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('theme_anima', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme'));
		}

		// Set up breadcrumbs
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

		// Language strings
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_product_limit'] = $this->language->get('entry_product_limit');
		$data['entry_product_description_length'] = $this->language->get('entry_product_description_length');
		$data['entry_image_category'] = $this->language->get('entry_image_category');
		$data['entry_image_thumb'] = $this->language->get('entry_image_thumb');
		$data['entry_image_popup'] = $this->language->get('entry_image_popup');
		$data['entry_image_product'] = $this->language->get('entry_image_product');
		$data['entry_image_additional'] = $this->language->get('entry_image_additional');
		$data['entry_image_related'] = $this->language->get('entry_image_related');
		$data['entry_image_compare'] = $this->language->get('entry_image_compare');
		$data['entry_image_wishlist'] = $this->language->get('entry_image_wishlist');
		$data['entry_image_cart'] = $this->language->get('entry_image_cart');
		$data['entry_image_location'] = $this->language->get('entry_image_location');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		// Error handling
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		// Action URLs
		$data['action'] = $this->url->link('extension/anima/theme/anima', 'user_token=' . $this->session->data['user_token']);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=theme');

		// Get saved settings or defaults
		if (isset($this->request->post['theme_anima_status'])) {
			$data['theme_anima_status'] = $this->request->post['theme_anima_status'];
		} else {
			$data['theme_anima_status'] = $this->config->get('theme_anima_status');
		}

		if (isset($this->request->post['theme_anima_product_limit'])) {
			$data['theme_anima_product_limit'] = $this->request->post['theme_anima_product_limit'];
		} else {
			$data['theme_anima_product_limit'] = $this->config->get('theme_anima_product_limit') ?: 15;
		}

		if (isset($this->request->post['theme_anima_product_description_length'])) {
			$data['theme_anima_product_description_length'] = $this->request->post['theme_anima_product_description_length'];
		} else {
			$data['theme_anima_product_description_length'] = $this->config->get('theme_anima_product_description_length') ?: 100;
		}

		// Image dimensions
		$image_dimensions = [
			'category' => ['width' => 80, 'height' => 80],
			'thumb' => ['width' => 228, 'height' => 228],
			'popup' => ['width' => 500, 'height' => 500],
			'product' => ['width' => 228, 'height' => 228],
			'additional' => ['width' => 74, 'height' => 74],
			'related' => ['width' => 200, 'height' => 200],
			'compare' => ['width' => 90, 'height' => 90],
			'wishlist' => ['width' => 47, 'height' => 47],
			'cart' => ['width' => 47, 'height' => 47],
			'location' => ['width' => 268, 'height' => 50]
		];

		foreach ($image_dimensions as $key => $dimensions) {
			foreach (['width', 'height'] as $dimension) {
				$config_key = "theme_anima_image_{$key}_{$dimension}";
				$post_key = $config_key;
				
				if (isset($this->request->post[$post_key])) {
					$data[$post_key] = $this->request->post[$post_key];
				} else {
					$data[$post_key] = $this->config->get($config_key) ?: $dimensions[$dimension];
				}
			}
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/anima/theme/anima', $data));
	}

	/**
	 * Validate form data
	 *
	 * @return bool
	 */
	protected function validate(): bool {
		if (!$this->user->hasPermission('modify', 'extension/anima/theme/anima')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	/**
	 * Install method - called when theme is installed
	 * Registers event hooks for template override
	 *
	 * @return void
	 */
	public function install(): void {
		$this->load->model('setting/event');
		
		// Register event to override view templates
		$this->model_setting_event->addEvent([
			'code' => 'anima_theme',
			'description' => 'Anima Theme Template Override',
			'trigger' => 'catalog/view/*/before',
			'action' => 'extension/anima/theme/anima.event',
			'status' => true,
			'sort_order' => 0
		]);
	}

	/**
	 * Uninstall method - called when theme is uninstalled
	 * Removes event hooks
	 *
	 * @return void
	 */
	public function uninstall(): void {
		$this->load->model('setting/event');
		
		// Remove event
		$this->model_setting_event->deleteEventByCode('anima_theme');
	}
}
