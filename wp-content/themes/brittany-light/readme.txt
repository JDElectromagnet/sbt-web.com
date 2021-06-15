=== Brittany Light ===
Theme Name: Brittany Light
Theme URI: https://www.cssigniter.com/themes/brittany-light/
Author URI: https://www.cssigniter.com/
Author: The CSSIgniter Team
Contributors: cssigniterteam
Stable tag: 1.3
Requires PHP: 5.6
Requires at least: 5.2
Tested up to: 5.4.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Fashion / Lifestyle Blogging theme for WordPress.

Theme page: https://www.cssigniter.com/themes/brittany-light/
Demo: https://www.cssigniter.com/preview/brittany-light/

Brittany Light WordPress Theme, Copyright 2016 CSSIgniter LLC
Brittany Light is distributed under the GNU General Public License, version 2

== Installation ==

1. In your dashboard, go to *Appearance > Themes* and click the *Add New* button.
2. Click *Upload Theme* and then click *Browse... / Choose File...*.
3. Select the theme's .zip file. Then click *Install Now*.
3. Click Activate to use your new theme right away.

== Documentation ==

Please visit https://www.cssigniter.com/docs/brittany-light/

== Frequently Asked Questions ==

= I have a problem. Where can I get support? =
We are providing support for this theme, via the WordPress Theme forums at https://wordpress.org/support/theme/brittany-light

== License Information ==

Brittany Light WordPress Theme, Copyright 2016 CSSIgniter LLC
Brittany Light is distributed under the terms of the GNU GPL v2

Brittany Light WordPress Theme incorporates code from Bootstrap, Copyright 2011-2105 Twitter, Inc - http://getbootstrap.com/
Bootstrap is distributed under the terms of The MIT License (MIT) - https://github.com/twbs/bootstrap/blob/master/LICENSE

All theme files (unless otherwise stated) are distributed under the GNU General Public License v2 (GPLv2)

The following assets / components (GPL or GPL compatible) are used:

* Isotope v2.2.2 - http://isotope.metafizzy.co
	Copyright 2015, Metafizzy
	Released under the GPLv3 license for open source use - http://www.gnu.org/licenses/gpl-3.0.en.html
* FitVids v1.1 - http://fitvidsjs.com/
	Copyright 2013, Chris Coyier, Dave Rupert
	Released under the WTFPL license - http://sam.zoy.org/wtfpl/
* Flexslider v2.5.0 - https://www.woothemes.com/flexslider/
	Copyright 2012, WooThemes
	Released under the GPLv2 license - http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
* Magnific Popup v1.0.0 - http://dimsemenov.com/plugins/magnific-popup/
	Copyright 2014 Dmitry Semenov
	Released under the MIT license - http://opensource.org/licenses/MIT
* jQuery mmenu v5.5.3 - http://mmenu.frebsite.nl
	Copyright Fred Heusschen
	Released under the MIT license - http://opensource.org/licenses/MIT
* Slick 1.5.7 - http://kenwheeler.github.io
	Copyright 2014 Ken Wheeler
	Released under the MIT license - http://opensource.org/licenses/MIT
* jQuery Superfish Menu Plugin v1.7.5 - http://users.tpg.com.au/j_birch/plugins/superfish/
	Copyright 2014 Joel Birch
	Dual licensed under the MIT and GPL licenses - http://www.opensource.org/licenses/mit-license.php - http://www.gnu.org/licenses/gpl.html
* normalize.css v3.0.1 - http://necolas.github.io/normalize.css/
	Copyright Nicolas Gallagher, Jonathan Neal
	Released under the MIT license - http://opensource.org/licenses/MIT
* Font Awesome 4.7.0 - http://fontawesome.io
	Copyright Dave Gandy
	Font files licensed under SIL OFL 1.1 - http://scripts.sil.org/OFL
	CSS files licensed under the MIT license - http://opensource.org/licenses/MIT

The following photographs appear in the theme's screenshot:

* https://unsplash.com/photos/hHcHf4mOFgk
	by Brooke Cagle
	Released under the CC0 license - https://creativecommons.org/publicdomain/zero/1.0/legalcode
* https://unsplash.com/photos/cj9srVaGXsU
	by Josue Bieri
	Released under the CC0 license - https://creativecommons.org/publicdomain/zero/1.0/legalcode


== Changelog ==

