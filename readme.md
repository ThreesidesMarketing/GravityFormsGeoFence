# Gravity Forms Geo-Fence
----------
This package provides a simple geo-fence for Gravity Form Submissions. It's designed to complement exisitng anti-spam measures such as reCAPTCHA, or other tools.

There are specific use cases where this plugin is appropriate, and it not suitable as a substitute for other tools. 

The intention of this plugin is to ensure form submissions are recieved from a relevant location, and prevent submission notifications being sent if outside of this location.

## Installation

1. Download this repo by clicking the `⬇ Code` button at the top of the screen and selecting **Download Zip**.
2. Visit the **Add Plugins** page of your WordPress site (`/wp-admin/plugin-install.php`)
3. Click **Upload Plugin** and select the ZIP folder.
4. On the following screen click **Activate**


## Usage

This plugin automatically restricts submissions to Australian IP addresses.

If you would like to add permitted countries, update the array `$Tsm_Gform_Spam_COUNTRY_CODE` on line 20 to include the code.

E.g. ['au', 'nz'] permits both Australia and New Zealand

## Security Vulnerabilities

***Note: If you discover any security related issues, please email websites@threesides.com.au instead of using the issue tracker.***

## Credits

* ipapi.co [GitHub](https://github.com/ipapi-co/) and [Website](https://ipapi.co)
