<?php

class OHW_ApiClient {
	public static function get_badge($user_slug) {
		$api_url = sprintf('http://%s/api/users/%s/badge', OHW_API_HOST, $user_slug);
		$api_cache_key = md5($api_url);
		$api_data = get_transient($api_cache_key);
		
		if (empty($api_data)) {
			$api_resp = wp_remote_get($api_url);
			$api_data = json_decode($api_resp['body']);
			set_transient($api_cache_key, $api_data, 60);
		}
		
		return $api_data;
	}
}