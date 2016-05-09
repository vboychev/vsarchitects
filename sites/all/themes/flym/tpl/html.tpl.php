<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
    <head>
        <meta charset="utf-8">

        <meta name="description" content="Flym is a responsive &amp; interactive fullscreen portfolio for artists, photographers, media agencies, restaurants and for everyone that wants to showcase their portfolio in a professional way.">
        <meta name="keywords" content="responsive, portfolio, professional, artist, fullscreen, photo, photographers, agencies, agencies, php, interaction">

        <!-- mobile meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="generator" content="HTML5 Template">
        
        <!-- FONT -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,latin-ext,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
       
        <!-- TITLE -->
        <title><?php print $head_title; ?></title>

        <?php
        print $styles;
        print $head;
        ?>

        <?php
        //Tracking code

        $tracking_code = theme_get_setting('general_setting_tracking_code', 'flym');

        print $tracking_code;

        //Custom css

        $custom_css = theme_get_setting('custom_css', 'flym');

        if (!empty($custom_css)):
            ?>

            <style type="text/css" media="all">

                <?php print $custom_css; ?>

            </style>

            <?php
        endif;
        ?>

    </head>

    <body class="<?php print $classes; ?>" <?php print $attributes; ?>>

        <!-- preloader -->
        <div class="loading">
            <div class="loader"><img src="<?php print base_path() . drupal_get_path('theme', 'flym') . '/images/puff.svg'?>" alt="puff.svg">
            </div>
        </div>
        <!-- Loader end -->
     
            <div id="skip-link">
                <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
            </div>
            <?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>

        <?php print $scripts; ?>
    </body>

</html>

