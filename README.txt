=== Conditionally Load CF7 ===
Contributors: seezee
Donate link: https://messengerwebdesign.com/donate
Author URI: https://github.com/seezee
Plugin URI: https://wordpress.org/plugins/cf7-conditional-load/
Tags: contact form 7, performance, javascript, css, scripts
Requires at least: 4.7.0
Tested up to: 6.6.2
Requires PHP: 7.0
Stable tag: 1.0.46
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
GitHub Plugin URI: seezee/conditionally-load-cf7

Load Contact Form 7 & select CF7-related plugin scripts & styles only where needed.

== Description ==

In its default settings, Contact Form 7 loads its JavaScript and CSS stylesheet on every page. This slows page loading and taxes server and client resources. Use this plugin to control which pages the scripts load on.

NEW in v1.0.15: The plugin also prevents scripts and styles from the following plugins from loading. If you are using any other plugin that extends Contact Form 7 and loads its scripts on all pages, please open a support ticket and we will look into adding it.

* Contact Form 7 Conditional Fields
* Contact Form 7 Multi-Step Forms
* Contact Form CFDB7
* Drag and Drop Multiple File Upload — Contact Form 7

== Installation ==

### USING THE WORDPRESS DASHBOARD
1. Navigate to “Add New” in the plugins dashboard
2. Search for “Conditionally Load CF7”
3. Click “Install Now”
4. Activate the plugin on the Plugin dashboard
5. Go to Settings -> Conditionally Load CF7, upload your fonts, and configure the settings.
6. Additional settings are available on individual post and page edit screens.

### UPLOADING IN WORDPRESS DASHBOARD
1. Click the download button on this and save “conditionally-load-cf7.zip” to your computer
2. Navigate to “Add New” in the plugins dashboard
3. Navigate to the “Upload” area
4. Select “conditionally-load-cf7.zip” from your computer
5. Click “Install Now”
6. Activate the plugin in the Plugin dashboard
7. Go to Settings -> Conditionally Load CF7, upload your fonts, and configure the settings.
8. Additional settings are available on individual post and page edit screens.

### USING FTP
1. Download the Conditionally Load CF7 ZIP file
2. Extract the Conditionally Load CF7 ZIP file to your computer
3. Upload the “conditionally-load-cf7” directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard
5. Go to Settings -> Conditionally Load CF7, upload your fonts, and configure the settings.
6. Additional settings are available on individual post and page edit screens.

