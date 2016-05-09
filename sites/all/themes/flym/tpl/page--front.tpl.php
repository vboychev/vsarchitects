<?php if ($page['header']): ?>
  <?php print render($page['header']); ?>
<?php endif; ?>

<?php require_once(drupal_get_path('theme', 'flym') . '/tpl/header.tpl.php'); ?>
<div class="section-wrapper  <?php if ($page['slider']) print 'sec-slider'; ?>">
    <?php require_once(drupal_get_path('theme', 'flym') . '/tpl/mobi-menu.php'); ?>
    <?php if ($page['slider']):
        ?>
        <?php print render($page['slider']); ?>
    <?php endif; ?>
    <div class="move-wrapper">

        <?php if ($page['content']): ?>
            <?php
            if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                print render($tabs);
            endif;
            print $messages;
            unset($page['content']['system_main']['default_message']);
            ?>		
            <?php print render($page['content']); ?>
        <?php endif; ?>

        <?php if ($page['section']): ?>
            <?php print render($page['section']); ?>
        </div>
    <?php endif; ?>

</div>

