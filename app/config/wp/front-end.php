<?php

// Add body classes
function toto_body_class($classes)
{
  // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    if (is_front_page()) {
        array_push($classes, 'is-alpha');
        array_push($classes, 'is-gamma');
    }

    return $classes;
}
add_filter('body_class', 'toto_body_class');
