<?php
/**
 * The class to register, update and display blocks
 *
 * It provides an easy API for people to add their own blocks
 * to the Aqua Page Builder
 *
 * @package Aqua Page Builder
 */

$aq_registered_blocks = array();

if(!class_exists('AQ_Block')) {
	class AQ_Block {

	 	//some vars
	 	var $id_base;
	 	var $block_options;
	 	var $instance;

	 	/* PHP4 constructor */
	 	// function AQ_Block($id_base = false, $block_options = array()) {
	 		// AQ_Block::__construct($id_base, $block_options);
	 	// }

	 	/* PHP5 constructor */
	 	function __construct($id_base = false, $block_options = array()) {
	 		$this->id_base = isset($id_base) ? strtolower($id_base) : strtolower(get_class($this));
	 		$this->name = isset($block_options['name']) ? $block_options['name'] : ucwords(preg_replace("/[^A-Za-z0-9 ]/", '', $this->id_base));
	 		$this->block_options = $this->parse_block($block_options);
	 	}

	 	/**
	 	 * Block - display the block on front end
	 	 *
	 	 * Sub-class MUST override this or it will output an error
	 	 * with the class name for reference
	 	 */
	 	function block($instance) {
	 		extract($instance);
	 		echo __('function AQ_Block::block should not be accessed directly. Output generated by the ', 'mthemelocal') . strtoupper($id_base). ' Class';
	 	}

	 	/**
	 	 * The callback function to be called on blocks saving
	 	 *
	 	 * You should use this to do any filtering, sanitation etc. The default
	 	 * filtering is sufficient for most cases, but nowhere near perfect!
	 	 */
	 	function update($new_instance, $old_instance) {

	 		$new_instance = array_map('stripslashes_deep', $new_instance);
	 		return $new_instance;
	 	}

		function stripslashes_deep($value)
		{
		    $value = is_array($value) ?
		                array_map('stripslashes_deep', $value) :
		                stripslashes($value);

		    return $value;
		}
	 	/**
	 	 * The block settings form
	 	 *
	 	 * Use subclasses to override this function and generate
	 	 * its own block forms
	 	 */
	 	function form($instance) {
	 		echo '<p class="no-options-block">' . __('There are no options for this block.', 'mthemelocal') . '</p>';
	 		return 'noform';
	 	}

	 	/**
	 	 * Form callback function
	 	 *
	 	 * Sets up some default values and construct the basic
	 	 * structure of the form. Unless you know exactly what you're
	 	 * doing, DO NOT override this function
	 	 */
	 	function form_callback($instance = array()) {
	 		//insert block options into instance
	 		$instance = is_array($instance) ? wp_parse_args($instance, $this->block_options) : $this->block_options;

		// echo '<pre>';
		// print_r($instance);
		// echo '</pre>';	 		

	 		//insert the dynamic block_id
	 		$this->block_id = 'aq_block_' . $instance['number'];
	 		$instance['block_id'] = $this->block_id;
	 		//display the block
	 		$this->before_form($instance);
	 		$this->form($instance);
	 		$this->after_form($instance);
	 	}

	 	/**
	 	 * Block callback function
	 	 *
	 	 * Sets up some default values. Unless you know exactly what you're
	 	 * doing, DO NOT override this function
	 	 */
	 	function block_callback($instance,$saved_blocks) {
	 		//insert block options into instance
	 		$instance = is_array($instance) ? wp_parse_args($instance, $this->block_options) : $this->block_options;

	 		//insert the dynamic block_id
	 		$this->block_id = 'aq_block_' . $instance['number'];
	 		$instance['block_id'] = $this->block_id;

	 		//display the block
	 		$this->before_block($instance);
	 		$this->block($instance);
	 		$this->after_block($instance);
	 	}

	 	/* assign default block options if not yet set */
	 	function parse_block($block_options) {
	 		$defaults = array(
	 			'id_base' => $this->id_base,	//the classname
	 			'order' => 0, 					//block order
	 			'name' => $this->name,			//block name
	 			'size' => 'span12',				//default size
	 			'title' => '',					//title field
	 			'parent' => 0,					//block parent (for blocks inside columns)
	 			'number' => '__i__',			//block consecutive numbering
	 			'first' => false,				//column first
	 			'block_slug' => '',
	 			'resizable' => 1,				//whether block is resizable/not
	 		);

	 		$block_options = is_array($block_options) ? wp_parse_args($block_options, $defaults) : $defaults;

	 		return $block_options;
	 	}


	 	//form header
	 	function before_form($instance) {
	 		extract($instance);
			add_thickbox();
	 		$title = isset($title) ? '' : '';
			$blockID = isset($blockID) ? $blockID : '';
			$blockNote = isset($blockNote) ? $blockNote : '';
			$imagedesc = isset($imagedesc) ? $imagedesc : '';
			$desc = isset($desc) ? $desc : '';
	 		$resizable = $resizable ? '' : 'not-resizable';
			$home = isset( $home ) ? $home : '';
			$block_slug = isset( $block_slug ) ? $block_slug : '';

			if ($resizable=='0') {
				$resizable='not-resizable';
			}

		// echo '<pre>';
		// print_r($instance);
		// echo '</pre>';	

			// The icons
			$pb_upload_icon = '<i class="fa fa-upload"></i>';
			$pb_edit_icon = '<i class="fa fa-edit"></i>';
			$pb_trash_icon = '<i class="fa fa-trash"></i>';
			$pb_duplicate_icon = '<i class="fa fa-files-o"></i>';

			$pb_plus_icon = '<i class="fa fa-plus"></i>';
			$pb_minus_icon = '<i class="fa fa-minus"></i>';
			
			$label_toggle_tag = 'data-toggle="tooltip" data-placement="top" title="'.$desc.'"';
			
	 		echo '<li id="template-block-'.$number.'" class="block block-'.$id_base.' '. $size .' '.$resizable.' '. $home .'" '.$label_toggle_tag.'>',
					'<dl class="block-bar">';
					echo '<ul class="block-controls">',
	 							//'<a class="block-edit" id="edit-'.$number.'" title="Edit Block" href="#block-settings-'.$number.'">Edit Block</a>',
	 							'<li class="block-control-actions cf"><a href="#" class="delete" data-tooltip="tooltip" data-original-title="'.__('Remove','mthemelocal').'">'.$pb_trash_icon.'</a></li>
								 <li class="block-control-actions cf"><a href="#" class="clone" data-tooltip="tooltip" data-original-title="'.__('Duplicate','mthemelocal').'">'.$pb_duplicate_icon.'</a></li>';
								if($instance['block_slug'] != 'container') {
									echo '<li class="block-control-actions cf"><a href="#block-settings-' . $number . '" class="block-edit" data-toggle="stackablemodal" data-tooltip="tooltip" data-original-title="'.__('Edit','mthemelocal').'" data-mblockid="'.$number.'" data-mblocktype="'.$id_base.'" data-keyboard="true">'.$pb_edit_icon.'</a></li>';
								} else {
									echo '<li class="block-control-actions cf"><a href="#my-column-content-'.$number.'" class="block-edit" data-toggle="stackablemodal" data-tooltip="tooltip" data-original-title="'.__('Edit Column','mthemelocal').'">'.$pb_edit_icon.'</a></li>';
								}
								echo '<li class="block-control-actions cf"><a href="#mtheme-pb-export-a-block" class="export" data-toggle="modal" data-tooltip="tooltip" data-original-title="'.__('Export Block','mthemelocal').'">'.$pb_upload_icon.'</a></li>';
	 							
								//'<li><a href="#TB_inline?width=800&height=550&inlineId=my-content-' . $number . '" title="' . $this->name . '" class="block-edit thickbox"><span></span></a></li>',
	 							
							echo '</ul>';
	 				echo	'<dt class="block-handle">',
	 						'<div class="block-icon" style="background-color:'.$pb_block_icon_color.';">',
	 							'<i class="'.$pb_block_icon.'"></i>',
	 						'</div>';
							if($instance['block_slug'] != 'container' && $resizable!='not-resizable') {
	 						echo '<ul class="resizeButtons">
		 							<li>
				 						<a href="#" class="resizePlus">'.$pb_plus_icon.'</a>
				 						<a href="#" class="resizeMinus">'.$pb_minus_icon.'</a>
	  								</li>
  								</ul>';
  							}
	 						echo '<div class="block-title">',
	 							$this->name,
	 						'</div>';
	 						echo '<div class="block-size">',
	 							substr($size, 4).'/12',		
	 						'</div>';
	 						echo '<span class="user-control-id">'.sanitize_title_with_dashes($blockID).'</span>';
	 						echo '<div class="blocknote-self">'.esc_html($blockNote).'</div>';
	 					echo '</dt>',
	 				'</dl>';
					if($instance['block_slug'] == 'container')
	 					echo '<div class="block-settings cf" id="block-settings-'.$number.'">';
					else
						echo '<div class="block-settings cf modal fade" id="block-settings-'.$number.'">';
	 				if($instance['block_slug'] == 'container')
	 					echo '<div id="my-content-'.$number.'">';
					else {
//						 echo '<div id="my-content-'.$number.'" style="display:none;">';
						?>
						  <div class="modal-dialog modal-lg" tabindex='-1'>
							<div class="modal-content em-control-modal">
							  <div class="modal-header">
								<div type="button" class="tb-close-icon" data-dismiss="modal" aria-hidden="true"></div>
								<h4 class="modal-title"><?php echo $this->name ?></h4>
								<label for="blockID"><?php _e('Block ID','mthemelocal'); ?></label>
								<div class="description_text"><?php _e('Enter a unique ID for this block.','mthemelocal'); ?></div>
								<input type="text" name="aq_blocks[<?php echo $block_id ?>][blockID]" value="<?php echo sanitize_title_with_dashes($blockID); ?>" class="blockID"/>

								<label for="blockNote"><?php _e('Block Note','mthemelocal'); ?></label>
								<div class="description_text"><?php _e('Add a note for self - to identify this block.','mthemelocal'); ?></div>
								<input type="text" name="aq_blocks[<?php echo $block_id ?>][blockNote]" value="<?php echo esc_attr($blockNote); ?>" class="blockNote"/>
							  </div>
							  <div class="modal-body" id="my-content-<?php echo $number ?>">
						<?php
					}
	 	}
 
	 	//form footer
	 	function after_form($instance) {
	 		extract($instance);

	 		$block_saving_id = 'aq_blocks[aq_block_'.$number.']';

	 			echo '<input type="hidden" class="id_base" name="'.$this->get_field_name('id_base').'" value="'.$id_base.'" />';
	 			echo '<input type="hidden" class="name" name="'.$this->get_field_name('name').'" value="'.$name.'" />';
	 			echo '<input type="hidden" class="order" name="'.$this->get_field_name('order').'" value="'.$order.'" />';
	 			echo '<input type="hidden" class="size" name="'.$this->get_field_name('size').'" value="'.$size.'" />';
	 			echo '<input type="hidden" class="parent" name="'.$this->get_field_name('parent').'" value="'.$parent.'" />';
	 			echo '<input type="hidden" class="number" name="'.$this->get_field_name('number').'" value="'.$number.'" />';
				?>
				</div>
				<div class="modal-footer">
					<button class="button-primary" type="button" data-dismiss="modal"><?php _e('Done','mthemelocal'); ?></button>
				</div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		  <?php
//	 		echo '</div>',
	 		echo '</li>';
	 	}

	 	/* block header */
	 	function before_block($instance) {
	 		extract($instance);
	 		$column_class = $first ? 'mtheme-first-cell' : 'mtheme-following-cell';
			$blockID = isset($blockID) ? $blockID : '';
			//print_a($instance);
			$classCol = '';

				$block_element_id_tag = '';
				if ( !empty($blockID) && isSet($blockID) ) {
					$block_element_id_tag = 'id="'.sanitize_title_with_dashes($blockID).'"';
				}
				// echo '<pre>';
				// print_r($instance);
				// echo '</pre>';

				if($instance['block_slug'] == 'container') {
					$block_element_id_tag='';
				}
				?>
				<div class="mtheme-cell-wrap" <?php echo $block_element_id_tag; ?>>
					<?php
	 					echo '<div id="mtheme-block-'.$number.'" class="mtheme-block mtheme-block-'.$id_base.' '.$size.' '.$column_class.' '. $classCol . '" data-width="'.substr($size, 4).'">';
					?>
			<?php
	 	}

	 	/* block footer */
	 	function after_block($instance) {
	 		extract($instance);
	 		echo '</div></div>';
	 	}

	 	function get_field_id($field) {
	 		$field_id = isset($this->block_id) ? $this->block_id . '_' . $field : '';
	 		return $field_id;
	 	}

	 	function get_field_name($field) {
	 		$field_name = isset($this->block_id) ? 'aq_blocks[' . $this->block_id. '][' . $field . ']': '';
	 		return $field_name;
	 	}

	}
}