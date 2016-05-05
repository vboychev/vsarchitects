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
if (isset($node->field_disable_page_title) && !empty($node->field_disable_page_title)) {
    $disable_page_title = $node->field_disable_page_title['und'][0]['value'];
} else {
    $disable_page_title = "0";
}
?>

<?php if ($page['header']): ?>
  <?php print render($page['header']); ?>
<?php endif; ?>

<?php require_once(drupal_get_path('theme', 'flym') . '/tpl/header.tpl.php'); ?>

<div class="section-wrapper <?php if ($page['slider']) print 'sec-slider'; ?>">

    <?php require_once(drupal_get_path('theme', 'flym') . '/tpl/mobi-menu.php'); ?>
    <?php if ($page['slider']): ?>
        <?php print render($page['slider']); ?>
    <?php endif; ?>

    <div class="move-wrapper">


        <?php if ($node_type != 'page'): ?>
            <section class="inner-banner" id="top">
                <div class="w-container fixed-container">
                    <div class="algin-center">
                        <h1 class="inner-sub" data-ix="move-3"><span class="domote"><?php print $site_name; ?>.</span>&nbsp;<?php print drupal_get_title(); ?></h1>

                    </div>
                </div>
            </section>
            <?php if ($page['content']): ?>
                <section class="section" >
                    <div class="w-container">
                        <?php
                        if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                            print render($tabs);
                        endif;
                        print $messages;
                        ?>
                        <?php print render($page['content']); ?>
                    </div>
                </section>

            <?php endif; ?>	
        <?php else: ?>
            <?php if ($disable_page_title == "1"): ?>
                <!-- start service page -->
                <section class="inner-banner" id="top">
                    <div class="w-container fixed-container">
                        <div class="algin-center">
                            <h1 class="inner-sub" data-ix="move-3"><span class="domote"><?php print $site_name; ?>.</span>&nbsp;<?php print drupal_get_title(); ?></h1>
                            <div class="tst-txt tst-ban" data-ix="move-3"><?php print $subtitle; ?></div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if ($page['content']): ?>
                <?php
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                ?>
                <?php print render($page['content']); ?>
                <!-- end container -->
            <?php endif; ?>	

        <?php endif; ?>
        <?php if ($page['section']): ?>
            <?php print render($page['section']); ?>
        <?php endif; ?>

    </div>
</div>

