<?php if ($content['#node']->comment and ! ($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
    <div>
        <div>
            <h4><?php print $content['#node']->comment_count; ?> Comments</h4>
            <div class="line-con"></div>
        </div>
    </div>
    <?php print render($content['comments']); ?>  
    <div>
        <h4><?php print t('Leave A Comment'); ?></h4>
        <div class="line-con"></div>
    </div>
    <div>
        <div class="comment_count">
            <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
        </div>
    </div>

<?php } ?>


