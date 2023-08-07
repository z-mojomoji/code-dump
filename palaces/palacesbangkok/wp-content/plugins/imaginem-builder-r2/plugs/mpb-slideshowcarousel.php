<?php
/**
 * Slideshowcarousel
 *
 */
if(!class_exists('em_slideshowcarousel')) {
	class em_slideshowcarousel extends AQ_Block {
		public function __construct() {
			$block_options = array(
				'pb_block_icon' => 'simpleicon-screen-desktop',
				'pb_block_icon_color' => '#836953',
				'name' => __('Slideshow','mthemelocal'),
				'size' => 'span12',
				'tab' => __('Media','mthemelocal'),
				'desc' => __('Add a Slideshow Carousel','mthemelocal')
			);

			$mtheme_shortcodes['slideshowcarousel'] = array(
				'no_preview' => true,
				'shortcode_desc' => __('Generate a Slideshow', 'mthemelocal'),
				'params' => array(
					'pb_image_ids' => array(
						'type' => 'images',
						'label' => __('Add images', 'mthemelocal'),
						'desc' => __('Add images', 'mthemelocal'),
					),
					'thumbnails' => array(
						'type' => 'select',
						'label' => __('Dispay thumbnails', 'mthemelocal'),
						'desc' => __('Display thumbnails', 'mthemelocal'),
						'options' => array(
							'true' => __('Yes','mthemelocal'),
							'false' => __('No','mthemelocal')
						)
					),
					'autoplay' => array(
						'type' => 'select',
						'std' => 'false',
						'label' => __('Autoplay slideshow', 'mthemelocal'),
						'desc' => __('Autoplay slideshow', 'mthemelocal'),
						'options' => array(
							'false' => __('No','mthemelocal'),
							'true' => __('Yes','mthemelocal')
						)
					),
					'displaytitle' => array(
						'type' => 'select',
						'std' => 'false',
						'label' => __('Dispay title', 'mthemelocal'),
						'desc' => __('Display thumbnails', 'mthemelocal'),
						'options' => array(
							'true' => __('Yes','mthemelocal'),
							'false' => __('No','mthemelocal')
						)
					)
				),
				'shortcode' => '[slideshowcarousel lightbox="false" autoplay="{{autoplay}}" displaytitle="{{displaytitle}}" thumbnails="{{thumbnails}}" pb_image_ids="{{pb_image_ids}}"]',
				'popup_title' => __('Insert Slideshow', 'mthemelocal')
			);

			$this->the_options = $mtheme_shortcodes['slideshowcarousel'];

			parent::__construct('em_slideshowcarousel', $block_options);
		}

		public function form( $instance ) {
			$instance = $this->set_defaults($instance);
			$this->admin_enqueue();
			// $ids = implode( ',', $instance['ids'] );
			// $layouts = array(
			// 	'layout1' => 'Layout 1',
			// 	'layout2' => 'Layout 2',
			// 	'layout3' => 'Layout 3',
			// 	'layout4' => 'Layout 4',
			// );

			echo mtheme_generate_builder_form($this->the_options,$instance);
			?>
			
			<?php
		}

		// public function update( $new_instance, $old_instance ) {
		// 		$new_instance['ids'] = explode( ',', $new_instance['ids'] );
		// 	return parent::update( $new_instance, $old_instance );
		// }

		protected function admin_enqueue() {
			wp_register_script(
					'mtheme-gallery-selector-admin',
					mtheme_PLUGIN_URI . 'assets/js/blocks/mtheme-gallery-selector-admin.js',
					array('jquery'),'1',true
			);
			wp_enqueue_script( 'mtheme-gallery-selector-admin' );
		}

		protected function wp_enqueue() {

		}

		public function block( $instance ) {
			//$this->set_defaults( $instance );
			// if ( ! empty( $instance['ids'] ) )
			// 	echo mtheme_get_gallery( $instance['ids'], $instance['layout'] );
			extract($instance);

			wp_enqueue_script ('owlcarousel');
			wp_enqueue_style ('owlcarousel_css');

			$shortcode = mtheme_dispay_build($this->the_options,$block_id,$instance);
			//echo $shortcode;
			echo do_shortcode($shortcode);
		}

		protected function set_defaults($instance) {
			return wp_parse_args( $instance, array('ids' => array(), 'layout' => 'layout1') );
		}
	}
}