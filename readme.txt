=== Plugin Name ===
Contributors: amattie
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Tags: travel, oh hey world
Requires at least: 3.4
Tested up to: 4.4.2
Stable tag: 1.0.2

Oh Hey World is the easiest way to share your safe arrival in a new city with those who care. This plugin compliments your Oh Hey World profile.

== Description ==

This plugin allows WordPress to embed your current geographic location directly into a blog. You MUST have a Oh Hey World account to use this plugin.

With the Oh Hey World plugin, travel bloggers can quickly and easily keep their current location up to date using what WordPress calls "shortcodes" and into their sidebars using the included widget. Rather than manually changing text within the theme to update your location, you can check-in when you arrive at a new location with one click and that will automatically update the location listed on your travel blog, share your location on Twitter and Facebook, and email or text your parents, significant other, and/or close friends.

In addition to the sidebar widget, there are two shortcodes:

* [currentlocation user_slug="username"] - Pulls in the pure text of your latest check-in on Oh Hey World. For example, if you are checked-in to New York, the text returned will be "New York, New York, United States".
* [currentbadge user_slug="username"] - Pulls in the widebar widet and embeds it inside of a page or post.

Important Notes

* Your user name can be found in the URL structure of your profile. For the profile http://www.ohheyworld.com/drewmeyers/profile, the user name is "drewmeyers"
* Your web host must be running at least PHP 5.2. PHP 5.2 has been out for more than 3 years at this point, so if they aren’t using PHP 5.2, they’re quite a ways behind the times. This is almost never an issue nowadays.
* You must be using at least WordPress 3.4.

Note: If you're searching for oheyworld, ohheyworld, ohh hey world, or ohhheyworld this is the plugin you're probably looking for.

For more information, check out [Oh Hey World](http://www.ohheyworld.com/).

This plugin is funded and supported by Horizon (http://www.horizonapp.co). If you'd like to sponsor this plugin, please email info@horizonapp.co.
Development provided by Caffeine Interactive.

== Installation ==

How to install the plugin and get it working.

1. Click add new plugin and search for & add "Oh Hey World" (or upload `oh-hey-world.zip to the `/wp-content/plugins/` directory).
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Grab your user name from your Oh Hey World profile. If the link to your profile is http://www.ohheyworld.com/drewmeyers/profile, your profile name is "drewmeyers"
1. Insert the sidebar widget into your sidebar or use one of the two short codes to insert the text into your about page (or any other post or page).
1. Update your location on Oh Hey World every time you change locations by checking-in on the site at your current location.

== Frequently Asked Questions ==

= How long does it take for my travel blog to update once I check-in on Oh Hey World? =

The Oh Hey World plugin caches the results for 60 seconds. If a recent check-in is not updating on your blog quickly, it's likely the result of a plugin (such as WP Super Cache) that caches your site to improve load time. To resolve, adjust your caching settings.

= Can I style the widget with custom CSS? =

The widget currently automatically takes on the CSS of your WordPress theme. Longer term  - we know some people want custom CSS controls, and it’s on our list of enhancements we’re considering.

= What if the plugin doesn’t work with my theme? =

We’ve worked hard to make this plugin work on as many themes as possible, but it’s impossible for us to ensure it works with every single theme ever created. Unfortunately we can’t troubleshoot code on individual sites at this time. That said, please leave feedback via our feedback form.

= How can I suggest improvements or report bugs with the plugin? =

Please submit them via the feedback page on Oh Hey World.

== Screenshots ==

1. An example of a sidebar widget on Where SideWalks End.
2. An example of a short code used on A Little Adrift.

== Changelog ==

= 1.0.2 =

* Sidebar logo change.

= 1.0.1 =

* Updating widget logo and removing beta status.

= 1.0 =
* Added ability to hide the flag and the days on road.
* Option to display different size flags