= 1.3 =
* Added onboarding page, accessible via Appearance > About Brittany Light.
* Removed direct links to sample content.
* Removed backward compatibility for wp_body_open().
* Added Skip link to main content.

= 1.2 =
* Added call to wp_body_open() (since WP v5.2) with backward compatibility for earlier versions.
* Remove Vine & Google+ Social Icons.
* Added Social icons: Snapchat, behance, youtube, etsy, github, medium, mixcloud, paypal, slack, skype, xbox, playstation, Trip Advisor & Telegram.
* Removed unneeded function brittany_light_sanitize_custom_css()
* Headings in comment content had a top border
* Pingbacks and trackbacks appeared too far apart
* Appearance issue with separator position when too many categories on post meta
* Tags appearing very close to enclosing border when there are too many of them
* ADDED: Tables & lists needed some margin in comment content
* FIXED: Layout issue when posts had no categories
* FIXED: Some widgets hda padding and a white background applied, which was not visible in the footer, making them appear smaller than their container.
* UPDATED: Logo is now a <div> instead of an <h1>
* UPDATED: Blog listing titles are <h2> (single posts/pages unaffected and still <h1>)
* Add minified style versions.
* Added Page builder template.
* Escaped some variables, formatting, coding standards, translator comments, etc.
* Font awesome updated to version 5.
* Added helpful main menu fallback.
* Use get_theme_file_path() and get_theme_file_uri() where possible, for better child theme compatibility.
* Scripts/styles version numbers now follow the theme's version unless WP_DEBUG or SCRIPT_DEBUG are enabled, for easier cache busting.
* Escaped, sanitized and reformatted widgets.
* Echo div.entry-tags only when a post has tags.
* Fixed no space between button and pre-footer widget.
* Focused radio buttons had a box shadow.
* Mobile menu did not show all options on long menu lists on mobile landscape modes
* Site’s header is now laid out using Flexbox
* Replaced all calls to brittany_light_get_image_src() with the functionally equivalent native wp_get_attachment_image_url().
* Comment form opt-in checkbox would wrongly get a .sr-only class.
* Widgets should ignore sticky posts.
* Denote sticky posts as "Featured".
* Fix styles for posts missing thumbnails
* Depended styles required by 'brittany-light-style' are now in under the handle 'brittany-light-dependencies'.
* Force term recount after import.

= 1.1.1 =
* Added styles for Gutenberg blocks.

= 1.1 =
* Fixed alpha-color-picker, when loaded by plugins it would break visually.
* Added support for One Click Demo Import.
* Added lang file header so that Poedit will recognise "translators:" comments.
* Fixed a condition that was erroneously placed inside a count() call, triggering a warning in PHP >= 7.2.x
* Page template-bound metaboxes, wouldn't behave correctly in Gutenberg mode (where applicable).
* Post format-bound metaboxes (where applicable) now work properly with Gutenberg.
* Admin notice regarding the sample content, wouldn't persist its state when dismissed from within the block editor.

= 1.0.4 =
* Fixed issue where the header search form wouldn't appear if there were many social icons on the header, forcing it to span multiple lines.
* Header search form now uses get_search_form()
* Updated screenshot and added license information for visible images.
* Fixed labels in brittany_light_metabox_*() family of functions by running them through wp_kses().
* Fixed escaping on social links' "target" attribute.

= 1.0.3 =
* Logo padding bottom wouldn't get applied if a respective top padding wasn't defined.
* Font Awesome v4.7.0
* Escaped some attributes.
* Reformatted around a bit.
* Revised list of theme tags. Added 'custom-logo' tag and re-ordered the rest (for easier comparison) according to Theme Review Team's Handbook list of tags.

= 1.0.2 =
* Implemented native 'custom-logo' functionality.
* Left only one link on the footer.
* Fixed loading style.css using get_stylesheet_uri(), following practice from http://justintadlock.com/archives/2014/11/03/loading-parent-styles-for-child-themes
* Fixed pagination to utilize `the_posts_pagination()` and `the_posts_navigation()` functions.
* Removed top-level customizer links, as well as the related script that was injecting the markup.
* Removed social sharing functionality as it's plugin territory.
* Sample content link now links to the related documentation section.

= 1.0.1 =
* Latest Posts widget would throw a warning when initialised from the widgets page (not in customizer).
* Improved sanitization.
* Updated Font Awesome to v4.6.3
* Fixed issue where the Theme Check plugin would mistakenly believe that the theme was hiding the admin bar.

= 1.0 =
* Initial release
