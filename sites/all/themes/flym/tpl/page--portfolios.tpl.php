<?php

if (isset($node)) {

    $node_type = $node->type;

    $nid = $node->nid;

} else {

    $node_type = '';

    $nid = '';

}

if (isset($node->field_subtitle) && !empty($node->field_subtitle)) {

    $subtitle = $node->field_subtitle['und'][0]['value'];

} else {

    $subtitle = "";

}

?>

<?php if ($page['header']): ?>
  <?php print render($page['header']); ?>
<?php endif; ?>

<?php require_once(drupal_get_path('theme', 'flym') . '/tpl/header.tpl.php'); ?>
<div class="section-wrapper">
    <?php require_once(drupal_get_path('theme', 'flym') . '/tpl/mobi-menu.php'); ?>
    <div class="move-wrapper">



    <!-- start service page -->

    <section class="inner-banner" id="top">

        <div class="w-container fixed-container">

            <div class="algin-center">

                <h1 class="inner-sub" data-ix="move-3"><span class="domote"><?php print $site_name;?>.</span>&nbsp;<?php print drupal_get_title(); ?></h1>

                <div class="tst-txt tst-ban" data-ix="move-3"><?php print $subtitle;?></div>

            </div>

        </div>

    </section>



    <?php if ($page['content']): ?>



        <?php

        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

            print render($tabs);

        endif;

        print $messages;

        ?>

        <?php print render($page['content']); ?>



    <?php endif; ?>	



    <?php if ($page['section']): ?>

        <?php print render($page['section']); ?>

    <?php endif; ?>



</div>
</div>