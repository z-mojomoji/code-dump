<?php
class mtheme_Social_Widget extends WP_Widget {
	function mtheme_Social_Widget() {
		$widget_ops = array( 'classname' => 'MSocial_Widget', 'description' => __('Generate social links', 'mthemelocal') );
		$control_ops = array('width' => 600, 'height' => 350);
		parent::__construct( 'msocial-widget', MTHEME_WIDGET_PREFIX . __(' - Social Widget', 'mthemelocal'), $widget_ops,$control_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
	
		$title = apply_filters('widget_title', $instance['title'] );
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		$imgcaption = $instance['imgcaption'];
		$call_us = $instance['call_us'];
		$call_us_link = $instance['call_us_link'];	

		$icon_size = $instance['icon_size'];
		$animation = $instance['animation'];
		$icon_opacity = $instance['icon_opacity'];
		$newtab = $instance['newtab'];
		$nofollow = $instance['nofollow'];
		$alignment = $instance['alignment'];
		
		$socials = array(
			'custom1name' => 'RSS Link',
			'custom1icon' => 'rss',
			'custom2name' => 'Facebook',
			'custom2icon' => 'facebook',
			'custom3name' => 'Twitter',
			'custom3icon' => 'twitter',
			'custom4name' => 'Dribbble',
			'custom4icon' => 'dribbble',
			'custom5name' => 'Google+',
			'custom5icon' => 'google-plus',
			'custom6name' => 'LinkedIn',
			'custom6icon' => 'linkedin',
			'custom7name' => 'Tumblr',
			'custom7icon' => 'tumblr',
			'custom8name' => 'Youtube',
			'custom8icon' => 'youtube',
			'custom9name' => 'Pinterest',
			'custom9icon' => 'pinterest',
			'custom10name' => 'Flickr',
			'custom10icon' => 'flickr',
			'custom11name' => 'Skype',
			'custom11icon' => 'skype',
			'custom12name' => 'Instagram',
			'custom12icon' => 'instagram',
			'custom13name' => 'Behance',
			'custom13icon' => 'behance',
			'custom14name' => 'Vimeo',
			'custom14icon' => 'vimeo-square',
			'custom15name' => 'Vine',
			'custom15icon' => 'vine',
			'custom16name' => '500px',
			'custom16icon' => '500px');

		for ($social_count=1; $social_count <=16; $social_count++ ) {
			$customicon[$social_count] = $socials['custom'.$social_count.'icon'];
			$customname[$social_count] = $socials['custom'.$social_count.'name'];
			$customurl[$social_count] = $instance['custom'.$social_count.'url'];
		}
	
		if($icon_size == 'default') {
			$icon_size = '16';
		}
		
		$icon_opacity = '0.9';
		$icon_ie = $icon_opacity * 100;
		$nofollow = '';
		if ($newtab == 'yes') {
			$newtab = "target=\"_blank\"";
			} else {
			$newtab = '';
			}
		$alignment = '';

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
		
		echo '<div class="social-header-wrap">';
		echo '<ul>';
		for ($social_count=1; $social_count <=16; $social_count++ ) {
			// Custom Icon 1
			if ( $customurl[$social_count] != '' && $customname[$social_count] != '' && $customicon[$social_count] != '' ) {
				?>
				<li class="social-icon">
				<a class="ntips" title="<?php echo $customname[$social_count]; ?>" href="<?php echo $customurl[$social_count]; ?>" <?php echo $nofollow; ?> <?php echo $newtab; ?>>
					<i class="fa fa-<?php echo $customicon[$social_count]; ?>"></i>
				</a>
				</li>
				<?php
			} else {
				echo ''; //If no URL inputed
			}
		
		}

			
		// Call us
		if ( $call_us != '' && $call_us != ' ' ) {
			?>
			<li class="contact-text"><i class="fa fa-phone-square"></i> &nbsp; 
			<?php if ($call_us_link<>"") { echo '<a href="'.$call_us_link.'">'; }?>
			<?php echo $call_us; ?>
			<?php if ($call_us_link<>"") { echo '</a>'; }?>
			</li>
			<?php
		}
		echo '</ul>';
		echo '</div>';
	
		/* After widget (defined by themes). */
		
		echo $after_widget;
	}

	/* Update the widget settings  */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip Tags For Text Boxes */
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['imgcaption'] = $new_instance['imgcaption'];
		$instance['icon_size'] = $new_instance['icon_size'];
		$instance['animation'] = $new_instance['animation'];
		$instance['icon_opacity'] = $new_instance['icon_opacity'];
		$instance['newtab'] = $new_instance['newtab'];
		$instance['nofollow'] = $new_instance['nofollow'];
		$instance['alignment'] = $new_instance['alignment'];
		$instance['call_us'] = strip_tags( $new_instance['call_us'] );
		$instance['call_us_link'] = strip_tags( $new_instance['call_us_link'] );
		
		for ($social_count=1; $social_count <=16; $social_count++ ) {
			$instance['custom'.$social_count.'name'] = strip_tags( $new_instance['custom'.$social_count.'name'] );
			$instance['custom'.$social_count.'icon'] = strip_tags( $new_instance['custom'.$social_count.'icon'] );
			$instance['custom'.$social_count.'url'] = strip_tags( $new_instance['custom'.$social_count.'url'] );
		}
		
		
		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 
			'title' => __('Follow Us!', 'mthemelocal'),
			'text' => '',
			'imgcaption' => __('Follow Us on', 'mthemelocal'), 
			'icon_size' => 'default',
			'icon_opacity' => 'default',
			'newtab' => 'yes',
			'nofollow' => 'on',
			'alignment' => 'center',
			'call_us' => '',
			'call_us_link' => '',
			'custom1name' => 'RSS Link',
			'custom1icon' => 'rss',
			'custom1url' => '',
			'custom2name' => 'Facebook',
			'custom2icon' => 'facebook',
			'custom2url' => '',
			'custom3name' => 'Twitter',
			'custom3icon' => 'twitter',
			'custom3url' => '',
			'custom4name' => 'Dribbble',
			'custom4icon' => 'dribbble',
			'custom4url' => '',
			'custom5name' => 'Google+',
			'custom5icon' => 'google-plus',
			'custom5url' => '',
			'custom6name' => 'LinkedIn',
			'custom6icon' => 'linkedin',
			'custom6url' => '',
			'custom7name' => 'Tumblr',
			'custom7icon' => 'tumblr',
			'custom7url' => '',
			'custom8name' => 'Youtube',
			'custom8icon' => 'youtube',
			'custom8url' => '',
			'custom9name' => 'Pinterest',
			'custom9icon' => 'pinterest',
			'custom9url' => '',
			'custom10name' => 'Flickr',
			'custom10icon' => 'flickr',
			'custom10url' => '',
			'custom11name' => 'Skype',
			'custom11icon' => 'skype',
			'custom11url' => '',
			'custom12name' => 'Instagram',
			'custom12icon' => 'instagram',
			'custom12url' => '',
			'custom13name' => 'Behance',
			'custom13icon' => 'behance',
			'custom13url' => '',
			'custom14name' => 'Vimeo',
			'custom14icon' => 'vimeo-square',
			'custom14url' => '',
			'custom15name' => 'Vine',
			'custom15icon' => 'vine',
			'custom15url' => '',
			'custom16name' => '500px',
			'custom16icon' => '500px',
			'custom16url' => ''
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<div>
		<h2>Social Settings</h2>

<!-- Open in new tab: Dropdown -->
		<p>
			<label for="<?php echo $this->get_field_id( 'newtab' ); ?>"><?php _e('Open in new tab?', 'mthemelocal'); ?></label><br />
			<select class="widefat" id="<?php echo $this->get_field_id( 'newtab' ); ?>" name="<?php echo $this->get_field_name( 'newtab' ); ?>">
			<option value="yes" <?php if($instance['newtab'] == 'yes') { echo 'selected'; } ?>>Yes</option>
			<option value="no" <?php if($instance['newtab'] == 'no') { echo 'selected'; } ?>>No</option>
			</select>
		</p>

		
		<h2>Contact Text</h2>
		<p>Fill this with any contact info you like. eg. Call us: +123 456 7890</p>
		<!-- Call us -->
		<p>
			<label for="<?php echo $this->get_field_id( 'call_us' ); ?>"><?php _e('Contact text:', 'mthemelocal'); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'call_us' ); ?>" name="<?php echo $this->get_field_name( 'call_us' ); ?>" value="<?php echo esc_attr($instance['call_us']); ?>" />
		</p>
		<!-- Call us link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'call_us_link' ); ?>"><?php _e('Contact text link:', 'mthemelocal'); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'call_us_link' ); ?>" name="<?php echo $this->get_field_name( 'call_us_link' ); ?>" value="<?php echo esc_attr($instance['call_us_link']); ?>" />
		</p>		

		<h2>Social Links</h2>
		<!-- Custom Service 1: Text Input -->
		
		<?php
		for ($social_count=1; $social_count <=16; $social_count++ ) {
		?>
		<p>
			<strong><h2><?php echo $social_count; ?></h2>
			<label for="<?php echo $this->get_field_id( 'custom'.$social_count.'name' ); ?>"><?php echo $defaults['custom'.$social_count.'name']; ?>:</strong> URL</label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'custom'.$social_count.'url' ); ?>" name="<?php echo $this->get_field_name( 'custom'.$social_count.'url' ); ?>" value="<?php echo esc_attr($instance['custom'.$social_count.'url']); ?>" />
		</p>
		<?php
		}
		?>
		
		</div>
		

	<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("mtheme_Social_Widget");'));
?>
