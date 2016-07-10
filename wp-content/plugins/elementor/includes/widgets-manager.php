<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widgets_Manager {

	/**
	 * @var Widget_Base[]
	 */
	protected $_register_widgets = [];

	public function init() {
		include( ELEMENTOR_PATH . 'includes/widgets/base.php' );

		$build_widgets_filename = [
			'heading',
			'image',
			'text-editor',
			'video',
			'button',
			'divider',
			'spacer',
			'image-box',
			'google-maps',
			'icon',
			'icon-box',
			'image-gallery',
			'image-carousel',
			'icon-list',
			'counter',
			'progress',
			'testimonial',
			'tabs',
			'accordion',
			'toggle',
			'social-icons',
			'alert',
			'audio',
			'html',
			'menu-anchor',
			'sidebar',
		];

		if ( Utils::is_development_mode() ) {

		}

		foreach ( $build_widgets_filename as $widget_filename ) {
			include( ELEMENTOR_PATH . 'includes/widgets/' . $widget_filename . '.php' );

			$class_name = ucwords( $widget_filename );
			$class_name = str_replace( '-', '_', $class_name );

			$this->register_widget( __NAMESPACE__ . '\Widget_' . $class_name );
		}

		$this->_register_wp_widgets();

		do_action( 'elementor/widgets/widgets_registered' );
	}

	private function _register_wp_widgets() {
		global $wp_widget_factory;

		include( ELEMENTOR_PATH . 'includes/widgets/wordpress.php' );

		foreach ( $wp_widget_factory->widgets as $widget_class => $widget_obj ) {
			// Skip Pojo widgets
			$allowed_widgets = [
				'Pojo_Widget_Recent_Posts',
				'Pojo_Widget_Gallery',
				'Pojo_Widget_Recent_Galleries',
				'Pojo_Slideshow_Widget',
				'Pojo_Forms_Widget',
				'Pojo_Widget_News_Ticker',
			];

			if ( $widget_obj instanceof \Pojo_Widget_Base && ! in_array( $widget_class, $allowed_widgets ) ) {
				continue;
			}

			$this->register_widget( __NAMESPACE__ . '\Widget_WordPress', [ 'widget_name' => $widget_class ] );
		}
	}

	public function register_widget( $widget_class, $args = [] ) {
		if ( ! class_exists( $widget_class ) ) {
			return new \WP_Error( 'widget_class_name_not_exists' );
		}

		$widget_instance = new $widget_class( $args );

		if ( ! $widget_instance instanceof Widget_Base ) {
			return new \WP_Error( 'wrong_instance_widget' );
		}
		$this->_register_widgets[ $widget_instance->get_id() ] = $widget_instance;

		return true;
	}

	public function unregister_widget( $id ) {
		if ( ! isset( $this->_register_widgets[ $id ] ) ) {
			return false;
		}
		unset( $this->_register_widgets[ $id ] );
		return true;
	}

	public function get_register_widgets() {
		return $this->_register_widgets;
	}

	public function get_widget( $id ) {
		$widgets = $this->get_register_widgets();

		if ( ! isset( $widgets[ $id ] ) ) {
			return false;
		}
		return $widgets[ $id ];
	}

	public function get_register_widgets_data() {
		$data = [];
		foreach ( $this->get_register_widgets() as $widget ) {
			$data[ $widget->get_id() ] = $widget->get_data();
		}
		return $data;
	}

	public function ajax_render_widget() {
		ob_start();

		if ( empty( $_POST['post_id'] ) ) {
			wp_send_json_error( new \WP_Error( 'no_post_id', 'No post_id' ) );
		}

		// Override the global $post for the render
		$GLOBALS['post'] = get_post( (int) $_POST['post_id'] );

		$data = json_decode( stripslashes( html_entity_decode( $_POST['data'] ) ), true );

		$widget = $this->get_widget( $data['widgetType'] );
		if ( false !== $widget ) {
			$data['settings'] = $widget->get_parse_values( $data['settings'] );
			$widget->render_content( $data['settings'] );
		}

		$render_html = ob_get_clean();

		wp_send_json_success(
			[
				'render' => $render_html,
			]
		);
	}

	public function ajax_get_wp_widget_form() {
		$widget_type = $_POST['widget_type'];
		$widget_obj = $this->get_widget( $widget_type );

		if ( ! $widget_obj instanceof Widget_WordPress ) {
			die;
		}

		$data = json_decode( stripslashes( html_entity_decode( $_POST['data'] ) ), true );
		echo $widget_obj->get_form( $data );
		die;
	}

	public function render_widgets_content() {
		foreach ( $this->get_register_widgets() as $widget ) {
			$widget->print_template();
		}
	}

	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );

		add_action( 'wp_ajax_elementor_render_widget', [ $this, 'ajax_render_widget' ] );
		add_action( 'wp_ajax_elementor_editor_get_wp_widget_form', [ $this, 'ajax_get_wp_widget_form' ] );
	}
}
