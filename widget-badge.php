<?php

class OHW_Widget_Badge extends WP_Widget {
	public function __construct() {
		parent::__construct('ohw_profile', 'Oh Hey World - Profile', array(
			'classname'   => 'ohw-profile',
			'description' => 'Oh Hey World widget that shows your travel profile'
		));
	}
	public function widget($args, $instance) {
		if (empty($instance['user-slug']))
			return;

		$title = apply_filters('widget_title', $instance['title']);

		$api_data = OHW_ApiClient::get_badge($instance['user-slug']);
		$api_user = $api_data->user;
		$api_location = $api_data->user->user_location->location->country;

		$flag_display_class = 'ohw-location-thumb-' . strtolower($instance['flag-display']);
		$hide_days_on_road = $instance['hide-days-on-road'] == 'on';

		echo $args['before_widget'];
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];

		?>
		<div class="ohw-w-profile-content">
			<div class="ohw-name-container">
				<span class="ohw-name"><?php echo htmlspecialchars($api_user->first_name) ?></span> is currently in:
			</div>
			<div class="ohw-location">
				<?php echo htmlspecialchars($api_user->user_location->location->city_state_country) ?>
			</div>
			<div class="ohw-location-thumb-container <?php echo htmlspecialchars($flag_display_class) ?>">
				<img src="http://<?php echo htmlspecialchars(OHW_API_HOST . $api_location->flag_url) ?>"
					class="ohw-location-thumb" />
			</div>
			<?php if (!$hide_days_on_road): ?>
			<div class="ohw-days-on-road-container">
				Days on the road:
				<span class="ohw-days-on-road"><?php echo htmlspecialchars($api_user->total_days_traveled); ?></span>
			</div>
			<?php endif; ?>
			<div class="ohw-profile-link-container">
				<a href="<?php echo htmlspecialchars(sprintf('http://%s/%s/profile', OHW_API_HOST, $instance['user-slug'])); ?>">
					More of <?php echo htmlspecialchars($api_user->first_name) ?>'s travels</a>
			</div>
			<div class="ohw-block-text-container">Supported by</div>
			<a href="http://www.horizonapp.co" target="_blank">
				<img src="<?php echo htmlspecialchars(plugins_url('img/logo-horizon.png', __FILE__)) ?>" class="horizon-logo" />
			</a>
			<div class="ohw-link-container">
				<a href="http://wordpress.org/extend/plugins/oh-hey-world/" class="ohw-link">Get this widget</a>
			</div>
		</div>
		<?php

		echo $args['after_widget'];
	}
	public function update($new_instance, $old_instance) {
		// don't bother cleaning up here. just escape everything on output.
		return $new_instance;
	}
	public function form($instance) {
		$field_id_title = htmlspecialchars($this->get_field_id('title'));
		$user_slug_title = htmlspecialchars($this->get_field_id('user-slug'));
		$flag_display_title = htmlspecialchars($this->get_field_id('flag-display'));
		$hide_days_on_road_title = htmlspecialchars($this->get_field_id('hide-days-on-road'));

		?>
		<p>
			<label for="<?php echo $field_id_title; ?>">Title:</label>
			<input class="widefat" id="<?php echo $field_id_title; ?>" name="<?php echo $this->get_field_name('title'); ?>"
				type="text" value="<?php echo htmlspecialchars($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo $user_slug_title; ?>">User Slug:</label>
			<input class="widefat" id="<?php echo $user_slug_title; ?>" name="<?php echo $this->get_field_name('user-slug'); ?>"
				type="text" value="<?php echo htmlspecialchars($instance['user-slug']); ?>" />
		</p>
		<p>
			<label for="<?php echo $flag_display_title; ?>">Flag Display:</label>
			<select class="widefat" id="<?php echo $flag_display_title; ?>"
				name="<?php echo $this->get_field_name('flag-display'); ?>">
				<option <?php selected($instance['flag-display'], 'None'); ?>>None</option>
				<option <?php selected($instance['flag-display'], 'Small'); ?>>Small</option>
				<option <?php selected($instance['flag-display'], 'Medium'); ?>>Medium</option>
				<option <?php selected($instance['flag-display'], 'Large'); ?>>Large</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $hide_days_on_road_title; ?>">Hide Days On Road?</label>
			<input type="checkbox" id="<?php echo $hide_days_on_road_title; ?>"
				name="<?php echo $this->get_field_name('hide-days-on-road'); ?>"
				<?php checked($instance['hide-days-on-road'], 'on') ?> />
		</p>
		<?php
	}
}
add_action('widgets_init', create_function('', 'register_widget("OHW_Widget_Badge");'));
