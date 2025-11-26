# Five-Star Ratings Shortcode  

Contributors: seezee  
Donate link: [https://messengerwebdesign.com/donate](https://messengerwebdesign.com/donate)  
Author URI: [https://github.com/seezee](https://github.com/seezee)  
Plugin URI: [https://wordpress.org/plugins/five-star-ratings-shortcode/](https://wordpress.org/plugins/five-star-ratings-shortcode/)  
Tags: ratings, stars, icon, shortcode, accessible  
Requires at least: 4.6.0  
Tested up to: 6.7.1  
Requires PHP: 7.0  
Stable tag: 1.2.58  
License: GPLv2 or later  
License URI: <https://www.gnu.org/licenses/gpl-2.0.html>  
GitHub Plugin URI: seezee/Five-Star-Ratings-Plugin  

Simple lightweight shortcode to add 5-star ratings anywhere.

## Description

Add accessible, attractive 5-star ratings anywhere on your site with a simple
shortcode. The plugin uses Font Awesome icons via their SVG + JavaScript
method.

[![WP compatibility](https://plugintests.com/plugins/wporg/five-star-ratings-shortcode/wp-badge.svg)](https://plugintests.com/plugins/wporg/five-star-ratings-shortcode/latest)
[![PHP compatibility](https://plugintests.com/plugins/wporg/five-star-ratings-shortcode/php-badge.svg)](https://plugintests.com/plugins/wporg/five-star-ratings-shortcode/latest)

## Acknowledgement

This plugin is based on [Hugh Lashbrooke’s Starter Plugin](https://github.com/hlashbrooke/WordPress-Plugin-Template),
a robust and GPL-licensed code template for creating a standards-compliant
WordPress plugin.

## PRO only features

* Google Rich Snippets for Products, Restaurants, & Recipes
* Custom icon sizes
* Custom icon and text colors
* Choice of HTML `<i>` or `<span>` elements in HTML output
* Change maximum rating (from 3 – 10)
* Change minimum rating (0.0, 0.5, or 1.0)
* Shortcode generator
* Show/hide numeric text
* Locale aware decimal separator
* Options reset button

## Installation

### USING THE WORDPRESS DASHBOARD

1. Navigate to “Add New” in the plugins dashboard
2. Search for “Five-Star Ratings Shortcode”
3. Click “Install Now”
4. Activate the plugin on the Plugin dashboard
5. The FREE plugin has no settings. PRO users: Go to Settings -> Five-Star
Ratings Shortcode if you want to customize the shortcode output.

### UPLOADING IN WORDPRESS DASHBOARD

1. Click the download button on this and save “five-star-ratings-plugin.zip”
to your computer
2. Navigate to “Add New” in the plugins dashboard
3. Navigate to the “Upload” area
4. Select “five-star-ratings-plugin.zip” from your computer
5. Click “Install Now”
6. Activate the plugin in the Plugin dashboard
7. The FREE plugin has no settings. PRO users: Go to Settings -> Five-Star
Ratings Shortcode if you want to customize the shortcode output.

### USING FTP

1. Download the Five-Star Ratings Shortcode ZIP file
2. Extract the Five-Star Ratings Shortcode ZIP file to your computer
3. Upload the “five-star-ratings-plugin” directory to the
`/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard
5. The FREE plugin has no settings. PRO users: Go to Settings -> Five-Star
Ratings Shortcode if you want to customize the shortcode output.

### UPGRADING TO FIVE-STAR RATINGS SHORTCODE PRO

1. Go to Settings -> Five-Star Ratings Shortcode -> Upgrade
2. Fill out the payment form and submit
3. Your license key will automatically be entered

### DOWNLOAD FROM GITHUB

1. Download the plugin via [https://github.com/seezee/Five-Star-Ratings-Shortcode](https://github.com/seezee/Five-Star-Ratings-Shortcode)
2. Follow the directions for using FTP

## Usage Examples

[rating stars="0.5"] (Displays ½ star out of 5)  
[rating stars="3.0"] (Displays 3 stars out of 5)  
[rating stars="2.5"] (Displays 2½ stars out of 5)  
[rating stars="4.0"] (Displays 4 stars out of 5)  
[rating stars="5.5"] (Incorrect usage but will display 5 stars out of 5)  

In the 2nd example, the raw output will be like this before processing:

```html
<span class="fsrs">
  <span class="fsrs-stars">
    <i class="fsrs-fas fa-fw fa-star"></i>
    <i class="fsrs-fas fa-fw fa-star"></i>
    <i class="fsrs-fas fa-fw fa-star-half-alt"></i>
    <i class="fsrs-far fa-fw fa-star"></i>
    <i class="fsrs-far fa-fw fa-star"></i>
  </span>
  <span class="hide fsrs-text fsrs-text__hidden" aria-hidden="false">2.5 out of 5</span> 
  <span class="lining fsrs-text fsrs-text__visible" aria-hidden="true">2.5</span>
</span>
```  

## Translations

* English: Default language, always included

Would you like to help translate Five-Star Ratings Shortcode into your own
language? [You can do that here!](https://translate.wordpress.org/projects/wp-plugins/five-star-ratings-shortcode)

## Frequently Asked Questions

### What is the plugin for?

This plugin adds accessible, attractive 5-star ratings anywhere on your site
with a simple shortcode. The plugin uses Font Awesome icons via their SVG +
JavaScript method.

### How may I help improve this plugin?

I’d love to hear your feedback. In particular, tell me about your experience
configuring the plugin. Are the instructions clear? Do I need to reword them?
Did I leave out something crucial? You get the drift.

### I’d like to do more

I’m looking for collaborators to improve the code. If you are an experienced
Wordpress programmer, hit me up!

### I’d like to do even more

Feel free to send a donation to my [Paypal account](https://paypal.me/messengerwebdesign?locale.x=en_US).
Or buy me a beer if you’re in town.

## Dependencies

This plugin includes these third-party libraries in its package.

* [Font Awesome 5](https://github.com/FortAwesome/Font-Awesome)

## Changelog

## 1.2.58

* 2024-01-31
* Fix SVN tag mismatch

## 1.2.57

* 2024-01-27
* Update Freemius SDK

## 1.2.56

* 2024-12-13
* Tested up to WordPress 6.7.1
* Fix missing recipe author in rich snippets
* Restructure rich snippets JSON for review author
* Update Freemius SDK

## 1.2.55

* 2024-10-23
* Tested up to WordPress 6.6.2
* Update Freemius SDK

## 1.2.54

* 2024-08-29
* Tested up to WordPress 6.6.1

## 1.2.53

* 2024-05-07
* Tested up to WordPress 6.5.3

## 1.2.52

* 2024-05-02
* Tested up to WordPress 6.5.2
* BUGFIX: Fix `creation of dynamic property is deprecated error`
* Update Freemius SDK

## 1.2.51

* 2023-12-21
* Tested up to WordPress 6.4.2

## 1.2.50

* 2023-11-20
* Tested up to WordPress 6.4.1

## 1.2.49

* 2023-08-28
* Freemius SDK update to 2.5.11

## 1.2.48

* 2023-07-05
* Freemius SDK update to 2.5.10

## 1.2.47

* 2023-04-21
* Tested up to WordPress 6.2

## 1.2.46

* 2022-11-25
* Added font-style declaration to /assets/dist/css/style.css

## 1.2.45

* 2022-11-22
* Tested up to WordPress 6.1.1
* BUGFIX: fixed error in conditional code that prevented necessary code from loading for users of PRO version who haven't activated their license
* Removed decimal separator option in favor of localized numeric output

## 1.2.44

* 2022-08-18
* BUGFIX: refactored `function add_menu_item()` to avoid undefined variable `$page`

*

## 1.2.43

* 2022-07-24
* Tested up to WordPress 6.0.1
* BUGFIX: Added `( is_a( $post, 'WP_Post' )` check to `enqueue_fa_scripts()`
to prevent non-object error

## 1.2.42

* 2022-05-27
* Tested up to WordPress 6.0.0

## 1.2.41

* 2022-04-05
* Tested up to WordPress 5.9.3

## 1.2.40

* 2022-03-11
* Tested up to WordPress 5.9.2

## 1.2.39

* 2022-02-24
* Security fix

## 1.2.38

* 2022-02-22
* Tested up to WordPress 5.9.1

## 1.2.37

* 2022-02-14
* DRY refactored class-five-star-ratings-shortcode.php: moved variables into
the constructor function
* Replaced wp_kses with esc_html__ where possible
* Revised and improved some comments

## 1.2.36

* 2022-02-11
* Reverted SRI hash check and ensured local scripts pass the check
* Updated jquery-validate.js to v1.19.3
* Updated clipboard.js to v2.0.10

## 1.2.35

* 2022-02-10
* Updated to Fontawesome 6.0.0
* Don’t add SRI hash to fallback scripts if external scripts don’t load

## 1.2.34

* 2022-02-09
* Remove unused JavaScript and dev tools from plugin FREE version

## 1.2.33

* 2022-02-08
* Reorganized assets directory
* Removed 4 unnecessary translation calls
* ACCESSIBILITY IMPROVEMENT: Changed starsminValue & starsmaxValue ratings
fields to &lt;output&gt;
* Updated description in class-five-star-ratings-shortcode-admin-api.php file
comment

## 1.2.32

* 2022-01-26
* Tested up to WordPress 5.9

## 1.2.31

* 2022-01-20
* Update contact & support URL on plugins page for PRO users
* Add index.php to project root

## 1.2.30

* 2022-01-10
* Tested up to WordPress 5.8.3
* Check for FREE vs. PRO and serve appropriate support URL

## 1.2.29

* 2021-11-22
* BUGFIX: (PRO only) Check whether $post->post_content and $post->post_author
are set before assigning variables

## 1.2.28

* 2021-11-11
* Tested up to WordPress 5.8.2
* Update PRO plugin description in README & upgrade notice

## 1.2.27

* 2021-11-07
* BUGFIX: Options reset now returns decimal separator to default

## 1.2.26

* 2021-11-04
* NEW FEATURE (PRO ONLY): Option to output numeric text using alternate
decimal separator (comma)

## 1.2.25

* 2021-09-16
* BUGFIX: Fixed reset button not rendering on options tab in some instances

## 1.2.24

* 2021-09-15
* BUGFIX: Added check to remove unused PRO code from FREE version of class-five-star-ratings-shortcode-settings.php
* Update README

## 1.2.23

* 2021-09-14
* (PRO ONLY) Add options reset button to options tab

## 1.2.22

* 2021-09-13
* (PRO ONLY) Added show/hide option for numerical text
* (PRO ONLY) Fixed missing translator comment for gettext call

## 1.2.21

* 2021-09-09
* Tested up to WordPress 5.8.1
* BUGFIX: added additional check before printing JSON to avoid undefined
variable error

## 1.2.20

* 2021-07-23
* Tested up to WordPress 5.8

## 1.2.19

* 2021-05-20
* Added short description to README
* Updated plugin tags
* Updated header in main plugin file

## 1.2.18

* 2021-05-13
* BUGFIX: Updated assets/settings.js to check whether ClipboardJS has been
defined so we don't get an error in the FREE plugin version

## 1.2.17

* 2021-05-13
* Tested up to WordPress 5.7.2

## 1.2.16

* 2021-05-11
* BUGFIX: fix "previously declared function" error
* Refactored code to ensure premium code is not rendered in free version

## 1.2.15

* 2021-05-04
* BUGFIX: add ( isset( $_GET['tab'] ) ) check

## 1.2.14

* 2021-05-04
* MULTIPLE BUGFIXES for PRO plugin
* Fixed undefined variables
* Added check for non-existing featured image when using rich snippets
* Added check for incorrect shortcode syntax when using maximum star rating
feature in PRO plugin.
* Updated Freemius SDK

## 1.2.13

* 2021-04-21
* Tested up to WordPress 5.7.1

## 1.2.12

* 2021-03-12
* Tested up to WordPress 5.7

## 1.2.11

* 2021-01-28
* Add check for existence of $review_type

## 1.2.10

* 2021-01-19
* Update to Fontawesome 5.15.2

## 1.2.9

* 2021-01-18
* BUGFIX: Replace incorrect variable $link with $url in function checklink()

## 1.2.8

* 2021-01-07
* BUGFIX: Revert strict comparison operators to loose-typing

## 1.2.7

2021-01-07
Tested up to WordPress 5.6
BUGFIX: fix undefined variable

## 1.2.6

* 2021-01-07
* Add local fallback for external scripts
* Some code formatting cleanup to meet WordPress coding standard, but more is needed
* Load Farbtastic script in footer
* SECURITY: Sanitize $textsize & $textcolor on output
* SECURITY: Add nonce to form reset for to prevent CSFR attacks

## 1.2.5

* 2020-10-08
* Tested up to 5.5.3
* Update FREEMIUS SDK to v.2.4.1
* Use Dashicons coffee glyph instead of FontAwesome coffee glyph in plugin meta

## 1.2.4

* 2020-09-29
* BUGFIX fix missing borders on &lt;details&gt; element

## 1.2.3

* 2020-09-29
* SECURITY FIX: escape or sanitize all translatable strings

## 1.2.2

* 2020-09-22
* Improved microcopy
* Fix some i18n errors

## 1.2.1

* 2020-09-21
* (PRO only) Improved label and validation message for ratings field in
shortcode generator

## 1.2.0

* 2020-09-20
* (PRO only) BREAKING CHANGES: Recipe Rich Snippets require new syntax
* (PRO only) BUGFIX: fix missing curly brace in Recipe Rich Snippets output
* (PRO only) Improve Recipe Rich Snippets syntax
* (PRO only) Now supports guided recipes

## 1.1.4

* 2020-09-17
* Fix incorrect translator notes
* Improve ARIA text in output
* (PRO only) Better currency regex (allow period (.) as 1000s separater &
comma (,) as decimal separater)

## 1.1.3

* 2020-09-14
* Replace $pagenow global with $hook check wherever appropriate
* Complete overhaul of i18n internationalization
* Sanitize links in internationalized strings
* Update .pot file
* Update README

## 1.1.2

* 2020-09-13
* BUGFIX: 1.1.2 reintroduced error of scripts loading outside plugin settings
page, conflicting with other plugins; this update fixes that while ensuring
scripts still load when needed

## 1.1.1

* 2020-09-13
* BUGFIX: fix version check
* BUGFIX: fix missing admin scripts
* BUGFIX: fix missing padding on details:summary
* New PRO feature: shortcode generator
* Updated UX & CSS
* Updated usage examples

## 1.1.0

* There is no v1.1.0 :-(

## 1.0.22

* 2020-09-04
* Tested up to WordPress 5.5.1

## 1.0.21

* 2020-08-01
* BUGFIX: Load admin scripts and styles correctly to fix critical conflict
with other plugins

## 1.0.20

* 2020-07-23
* Integrate auto-deactivation of FREE version when upgrading to PRO

## 1.0.19

* 2020-07-20
* BUGFIX: Fix fatal error on upgrade: cannot redeclare fsrs_fs_uninstall_cleanup()

## 1.0.18

* 2020-06-25
* BUGFIX: Fix coffee cup icon not rendering in plugin meta

## 1.0.17

* 2020-06-16
* Tested up to WordPress 5.4.2
* BUGFIX: Fix premium code rendering in free plugin

## 1.0.16

* 2020-04-30
* Tested up to WordPress 5.4.1

## 1.0.15

* 2020-04-01
* Tested up to WordPress 5.4
* BUGFIX: Fix use of "this" keyword outside object context
* BUGFIX (PRO ONLY): Replace borked color picker with native HTML color picker
* Remove surrounding underscores from constant names per WordPress coding standards

## 1.0.14

* 2019-12-17
* Use get_bloginfo( 'wpurl' ) instead of get_bloginfo( 'url' )

## 1.0.13

* 2019-12-16
* New PRO feature: Google Rich Snippets for products, restaurants, & recipes
* Add debugging on PHP contants conflict

## 1.0.12

* 2019-12-10
* Correct Plugin URI in README
* Correct link to Github repo in README

## 1.0.11

* 2019-12-10
* BUGFIX: Fix stars showing zero if rating is 0.5
* Improve usage examples

## 1.0.10

* 2019-12-10
* Update usage examples in readme

## 1.0.9

* 2019-12-09
* BUGFIX: Fix incorrect text output if user enters x.5 where x is the maximum
number of stars

## 1.0.8

* 2019-12-09
* Change SCRIPT_DEBUG CORS policy check
* Fix missing translation string
* Change PRO version slug

## 1.0.7

* 2019-12-09
* BUGFIX: Fix CORS policy error

## 1.0.6

* 2019-12-09
* Update .POT file.

## 1.0.5

* 2019-12-09
* Fix error in documentation.

## 1.0.4

* 2019-12-09
* Fix error in documentation.

## 1.0.3

* 2019-12-09
* BUGFIX: Fix options not displaying for PRO plugin
* BUGFIX: Fix incorrect class in ratings text output
* Refactor shortcode: remove "half" attribute & use float instead
* Remove unused admin CSS rules

## 1.0.2

* 2019-12-08
* Correct plugin tags
* Correct badge links in readme.md

## 1.0.1

* 2019-12-08
* BUGFIX: Fix incorrect _VERSION_ constant; should be FSRS_VERSION

## 1.0.0

* 2019-12-06
* Initial release

## Upgrade Notice

## 1.2.58

* 2024-01-31
* Fix SVN tag mismatch

[//]: # (*********************************************************************            ***Do not copy/paste to readme.txt! You'll mess up the formatting!***            *********************************************************************)
[//]: # (REMEMBER to update the Stable tag and copy all changes to readme.txt!)
[//]: # (REMEMBER to update the Version Number in all files that contain it!)
