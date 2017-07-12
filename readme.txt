=== TextMe SMS ===
Contributors: amitrotem, ramiy
Tags: sms, text, events, actions, woocommerce, contact form 7, CF7
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 1.7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Send custom SMS messages from your WordPress site to your customers.

== Description ==

This plugin allows you to send SMS messages from your WordPress dashboard to the site owner or to your end users.

Select an SMS provider gateway and enter the needed credentials. Define the events to trigger the SMS submission. Write custom messages to be sent to your users. Increase user engagment using dynamic fields inside your message to create personalized messages.

= TextMe SMS Features =

* **SMS Provider Gateway** - Send SMS messages and notification directly from your WordPress dashboard using a veriaty of external services.

* **Event Listeners** - Define the events that trigger the SMS submittion. Use simple events like new user registration and post publish. Or use advanced events like contact form submission or ecommerce product purchase.

* **Custom SMS Messages** - Write custom SMS messages to site owner or to your customer. Use dynamic fields inside your message to create personolized message for higher engagments.

* **Extendable Platform** - This is an extendable plugin, you can add your own external SMS provider gateways or create custom event listeners for 3rd party plugins.

for more information and Purchase SMS packages visit our website: https://textme.co.il

= TextMe SMS Addons =

We provide free built-in extension that interact with WordPress core functionality, and integration with external 3rd party plugins.


* **WooCommerce** - Send SMS when a new order received, when an order is marked as completed, when an order cancel or waiting for payment.

* **Contact Form 7** - Send SMS on form submition.

* **POJO FORMS** - Send SMS on form submition.

* **New User Registration** - Send SMS on user registration.


Develop your own addons to integrate TextMe SMS with other plugins. Any plugin that interacts with the user can send SMS messages. Plugins like Contact-Forms, Ecommerce, Membership, and many more.

== Installation ==

= Installation =
1. In your WordPress Dashboard go to "Plugins" -> "Add Plugin".
2. Search for "TextMe SMS".
3. Install the plugin by pressing the "Install" button.
4. Activate the plugin by pressing the "Activate" button.

= Minimum Requirements =
* WordPress version 4.0 or greater.
* PHP version 5.2.4 or greater.
* MySQL version 5.0 or greater.

= Recommended Requirements =
* The latest WordPress version.
* PHP version 5.6 or greater.
* MySQL version 5.6 or greater.

== Screenshots ==


== Changelog ==
= 1.7.1 =
* Update readme file

= 1.7 =
* Fix woocommerce cancel order admin sms hook
* Add woocommerce when order cancel send sms to customer
* New integration to POJO forms
* Admin layout change

= 1.6 =
* CF7: send sms to user after form submit
* minor bug fix in js script

= 1.5 =
* Woocommerce: minor bug fix in woocommerce integration

= 1.4 =
* New extension: New User Registration - send SMS notifying for every registered user.
* Move extension fields from the general UI file to individual extension files.

= 1.3 =
* Move extendable files to 'extensions' directory.
* Add missing translation functions.
* Minor CSS updates.

= 1.2 =
* Rewrite the readme file - add branding text.
* Add minimum and recommended requirements (PHP, MySQL, WordPRess).
* Update minimum required WordPress version from 3.0 to 4.0.
* Move plugin files to 'includes' directory.
* Docs: Add phpDocs to classes and functions.
* Security: Prevent direct access to php files.
* Security: Prevent direct access to directories.
* Security: Display escaped HTML input attributes for safe use.
* Security: Display escaped translation strings for safe use.
* i18n: Remove po/mo files from the plugin.
* i18n: Use [translate.wordpress.org](https://translate.wordpress.org/) to translate the plugin.

= 1.1 =
* i18n: Change text-domain to match the plugin slug.
* Remove debug functions.
* Update main gateway class.

= 1.0 =
* Initial release.

