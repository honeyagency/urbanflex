<?php

function prepareHomepage()
{

// Header

    $headerImage   = null;
    $headerImageId = get_field('field_5b63860688e52');

    if (!empty($headerImageId)) {
        $headerImage = new TimberImage($headerImageId);
    }
    $header = array(
        'title' => get_field('field_5b6385ee88e51'),
        'image' => $headerImage,
    );

    if (have_rows('field_5b63864188e55')) {
        $classes = array();
        while (have_rows('field_5b63864188e55')) {
            the_row();

            $classes[] = array(
                'title' => get_sub_field('field_5b63864e88e56'),
            );
        }
    }

// About

    $aboutImage   = null;
    $aboutImageId = get_field('field_5b63862e88e54');

    if (!empty($aboutImageId)) {
        $aboutImage = new TimberImage($aboutImageId);
    }

    $about = array(
        'content' => get_field('field_5b63861688e53'),
        'image'   => $aboutImage,
        'booking' => get_field('field_5b63865d88e57'),
        'classes' => $classes,
    );

// pricing
    if (have_rows('field_5dcf402449001')) {
        $tiers = array();
        while (have_rows('field_5dcf402449001')) {
            the_row();
            if (have_rows('field_5dcf43591c1e2')) {
                $prices = array();
                while (have_rows('field_5dcf43591c1e2')) {
                    the_row();

                    $prices[] = array(
                        'price' => get_sub_field('field_5dcf43621c1e3'),
                        'title' => get_sub_field('field_5dcf43691c1e4'),
                        'link'  => get_sub_field('field_5dcf436c1c1e5'),
                    );
                }
            }
            $tiers[] = array(
                'title'  => get_sub_field('field_5dcf434e1c1e1'),
                'prices' => $prices,
            );
        }
    }
    $pricing = array(
        'title' => get_field('field_5dcf400c48fff'),
        'text'  => get_field('field_5dcf401349000'),
        'tiers' => $tiers,
    );
// Meet

    $meetImage   = null;
    $meetImageId = get_field('field_5b63866b88e58');

    if (!empty($meetImageId)) {
        $meetImage = new TimberImage($meetImageId);
    }

    $meet = array(
        'image'   => $meetImage,
        'title'   => get_field('field_5b63869a88e59'),
        'content' => get_field('field_5b6386a688e5a'),
    );

// Footer

// Social

    $social = array(
        'facebook'  => get_field('field_5b6386c388e5b'),
        'instagram' => get_field('field_5b6386cf88e5c'),
        'youtube'   => get_field('field_5b6386d688e5d'),
    );

// Hours

    if (have_rows('field_5b6386f288e5f')) {
        $hourSection = array();
        while (have_rows('field_5b6386f288e5f')) {
            the_row();

            $hourSection[] = array(
                'title' => get_sub_field('field_5b6386fd88e60'),
                'open'  => get_sub_field('field_5b63871788e61'),
                'close' => get_sub_field('field_5b63872788e62'),
            );
        }
    }
    $hours = array(
        'title' => get_field('field_5b6386e388e5e'),
        'hours' => $hourSection,
    );

    $contact = array(
        'title'   => get_field('field_5b63873e88e63'),
        'address' => get_field('field_5b63874c88e64'),
        'city'    => get_field('field_5b63875d88e65'),
        'state'   => get_field('field_5b63877488e66'),
        'zip'     => get_field('field_5b63878188e67'),
        'phone'   => get_field('field_5b63878b88e68'),
        'email'   => get_field('field_5b63879288e69'),
    );

    $home = array(
        'header'  => $header,
        'about'   => $about,
        'pricing' => $pricing,
        'meet'    => $meet,
        'social'  => $social,
        'hours'   => $hours,
        'contact' => $contact,
    );

    return $home;
}
