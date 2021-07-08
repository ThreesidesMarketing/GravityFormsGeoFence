<?php

/**
 * Plugin Name:     Threesides - Gravity Forms Anti-spam
 * Plugin URI:      https://threesides.com.au
 * Description:     Anti-spam plugin for Gravity Forms developed by Threesides Marketing
 * Author:          Threesides
 * Author URI:      https://threesides.com.au
 * Text Domain:     tsm-gform-spam
 * Version:         1.0.0
 *
 * @package         Tsm_Gform_Spam
 */

class Tsm_Gform_Spam
{
    // The two letter ISO 3166-1 alpha-2 country codes. (https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)
    // Eg. Australia = au, New Zealand = nz
    // To use multiple, separate with commas, ['au', 'nz']
    protected $Tsm_Gform_Spam_COUNTRY_CODE = ['au'];


    function __construct()
    {

        add_filter('gform_entry_is_spam', [$this, 'filter_gform_entry_is_spam_ip_country'], 11, 3);
    }

    function filter_gform_entry_is_spam_ip_country($is_spam, $form, $entry)
    {
        if ($is_spam) {
            return $is_spam;
        }

        $ip_address = empty($entry['ip']) ? GFFormsModel::get_ip() : $entry['ip'];

        if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
            return true;
        }

        $response = wp_remote_get(sprintf('https://ipapi.co/%s/country/', $ip_address));

        if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
            $response_country_code = trim(wp_remote_retrieve_body($response));

            return !in_array($response_country_code, $this->Tsm_Gform_Spam_COUNTRY_CODE);
        }

        return false;
    }
}

new Tsm_Gform_Spam;
