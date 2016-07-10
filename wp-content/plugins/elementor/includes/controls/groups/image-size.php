<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Group_Control_Image_size extends Group_Control_Base {

	public static function get_type() {
		return 'image-size';
	}

	protected function _get_child_default_args() {
		return [
			'include' => [],
			'exclude' => [],
		];
	}

	private function _get_image_sizes() {
		$wp_image_sizes = get_intermediate_image_sizes();

		$args = $this->get_args();

		if ( $args['include'] ) {
			$wp_image_sizes = array_intersect( $wp_image_sizes, $args['include'] );
		} elseif ( $args['exclude'] ) {
			$wp_image_sizes = array_diff( $wp_image_sizes, $args['exclude'] );
		}

		$image_sizes = [];

		foreach ( $wp_image_sizes as $image_size ) {
			$image_sizes[ $image_size ] = ucwords( str_replace( '_', ' ', $image_size ) );
		}

		$image_sizes['full'] = _x( 'Full', 'Image Size Control', 'elementor' );

		if ( ! empty( $args['include']['custom'] ) || ! in_array( 'custom', $args['exclude'] ) ) {
			$image_sizes['custom'] = _x( 'Custom', 'Image Size Control', 'elementor' );
		}

		return $image_sizes;
	}

	protected function _get_controls( $args ) {
		$controls = [];

		$image_sizes = $this->_get_image_sizes();

		// Get the first item for default value
		$default_value = array_keys( $image_sizes );
		$default_value = array_shift( $default_value );

		$controls['size'] = [
			'label' => _x( 'Image Size', 'Image Size Control', 'elementor' ),
			'type' => Controls_Manager::SELECT,
			'options' => $image_sizes,
			'default' => $default_value,
		];

		if ( isset( $image_sizes['custom'] ) ) {
			$controls['custom_dimension'] = [
				'label' => _x( 'Image Dimension', 'Image Size Control', 'elementor' ),
				'type' => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __( 'You can crop the original image size to any custom size. You can also set a single value for height or width in order to keep the original size ratio.', 'elementor' ),
				'condition' => [
					'size' => [ 'custom' ],
				],
				'separator' => 'none',
			];
		}

		return $controls;
	}

	public static function get_attachment_image_src( $attachment_id, $group_name, $instance ) {
		$size = $instance[ $group_name . '_size' ];

		if ( 'custom' !== $size ) {
			$attachment_size = $size;
		} else {
			// Use BFI_Thumb script
			// TODO: Please rewrite this code
			if ( ! function_exists( 'bfi_thumb' ) ) {
				require( ELEMENTOR_PATH . 'includes/libraries/bfi-thumb/bfi-thumb.php' );
			}

			$custom_dimension = $instance[ $group_name . '_custom_dimension' ];

			$attachment_size = [
				'bfi_thumb' => true,
				'crop' => true,
			];

			$has_custom_size = false;
			if ( ! empty( $custom_dimension['width'] ) ) {
				$has_custom_size = true;
				$attachment_size[0] = $custom_dimension['width'];
			}

			if ( ! empty( $custom_dimension['height'] ) ) {
				$has_custom_size = true;
				$attachment_size[1] = $custom_dimension['height'];
			}

			if ( ! $has_custom_size ) {
				$attachment_size = 'full';
			}
		}

		$image_src = wp_get_attachment_image_src( $attachment_id, $attachment_size );
		return ! empty( $image_src[0] ) ? $image_src[0] : '';
	}
}
