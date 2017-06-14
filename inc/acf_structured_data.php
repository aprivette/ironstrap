<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */

add_action('wp_head', function () {
    // Default type is "Organization"
    if(get_field('organization_type', 'option') ? $type = get_field('organization_type', 'option') : $type = 'Organization')
    // Set base properties
    $json = [
        '@context' => 'http://schema.org',
        '@type' => $type,
        'name' => get_bloginfo('name'),
        'url' => get_home_url(),
        'description' => get_bloginfo('description'),
    ];
    // Set phone number property
    if(get_field('phone_number', 'option') ? $json['telephone'] = get_field('phone_number', 'option') : null);
    // Set logo property
    if(get_field('logo', 'option')) {
        $logo = get_field('logo', 'option');
        $json['logo'] = wp_get_attachment_image_src($logo)[0];
    }
    // Set sameAs property
    if(get_field('social_media_links', 'option')) {
        $sameAs = array();
        foreach(get_field('social_media_links', 'option') as $key => $value) {
            $sameAs[] = $value['url'];
        }
        $json['sameAs'] = $sameAs;
    }
    // Set address property
    if(get_field('enable_address', 'option')) {
        $streetAddress = get_field('street', 'option');
        if(get_field('street_2', 'option') ? $streetAddress .= ' ' . get_field('street_2', 'option') : null);
        // Set required values
        $address = [
            '@type' => 'PostalAddress',
            'streetAddress' => $streetAddress,
            'addressCountry' => get_field('country', 'option')
        ];
        // Check if non-required values are set, then add them to the address variable if they are
        if(get_field('zip', 'option') ? $address['postalCode'] = get_field('zip', 'option') : null);
        if(get_field('state', 'option') ? $address['addressRegion'] = get_field('state', 'option') : null);
        if(get_field('city', 'option') ? $address['addressLocality'] = get_field('city', 'option') : null);
        $json['address'] = $address;
    }
    // Add custom properties/values
    if(get_field('custom_data', 'option')) {
        foreach(get_field('custom_data', 'option') as $key => $value) {
            $property = $value['property'];
            $json[$property] = $value['value'];
        }
    }
    // Add post-specific custom properties/values
    if(get_field('structured_data')) {
        foreach(get_field('structured_data') as $key => $value) {
            $property = $value['property'];
            $json[$property] = $value['value'];
        }
    }
    // Output the json
    $output = '<script type="application/ld+json">' . json_encode($json) . '</script>';
    
    echo $output;
});