<div class="blog-comment">
    <div class="w-clearfix sp">
        
          <?php
        if ($picture) {
            print strip_tags($picture, '<img>');
        } else {
            ?><div class="photo-comment"></div>
        <?php } ?>
        <div class="comment-wrapper">
            <h4 class="com-name"><?php print $author; ?></h4>
            <div class="meta-tag"><?php print strip_tags(render($content['links']), '<a>'); ?>  | <?php print format_date($comment->created, 'custom', 'F d, Y'); ?></div>
        </div>
    </div>
    <div class="sp">
        <p> <?php
            hide($content['links']);
            print strip_tags(render($content));
            ?></p>
    </div>
    <div class="line-con"></div>
</div>






<!-- end section -->

