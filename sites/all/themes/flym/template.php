<?php

global $base_url;

function flym_preprocess_html(&$variables) {
    //-- Google web fonts -->
    drupal_add_css('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('type' => 'external'));
}

function flym_alpha_preprocess_page(&$vars) {
    if (!empty($vars['page']['#views_contextual_links_info'])) {
        $key = array_search('contextual-links-region', $vars['attributes_array']['class']);
        if ($key !== FALSE) {
            unset($vars['attributes_array']['class'][$key]);

            // Add the JavaScript, with a group and weight such that it will run
            // before modules/contextual/contextual.js.
            drupal_add_js(drupal_get_path('module', 'views') . '/js/views-contextual.js', array('group' => JS_LIBRARY, 'weight' => -1));
        }
    }
}

function flym_preprocess_page(&$vars) {

    if (isset($vars['node'])) {
        $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    }
//    print $vars['node']->type ;
    //Taxonomy page
    if (arg(0) == 'taxonomy') {
        $vars['theme_hook_suggestions'][] = 'page__taxonomy';
    }

    //View template
//    if (views_get_page_view()) {
//        $vars['theme_hook_suggestions'][] = 'page__view';
//    }

    drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' . base_path() . path_to_theme() . '" });', 'inline');
}

function flym_preprocess_node(&$vars) {
    unset($vars['content']['links']['statistics']['#links']['statistics_counter']['title']);
}

function flym_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
        $form['search_block_form']['#default_value'] = t(''); // Set a default value for the textfield

        $form['search_block_form']['#attributes']['class'] = array("form-search__input form-control");
        $form['search_block_form']['#attributes']['placeholder'] = array("Keyword ...");
        //disabled submit button
        //unset($form['actions']['submit']);
        unset($form['search_block_form']['#title']);
    }
}

// Remove superfish css files.
function flym_css_alter(&$css) {
//    unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
//    unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function flym_preprocess_file_entity(&$variables) {
    if ($variables['type'] == 'image') {

        // Alt Text
        if (!empty($variables['field_media_alt_text'])) {
            $variables['content']['file']['#alt'] = $variables['field_media_alt_text']['und'][0]['safe_value'];
        }

        // Title
        if (!empty($variables['field_media_title'])) {
            $variables['content']['file']['#title'] = $variables['field_media_title']['und'][0]['safe_value'];
        }
    }
}

/* function flym_menu_tree__main_menu(array $variables) {
  return '<ul class="pi-menulist ul-mainmenu">' . $variables['tree'] . '</ul>';
  }
 */

function flym_menu_tree__main_menu(array $variables) {

    return '<ul class="w-list-unstyled">' . $variables['tree'] . '</ul>';
}

function flym_form_comment_form_alter(&$form, &$form_state) {
    $form['comment_body']['#after_build'][] = 'flym_customize_comment_form';
    $form['your_comment']['subject'] = $form['subject'];
    unset($form['subject']);
    $form['your_comment']['subject']['#access'] = FALSE;

    //Comment
    $form['your_comment']['comment_body'] = $form['comment_body'];
    unset($form['comment_body']);
    $form['#attributes']['class'][] = "reply-form";
    $form['author']['name']['#attributes']['placeholder'] = array("Enter your name");
    $form['author']['name']['#attributes']['class'] = array("w-input blog-field");

    $form['author']['title']['#access'] = FALSE;
    $form['author']['mail']['#attributes']['placeholder'] = array("Enter your email address");
    $form['author']['mail']['#attributes']['class'] = array("w-input blog-field");
    $form['author']['mail']['#description'] = FALSE;

    $form['author']['mail']['#access'] = TRUE;
    $form['author']['name']['#access'] = TRUE;
    $form['author']['homepage']['#access'] = TRUE;
    $form['author']['homepage']['#attributes']['placeholder'] = array("Enter your website");
    $form['author']['homepage']['#attributes']['class'] = array("w-input blog-field");




//    $form['your_comment']['comment_body']['#attributes']['placeholder'] = array("your comment *");
    $form['author']['mail']['#required'] = TRUE;
    $form['author']['name']['#required'] = TRUE;


    $form['actions']['submit']['#value'] = 'Send Message';
    $form['actions']['submit']['#attributes']['class'] = array("w-button button btn-small");
    $form['actions']['preview']['#access'] = FALSE;
//    echo '<pre>'; print_r($form['actions']);echo '</pre>';
//    echo '<pre>'; print_r($form['your_comment']['comment_body']);echo '</pre>';
}

function flym_customize_comment_form(&$form) {
    $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
    return $form;
}

function flym_field__field_portfolios_video_embed(&$variables) {
    $output = '';

    // Render the label if it's not hidden.
    if (!$variables['label_hidden']) {
        $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    $index = 0;
    $count_item = count($variables['items']);
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    if ($count_item > 1):
        foreach ($variables['items'] as $delta => $item) {
            $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
            $output .= '<div class="w-col w-col-6"><div class="div-spc"><div class="w-embed w-video" style="padding-top: 56.27659574468085%;"> <div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div></div></div></div>';
            $index++;
        } elseif ($count_item == 1) :
        foreach ($variables['items'] as $delta => $item) {
            $output .= '<div class="w-col w-col-12"><div class="div-spc"><div class="w-embed w-video" style="padding-top: 56.27659574468085%;"> <div' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div></div></div></div>';
        }
    endif;
    $output .= '</div>';

    // Render the top-level div.
    if (isset($variables["atributes"])) {
        $output = '<div class="' . $variables['classes'] . '"' . $variables['atributes'] . '>' . $output . '</div>';
    }

    return $output;
}

function flym_breadcrumb($variables) {
    $crumbs = '';
    $breadcrumb = $variables['breadcrumb'];
    if (!empty($breadcrumb)) {
        $crumbs .= '<ol class="breadcrumb">';
        foreach ($breadcrumb as $value) {

            $crumbs .= '<li>' . $value . '</li>';
        }
        $crumbs .= '<li class="active">' . drupal_get_title() . '</li>';
        return $crumbs . '</ol>';
    } else {
        return NULL;
    }
}

function single_navigation($ntype, $nid, $nav) {
    $current_node = node_load($nid);

    $prev_nid = db_query("SELECT n.nid FROM {node} n WHERE n.type = :type AND n.status = 1 AND n.created < :created  ORDER BY n.created DESC LIMIT 1", array(':created' => $current_node->created, ':type' => $ntype))->fetchField();


    $next_nid = db_query("SELECT n.nid FROM {node} n WHERE n.type = :type AND n.status = 1 AND n.created > :created LIMIT 1", array(':created' => $current_node->created, ':type' => $ntype))->fetchField();
    $link = '';

    if ($prev_nid > 0 && $nav == 'prev') {
        $node = node_load($prev_nid);
        $link .= '<div class="btn-spc"><a href="' . url("node/" . $node->nid) . '" class="button btn-small"><span class="arrow">‹</span>Previous Project</a></div>';
    } elseif ($next_nid > 0 && $nav == 'next') {
        $node = node_load($next_nid);
        $link .= '  <div class="btn-spc"><a href="' . url("node/" . $node->nid) . '" class="button btn-small">Next Project<span class="arrow a-nxt">›</span></a></div>';
    }
    return $link;
}