### DOWNLOAD FROM GITHUB
1. Download the plugin via [https://github.com/seezee/conditionally-load-cf7](https://github.com/seezee/conditionally-load-cf7)
2. Follow the directions for using FTP

== Frequently Asked Questions ==

### How may I help improve this plugin?

I’d love to hear your feedback. In particular, tell me about your experience configuring the plugin. Are the instructions clear? Do I need to reword them? Did I leave out something crucial? You get the drift.

### I’d like to do more

I’m looking for collaborators to improve the code. If you are an experienced Wordpress programmer, hit me up!

### I’d like to do even more

Feel free to send a donation to my [Paypal account](https://paypal.me/messengerwebdesign?locale.x=en_US). Or [buy me a beer](https://buymeacoff.ee/chrisjzahller) if you’re in town.

== Translations ==

* English: Default language, always included

Would you like to help translate Conditionally Load CF7 into your own language? [You can do that here!](https://translate.wordpress.org/projects/wp-plugins/cf7-conditional-load)

== Changelog ==

= 1.0.46 =

- 2024-10-23
- Tested up to WordPress 6.6.2

= 1.0.45 =

- 2024-08-29
- Fix license compatibility

= 1.0.44 =

- 2024-08-29
- Tested up to WordPress 6.6.1

= 1.0.43 =

- 2024-05-07
- Tested up to WordPress 6.5.3

= 1.0.42 =

- 2024-05-02
- Tested up to WordPress 6.5.2

= 1.0.41 =

- 2023-12-21
- Tested up to WordPress 6.4.2

= 1.0.40 =

* 2023-11-20
* Tested up to WordPress 6.4.1

= 1.0.39 =

* 2023-08-28
* Tested up to WordPress 6.3

= 1.0.38 =

* 2023-04-21
* Tested up to WordPress 6.2

= 1.0.37 =

* 2022-12-04
* Add google-recaptcha.js to parsed scripts

= 1.0.36 =

* 2022-11-23
* Tested up to WordPress 6.1.1

= 1.0.35 =

* 2022-07-24
* Tested up to WordPress 6.0.1

= 1.0.34 =

* 2022-05-27
* Tested up to WordPress 6.0.0

= 1.0.33 =

* 2022-04-05
* Tested up to WordPress 5.9.3

= 1.0.32 =

* 2022-03-11
* Tested up to WordPress 5.9.2

= 1.0.31 =

* 2022-02-22
* Tested up to WordPress 5.9.1

= 1.0.30 =

* 2022-01-26
* Tested up to WordPress 5.9

= 1.0.29 =

* 2022-01-20
* Add index.php

= 1.0.28 =

* 2022-01-10
* Tested up to WordPress 5.8.3

= 1.0.27 =

* 2021-11-11
* Tested up to WordPress 5.8.2

= 1.0.26 =

* 2021-08-20
* Tested up to WordPress 5.8.1

= 1.0.25 =

* 2021-08-19
* NEW FEATURE: Added checkbox to post and page edit screens
* NEW SETTING: Added archive unload option on main settings screen
* Various code optimizations

= 1.0.24 =

* 2021-07-23
* Tested up to WordPress 5.8

= 1.0.23 =

* 2021-05-20
* Added short description to README
* Updated plugin tags
* Updated header in main plugin file

= 1.0.22 =

* 2021-05-13
* Tested up to WordPress 5.7.2

= 1.0.21 =

* 2021-04-21
* Tested up to WordPress 5.7.1

= 1.0.20 =

* 2021-03-15
* Update README

= 1.0.19 =

* 2021-03-12
* Tested up to WordPress 5.7
= 1.0.18 =

* 2021-02-24
* BUGFIX: Delete debugging code from main plugin file

= 1.0.17 =

* 2021-02-24
* BUGFIX: Delete debugging code from class-cf7-conditional-settings
* Add check for Contact Form 7 ReCaptcha module

= 1.0.16 =

* 2021-02-23
* BUGFIX: Fixed admin styles not loading
* Add check for Contact Form CFDB7
* Add check for Drag and Drop Multiple File Upload — Contact Form 7
* Separate logic for scripts and styles

= 1.0.15 =

* 2021-01-08
* BUGFIX: Remove space after commas in $result string; otherwise plugin chokes after first item in string
* Check if scripts are enqueued & registered before unloading them
* Add check for CF7 Multi Drag & Drop Multi-File Upload plugin
* Add check for CF7 Multi-Step plugin

= 1.0.14 =

* 2021-01-08
* Update 'Tested up to WordPress 5.6' in README
* Fix missing version number

= 1.0.13 =

* 2021-01-07
* Tested up to 5.6
* Reformat code to meet WordPress coding standards

= 1.0.12 =

* 2020-10-08
* Tested up to 5.5.3
* Use Dashicons coffee glyph instead of FontAwesome coffee glyph in plugin meta

= 1.0.11 =

* 2020-09-28
* SECURITY FIX: better escaping and sanitization of translatable strings

= 1.0.10 =

* 2020-09-27
* Bugfix: fix mismatched text-domain
* Fix some typos in microcopy
* Refactor i18n

= 1.0.9 =

* 2020-09-04
* Tested up to WordPress 5.5.1

= 1.0.8 =

* 2020-06-16
* Tested up to WordPress 5.4.2

= 1.0.7 =

* 2020-04-01
* Tested up to WordPress 5.4.1

= 1.0.6 =

* 2020-04-01
* Tested up to WordPress 5.4

= 1.0.5 =

* 2020-03-25
* Remove surrounding underscores from constant 'CF7CL_PATH' to meet WordPress coding standards
* Add POT file

= 1.0.4 =

* 2020-03-25
* Change plugin display name to meet WordPress trademark requirements
* Change constant names to meet WordPress coding standards
* Modify select namespaces

= 1.0.3 =

* 2020-03-20
* Update README
* Add action links and plugin meta to plugins page

= 1.0.2 =

* 2020-03-18
* BUGFIX: lower wp_enqueue_scripts priority so it fires after CF7

= 1.0.1 =

* 2020-03-13
* Initial release

## Upgrade Notice

= 1.0.46 =

- 2024-10-23
- Tested up to WordPress 6.6.2
