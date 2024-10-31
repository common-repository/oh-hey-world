<?php

class OHW_Shortcodes {
	public static function current_location($attrs) {
		$api_data = OHW_ApiClient::get_badge($attrs['user_slug']);
		return htmlspecialchars($api_data->user->user_location->location->city_state_country);
	}
	public static function location_badge($attrs) {
		$api_data = OHW_ApiClient::get_badge($attrs['user_slug']);
		$api_user = $api_data->user;
		$api_countries = $api_data->user->countries;
		
		ob_start();
		?>
		<div class="ohw-sc-currentlocation">
			<div class="ohw-name-container">
				<span class="ohw-name"><?php echo htmlspecialchars($api_user->first_name) ?></span> is currently in:
			</div>
			<div class="ohw-location">
				<?php echo htmlspecialchars($api_user->user_location->location->city_state_country) ?>
			</div>
			<div class="ohw-location-thumb-container">
				<img src="http://<?php echo htmlspecialchars(OHW_API_HOST . $api_countries[0]->country->flag_url) ?>"
					class="ohw-location-thumb" />
			</div>
			<div class="ohw-days-on-road-container">
				Days on the road:
				<span class="ohw-days-on-road"><?php echo htmlspecialchars($api_user->total_days_traveled); ?></span>
			</div>
			<div class="ohw-profile-link-container">
				<a href="<?php echo htmlspecialchars(sprintf('http://%s/%s/profile', OHW_API_HOST, $instance['user-slug'])); ?>">
					More of <?php echo htmlspecialchars($api_user->first_name) ?>'s travels</a>
			</div>
			<a href="http://www.ohheyworld.com">
				<img src="<?php echo htmlspecialchars(plugins_url('img/logo.png', __FILE__)) ?>" class="ohw-logo" />
			</a>
			<div class="ohw-link-container">
				<a href="http://wordpress.org/extend/plugins/oh-hey-world/" class="ohw-link">Get this widget</a>
			</div>
		</div>
		<?php
		
		return ob_get_clean();
	}
}
add_shortcode('locationbadge', array('OHW_Shortcodes', 'location_badge'));
add_shortcode('currentlocation', array('OHW_Shortcodes', 'current_location'));