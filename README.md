WP Simple Nonce
===============

A very simple NONCE for WordPress developers.


Author
------
Cal Evans ([calevans](https://github.com/calevans))


Contributors
------------
Cal Evans ([calevans](https://github.com/calevans)), Wahab Mirjan ([wahabmirjan](https://github.com/wahabmirjan))


Description
-----------
A NONCE is a Number Used Once. They are very useful for preventing CSRF. They are also useful in preventing users from doing stupid things like submitting a form more than once. (Whether maliciously or accidentally.)

WordPress has a very good NONCE system built into it's core, but it is not a true NONCE. This is a true NONCE. You can create easily create one. Then you add it to a form or URL. When you get it back, you check it. NONCEs can only be checked once. Once you've tested it, the NONCE is destroyed so that it can't ever be used again.

This plugin does not override the existing Wordpress NONCE system.

This plugin does not have an admin interface. It is intended for developers only.


Important URLs
--------------
- A detailed usage description: https://pantheon.io/blog/nonce-upon-time-wordpress

- A presentation by Cal Evans: https://wordpress.tv/2014/09/15/cal-evans-nonce-upon-a-time-in-wordpress/



Changelog
---------

* 1.0
  * Initial release

* 1.1
  * Removed the dependency on wp-session-manager

* 1.2
  * Bug fixes

* 1.3
  * Updated readme files
  * Removed references to Travis CI

* 1.4
  * Fixed clearing NONCEs
  * Fixed references to deprecated code
