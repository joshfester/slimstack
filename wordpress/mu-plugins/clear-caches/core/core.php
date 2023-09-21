<?php

// Subpackage namespace
namespace LittleBizzy\ClearCaches\Core;

/**
 * Core class
 *
 * @package Clear Caches
 * @subpackage Core
 */
final class Core {



	/**
	 * Single class instance
	 */
	private static $instance;



	/**
	 * Plugin object
	 */
	public $plugin;



	/**
	 * Create or retrieve instance
	 */
	public static function instance($plugin = null) {

		// Check instance
		if (!isset(self::$instance)) {
			self::$instance = new self($plugin);
		}

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct($plugin) {

		// Init components
		$this->initialize($plugin);

		// Check WP context
		$this->checkContext();
	}



	/**
	 * Core initialization
	 */
	private function initialize($plugin) {

		// Set plugin object
		$this->plugin = $plugin;

		// Set nonce seed
		$this->plugin->nonceSeed = 'clear-caches';

		// Create factory object
		$this->plugin->factory = new Factory($this->plugin);

		// Create registrar object and set hooks handler
		$this->plugin->factory->registrar->setHandler($this);
	}



	/**
	 * Inspect the context
	 */
	private function checkContext() {

		// Context object
		$context = $this->plugin->context();

		// Admin area
		if ($context->admin()) {
			$this->plugin->factory->admin();
			$this->plugin->factory->toolbar();

		// Front-end
		} elseif ($context->front()) {
			$this->plugin->factory->toolbar();

		// AJAX request
		} elseif ($context->ajax() && !empty($_POST['action']) &&
			0 === strpos($_POST['action'], $this->plugin->prefix.'_')) {
			$this->plugin->factory->ajax();
		}
	}



	/**
	 * On plugin uninstall
	 */
	public static function onUninstall() {
		delete_option('clrchs_nginx_path');
	}



}