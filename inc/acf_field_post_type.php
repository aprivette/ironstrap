<?php

class IronStrap_ACF_Post_Type extends acf_field
{
	function __construct()
	{
		$this->name = 'post_type';
		$this->label = __('Post Type Select', 'acf-post_type');
		$this->category = __("Relational",'acf');
		$this->l10n = array(
			'error'	=> __('Error!', 'acf-post_type'),
		);
		$this->defaults = array(
			'post_type'	=> '',
		);
		
    	parent::__construct();
	}
	
	function render_field($field)
	{
		$field = array_merge($this->defaults, $field);
		
		$post_types = get_post_types( array(
			'public' => true,
		), 'objects' );
		
		$checked = array();
		
		echo '<ul class="checkbox_list checkbox">';
		if (!empty($field['value']) && is_array($field['value'])) {
			foreach( $field['value'] as $val) {
				$checked[$val] = 'checked="checked"';
			}
		}
		
		echo '<input name="'.$field['name'].'" type="hidden">';
		foreach($post_types as $post_type) {
		?>
			<li><label><input type="checkbox" <?php echo(isset($checked[$post_type->name])) ? $checked[$post_type->name] : null; ?> class="<?php echo $field['class']; ?>" name="<?php echo $field['name']; ?>[]" value="<?php echo $post_type->name; ?>"><?php echo $post_type->labels->name; ?></label></li>
		<?php
		}
		echo '</ul>';
	}
}

new IronStrap_ACF_Post_Type();