<?php
class mTheme_Event_Type_List_Widget extends WP_Widget {

	function mTheme_Event_Type_List_Widget() {
		$widget_ops = array('classname' => 'mtheme_event_type_widget', 'description' => __( 'Display all event work type categories.', 'mthemelocal') );
		parent::__construct('event_type_list',MTHEME_WIDGET_PREFIX .' - '. __('Event Type List', 'mthemelocal'), $widget_ops);
		
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Event Categories', 'mthemelocal') : $instance['title'], $instance, $this->id_base);
		$text = $instance['text'];
		
		echo $before_widget;
		if ( $title)
			echo $before_title . $title . $after_title;
		
		?>
		

<?php
//list terms in a given taxonomy
$taxonomy = 'eventsection';
$tax_terms = get_terms($taxonomy);
?>
<div class="portfolio-taxonomies">
<?php if(!empty($text)):?><p class="portfolio_widget_about"><?php echo $text;?></p><?php endif;?>
<ul>
<?php
if (is_array($tax_terms)) {
	foreach ($tax_terms as $tax_term) {
	echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View events in %s","mthemelocal" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
	}
}
?>
</ul>
</div>		
		
		<?php
		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$text = isset($instance['text']) ? esc_attr($instance['text']) : '';
	?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mthemelocal'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Intro text:', 'mthemelocal'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" ><?php echo $text; ?></textarea></p>
		
<?php
	}

}
add_action('widgets_init', create_function('', 'return register_widget("mTheme_Event_Type_List_Widget");'));