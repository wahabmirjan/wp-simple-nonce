=== WP SimpleNonce ===
Contributors: CalEvans < cal@calevans.com>, Wahab Mirjan <wahab.mirjan@gorilla.solutions>
Tags: nonce
Requires at least: 3.5.0
Tested up to: 6.0.2
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A very simple NONCE for WordPress developers.

== Description ==

A NONCE is a Number Used Once. They are very useful for preventing CSRF. They are also useful in preventing users from doing stupid things like submitting a form more than once. (Whether maliciously or accidentally.)


WordPress has a very good NONCE system built into it's core, but it is not a true NONCE. This is a true NONCE. You can create easily create one. Then you add it to a form or URL. When you get it back, you check it. NONCEs can only be checked once. Once you've tested it, the NONCE is destroyed so that it can't ever be used again.

This plugin does not override the existing Wordpress NONCE system.

This plugin does not have an admin interface. It is intended for developers only.


== Installation ==

1. Upload `wp-simple-nonce` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create a NONCE with `$myNonce = WPSimpleNonce::createNonce('myNonce');`
1. Check a NONCE with `$result = WPSimpleNonce::checkNonce($myNonce['name'],$myNonce['value']);`


== Changelog ==

= 1.0 =
* Initial release
= 1.1 =
* Removed the dependency on wp-session-manager
= 1.2 =
* Bug fixes
= 1.3 =
* Updated readme files
* Removed references to Travis CI
= 1.4 =
* Fixed clearing NONCEs
* Fixed references to deprecated code
= 1.5 =
* Fixed clearing NONCEs
