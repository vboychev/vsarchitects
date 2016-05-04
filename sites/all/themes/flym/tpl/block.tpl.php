<?php

$out = '';

if ($block->region == 'main_menu') {

    $out .= '<nav  class="' . $classes . '" ' . $attributes .'>';

    $out .= render($title_suffix);

    $out .= $content;

    $out .= '</nav>';
} elseif ($block->region == 'slider') {

    $out .= '<div class="' . $classes . '"' . $attributes .  '>';

    $out .= render($title_suffix);

    $out .= $content;

    $out .= '</div>';
} elseif ($block->region == 'section') {
    $out .= '<section class="' . $classes . '"' . $attributes . '>';
    if ($block->subject):

        $out .= '<div class="w-container"><div><h4>' . $block->subject . '</h4>'
                . '<div class="line-con"></div></div>';
    endif;
    $out .= render($title_suffix);
    $out .= $content;
    if ($block->subject):
        $out.='</div>';
    endif;
    $out .= '</section>';
} elseif ($block->region == 'sidebar') {

    $out .= '<section class="' . $classes . '"' . $attributes . ' ' . $attr . '>';

    if ($block->subject):

        $out .= '<h3 class="widget-title">' . $block->subject . '</h3>';
    
        $out .= '<div class="decor-1 decor-1_mod-a"></div>';

    endif;

    $out .= render($title_suffix);

    $out .= $content;

    $out .= '</section>';
}elseif ($block->region == 'content') {
    $out .= '<div class="search ' . $classes . '"' . $attributes  . '>';

    $out .= render($title_suffix);

    $out .= $content;

    $out .= '</div>';
} else {

    $out .= '<div class="' . $classes . '"' . $attributes  . '>';

    $out .= render($title_suffix);

    $out .= $content;

    $out .= '</div>';
}

print $out;
?>