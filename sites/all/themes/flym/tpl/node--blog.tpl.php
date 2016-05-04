<?php
global $base_root, $base_url;

if (isset($node->field_post_format) && !empty($node->field_post_format)) {
    $post_format = $node->field_post_format['und'][0]['value'];
} else {
    $post_format = 'image';
}

if (!empty($node->field_image) && isset($node->field_image)) {
    $imageone = $node->field_image['und'][0]['uri'];
    $images = $node->field_image['und'];
    $count = count($images);
} else {
    $imageone = '';
    $count = 0;
}
$i = 0;
if (!$page) {
    ?>
    <div class="w-col w-col-3 w-col-stack col-m2 item-content">
        <div class="blog-p">

            <?php if ($post_format == 'quote' && isset($node->field_quote) && !empty($node->field_quote)) { ?>
                <div class="post"></div>
                <div class="bcon-wrapper">
                    <h3><a href="<?php print $node_url; ?>" class="h-link">“<?php print strip_tags(render($content['field_quote'])); ?>”</a></h3>
                    <div>
                        <div class="meta-tag">- <?php print strip_tags(render($content['field_authors_cited'])); ?></div>
                        <div class="blog-l"></div>
                    </div>
                    <?php print render($content['body']); ?>   
                    <div class="post-more"><a class="post-link" href="<?php print $node_url; ?>">Read More&nbsp;›</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="post">
                    <?php if ($post_format == 'video' && isset($node->field_video_embed) && !empty($node->field_video_embed)): ?>

                        <div class="w-embed w-video" style="padding-top: 41.702127659574465%;">
                            <?php print render($content['field_video_embed']); ?>
                        </div>
                    <?php elseif ($post_format == 'audio' && isset($node->field_soundcloud) && !empty($node->field_soundcloud)) : ?>
                        <div class="w-embed w-iframe">
                            <?php print render($content['field_soundcloud']); ?>
                        </div>          
                    <?php else : ?>
                        <?php if ($count == 1): ?>
                            <a class="w-inline-block" href="<?php print $node_url; ?>"> 
                                <img src="<?php print file_create_url($imageone); ?>" alt="<?php print $title; ?>">
                            </a>
                        <?php elseif ($count > 1): ?>

                            <div class="w-slider blog-slider" data-animation="slide" data-duration="500" data-infinite="1">
                                <div class="w-slider-mask">
                                    <?php
                                    foreach ($images as $image) :
                                        $url = $node->field_image['und'][$i]['uri'];  //full url 
                                        ?>    
                                        <div class="w-slide"> <img src="<?php print file_create_url($url); ?>" alt="<?php print $title; ?>"></div>                          
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                                <div class="w-slider-arrow-left">
                                    <div class="w-icon-slider-left b-arrow"></div>
                                </div>
                                <div class="w-slider-arrow-right">
                                    <div class="w-icon-slider-right b-arrow"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?> 
                </div>
                <div class="bcon-wrapper">
                    <h3><a href="<?php print $node_url; ?>" class="h-link"><?php print $title; ?></a></h3>
                    <div>
                        <div class="meta-tag"><?php print t('By'); ?>&nbsp;<?php print strip_tags($name); ?> | <?php print format_date($node->created, 'custom', 'F d, Y'); ?></div>
                        <div class="blog-l"></div>
                    </div>
                    <?php print render($content['body']); ?>               
                    <div class="post-more"><a class="post-link" href="<?php print $node_url; ?>"><?php print t('Read More'); ?>&nbsp;›</a>
                    </div>
                </div>
            <?php } ?>
        </div> 
    </div>
    <?php
} else {
    ?>
    <section class="section">
        <div class="w-container">
            <div class="div-spc spc">
                <div class="post">
                    <?php if ($post_format == 'video' && isset($node->field_video_embed) && !empty($node->field_video_embed)): ?>

                        <div class="w-embed w-video" style="padding-top: 41.702127659574465%;">
                            <?php print render($content['field_video_embed']); ?>
                        </div>
                    <?php elseif ($post_format == 'audio' && isset($node->field_soundcloud) && !empty($node->field_soundcloud)) : ?>
                        <div class="w-embed w-iframe">
                            <?php print render($content['field_soundcloud']); ?>
                        </div>          
                    <?php else : ?>
                        <?php if ($count == 1): ?>
                            <a class="w-inline-block" href="<?php print $node_url; ?>"> 
                                <?php print theme('image_style', array('path' => $imageone, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?>
                            </a>
                        <?php elseif ($count > 1): ?>
                            <div class="w-slider blog-slider" data-animation="slide" data-duration="500" data-infinite="1">
                                <div class="w-slider-mask">
                                    <?php
                                    foreach ($images as $image) :
                                        $url = $node->field_image['und'][$i]['uri'];  //full url 
                                        ?>    
                                        <div class="w-slide"> <?php print theme('image_style', array('path' => $url, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?></div>                          
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                                <div class="w-slider-arrow-left">
                                    <div class="w-icon-slider-left b-arrow"></div>
                                </div>
                                <div class="w-slider-arrow-right">
                                    <div class="w-icon-slider-right b-arrow"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="div-spc spc">
                <h3><?php print $title; ?></h3>
                <div class="meta-tag">By&nbsp;<?php print strip_tags($name); ?> | <?php print format_date($node->created, 'custom', 'F d, Y'); ?></div>
            </div>
            <div class="div-spc spc">
                <?php print render($content['body']); ?>
            </div>
            <div class="div-spc spc">
                <?php print render($content['field_tags']); ?>
            </div>
            <?php print render($content['comments']); ?>
            <!-- end comments-list -->
        </div>
    </section>
<?php } ?>

