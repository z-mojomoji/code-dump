<?php
/**
 * Thumbnails
 *
 */
class em_thumbnails extends AQ_Block {
	public function __construct() {
		$block_options = array(
			'pb_block_icon' => 'simpleicon-grid',
			'pb_block_icon_color' => '#77DD77',
			'name' => __('Thumbnails Grid','mthemelocal'),
			'size' => 'span12',
			'tab' => __('Media','mthemelocal'),
			'desc' => __('Generate a Thumbnail Grid','mthemelocal')
		);

		$mtheme_shortcodes['thumbnails'] = array(
			'no_preview' => true,
			'shortcode_desc' => __('Generate a Thumbnail grid using image attachments', 'mthemelocal'),
			'params' => array(
				'columns' => array(
					'type' => 'select',
					'label' => __('Grid Columns', 'mthemelocal'),
					'desc' => __('No. of Grid Columns', 'mthemelocal'),
					'options' => array(
						'4' => '4',
						'3' => '3',
						'2' => '2',
						'1' => '1'
					)
				),
				'format' => array(
					'type' => 'select',
					'label' => __('Image orientation format', 'mthemelocal'),
					'desc' => __('Image orientation format', 'mthemelocal'),
					'options' => array(
						'landscape' => __('Landscape','mthemelocal'),
						'portrait' => __('Portrait','mthemelocal'),
						'masonary' => __('Masonary','mthemelocal')
					)
				),
				'animated' => array(
					'type' => 'select',
					'label' => __('On scroll animated', 'mthemelocal'),
					'desc' => __('Display animated images while scrolling', 'mthemelocal'),
					'options' => array(
						'false' => __('No','mthemelocal'),
						'true' => __('Yes','mthemelocal')
					)
				),
				'gutter' => array(
					'type' => 'select',
					'label' => __('Gutter Space', 'mthemelocal'),
					'desc' => __('Gutter Space', 'mthemelocal'),
					'options' => array(
						'spaced' => __('Spaced','mthemelocal'),
						'nospace' => __('No Space','mthemelocal')
					)
				),
				'boxtitle' => array(
					'type' => 'select',
					'label' => __('Box Title', 'mthemelocal'),
					'desc' => __('Display title inside box on hover', 'mthemelocal'),
					'options' => array(
						'false' => __('No','mthemelocal'),
						'true' => __('Yes','mthemelocal')
					)
				),
				'title' => array(
					'type' => 'select',
					'label' => __('Dispay image title', 'mthemelocal'),
					'desc' => __('Display image title', 'mthemelocal'),
					'options' => array(
						'true' => __('Yes','mthemelocal'),
						'false' => __('No','mthemelocal')
					)
				),
				'description' => array(
					'type' => 'select',
					'label' => __('Display image description', 'mthemelocal'),
					'desc' => __('Display image description', 'mthemelocal'),
					'options' => array(
						'true' => __('Yes','mthemelocal'),
						'false' => __('No','mthemelocal')
					)
				),
				'pb_image_ids' => array(
					'type' => 'images',
					'label' => __('Add images', 'mthemelocal'),
					'desc' => __('Add images', 'mthemelocal'),
				),
			),
			'shortcode' => '[thumbnails gutter="{{gutter}}" animated="{{animated}}" boxtitle="{{boxtitle}}" columns="{{columns}}" format="{{format}}" title="{{title}}" pb_image_ids="{{pb_image_ids}}" description="{{description}}"]',
			'popup_title' => __('Insert Thumbnails Shortcode', 'mthemelocal')
		);

		$this->the_options = $mtheme_shortcodes['thumbnails'];

		parent::__construct('em_thumbnails', $block_options);
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
		// wp_register_script(
		// 		'mtheme-gallery-selector-admin',
		// 		mtheme_PLUGIN_URI . 'assets/js/blocks/mtheme-gallery-selector-admin.js',
		// 		array('jquery'),'2.0.3',true
		// );
		// wp_enqueue_script( 'mtheme-gallery-selector-admin' );
	}

	protected function wp_enqueue() {

	}

	public function block( $instance ) {
		//$this->set_defaults( $instance );
		// if ( ! empty( $instance['ids'] ) )
		// 	echo mtheme_get_gallery( $instance['ids'], $instance['layout'] );
		extract($instance);

		wp_enqueue_script ('isotope');

		$shortcode = mtheme_dispay_build($this->the_options,$block_id,$instance);
		//echo $shortcode;
		echo do_shortcode($shortcode);
	}

	protected function set_defaults($instance) {
		return wp_parse_args( $instance, array('ids' => array(), 'layout' => 'layout1') );
	}
}