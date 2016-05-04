<?php

function flym_form_system_theme_settings_alter(&$form, &$form_state) {

//    $theme_path = drupal_get_path('theme', 'flym');

// Get all themes.
    $themes = list_themes();
// Get the current theme
    $active_theme = $GLOBALS['theme_key'];
    $form_state['build_info']['files'][] = str_replace("/$active_theme.info", '', $themes[$active_theme]->filename) . '/theme-settings.php';

    $theme_path = drupal_get_path('theme', 'flym');

    $form['settings'] = array(
        '#type' => 'vertical_tabs',
        '#title' => t('Theme settings'),
        '#weight' => 2,
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#attached' => array(
            'css' => array(drupal_get_path('theme', 'flym') . '/assets/css/drupalet_base/admin.css'),
            'js' => array(
                drupal_get_path('theme', 'flym') . '/assets/js/drupalet_admin/admin.js',
            ),
        ),
    );

    $form['settings']['general_setting'] = array(
        '#type' => 'fieldset',
        '#title' => t('General Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['settings']['general_setting']['general_setting_tracking_code'] = array(
        '#type' => 'textarea',
        '#title' => t('Tracking Code'),
        '#default_value' => theme_get_setting('general_setting_tracking_code', 'flym'),
    );


    $form['settings']['custom_css'] = array(
        '#type' => 'fieldset',
        '#title' => t('Custom CSS'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['settings']['custom_css']['custom_css'] = array(
        '#type' => 'textarea',
        '#title' => t('Custom CSS'),
        '#default_value' => theme_get_setting('custom_css', 'flym'),
        '#description' => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
    );



    $form['settings']['blog'] = array(
        '#type' => 'fieldset',
        '#title' => t('Blog Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['settings']['blog']['disable_blog_title'] = array(
        '#type' => 'checkbox',
        '#title' => t('Allows the page title'),
        '#default_value' => theme_get_setting('disable_blog_title', 'flym'),
    );
    
    $form['settings']['blog']['blog_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Blog title'),
        '#default_value' => theme_get_setting('blog_title', 'flym'),
    );
    $form['settings']['blog']['blog_subtitle'] = array(
        '#type' => 'textfield',
        '#title' => t('Blog subtitle'),
        '#default_value' => theme_get_setting('blog_subtitle', 'flym'),
    );

    $form['settings']['portfolio'] = array(
        '#type' => 'fieldset',
        '#title' => t('Portfolios Settings'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );
    $form['settings']['portfolio']['link_all_portfolio'] = array(
        '#type' => 'textfield',
        '#title' => t('Link all portfolio'),
        '#default_value' => theme_get_setting('link_all_portfolio', 'flym'),
    );
     $form['settings']['portfolio']['single_portfolios_style'] = array(
        '#title' => t('Single portfolio style'),
        '#type' => 'select',
        '#options' => array(
            'style1' => t('Style 1'),
            'style2' => t('Style 2'),
            'style3' => t('Style 3'),
            'style4' => t('Style 4'),
            'style5' => t('Style 5'),
            
        ),
        '#default_value' => theme_get_setting('single_portfolios_style', 'flym')
    );

    
}
