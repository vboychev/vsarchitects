<?php

global $base_root, $base_url;



if (isset($node->field_portfolios_style) && !empty($node->field_portfolios_style)) {

    $post_format = $node->field_portfolios_style['und'][0]['value'];

} else {

    $post_format = theme_get_setting('single_portfolios_style', 'flym');

}

if ($post_format == "") {

    $post_format = 'style1';

}



if (!empty($node->field_image) && isset($node->field_image)) {

    $imageone = $node->field_image['und'][0]['uri'];

    $images = $node->field_image['und'];

    $count = count($images);

} else {

    $imageone = '';

    $images ='';

    $count = 0;

}

$i = 0;

$link_all_portfolio = theme_get_setting('link_all_portfolio', 'flym');



if (!$page) {

    ?>



    <?php

} else {

    ?>

    <section class="section">

        <div class="w-container">

            <div class="w-row">

             <div class="w-col w-col-4 col-left">
                <?php print single_navigation('portfolios', $node->nid, "prev"); ?>
                   </div>
               

                    <div class="w-col w-col-4 col-center">

                        <div class="btn-spc"><a class="button btn-small" href="<?php print  $base_url . '/' .$link_all_portfolio; ?>"><?php print t('all Project'); ?></a>

                        </div>

                    </div>

                 <div class="w-col w-col-4 col-right">

                <?php print single_navigation('portfolios', $node->nid, "next"); ?>
               </div>

            </div>

            <div class="i-stack">

                <?php if ($post_format == "style1"): ?>

                    <?php

                    foreach ($images as $image) :

                        $url = $node->field_image['und'][$i]['uri'];  //full url 

                        ?>    

                        <div class="spc-bott"> <?php print theme('image_style', array('path' => $url, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?></div>                          

                        <?php

                        $i++;

                    endforeach;

                    ?>





                <?php elseif ($post_format == "style2") : ?>

                    <?php if ($count > 1): ?>

                        <div class="spc-bott">

                            <div>

                                <div class="w-tabs" data-duration-in="300" data-duration-out="100">

                                    <div class="w-tab-content">



                                        <?php

                                        foreach ($images as $image) :

                                            $url = $node->field_image['und'][$i]['uri'];  //full url 

                                            ?>  

                                            <div class="w-tab-pane <?php if ($i == 0) print 'w--tab-active'; ?> " data-w-tab="Tab <?php print $i; ?>">

                                                <div> <?php print theme('image_style', array('path' => $url, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?>

                                                    

                                                </div>

                                            </div>



                                            <?php

                                            $i++;

                                        endforeach;

                                        ?>

                                    </div>

                                    <div class="w-tab-menu w-clearfix">

                                        <?php

                                        $i = 0;

                                        foreach ($images as $image) :

                                            $url = $node->field_image['und'][$i]['uri'];

                                            ?>  

                                            <a class="w-tab-link w-inline-block  <?php if ($i == 0) print 'w--current'; ?> slider-tab portfloios-2-tab" data-w-tab="Tab <?php print $i; ?>"><?php print theme('image_style', array('path' => $url, 'style_name' => 'image234x120', 'attributes' => array('alt' => $title))); ?></a>

                                            <?php

                                            $i++;

                                        endforeach;

                                        ?>



                                    </div>

                                </div>

                            </div>

                        </div>



                    <?php elseif ($count == 0): ?>

                        <div class="spc-bott"> <?php print theme('image_style', array('path' => $imageone, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?></div>                          

                    <?php endif; ?>



                <?php elseif ($post_format == "style3"): ?>

                    <?php if ($count > 1): ?>

                        <div class="spc-bott">

                            <div class="w-row">



                                <?php

                                foreach ($images as $image) :

                                    $url = $node->field_image['und'][$i]['uri'];  //full url 

                                    ?>  

                                    <div class="w-col w-col-4 port-0">

                                        <div data-ix="g-hover">

                                            <a class="w-lightbox w-inline-block" href="#">

                                                <div class="gallery-overlay">

                                                    <div class="gall-cnt">

                                                        <h3 class="g-sub" data-ix="gallery-move-up"><?php print $node->field_image['und'][$i]['title']; ?></h3>



                                                    </div>

                                                </div><img src="<?php print file_create_url($url); ?>" alt="<?php print $title;?>">





                                                <script type="application/json" class="w-json">

                                                    {

                                                    "items": [

                                                    {

                                                    "type": "image",

                                                    "url": "<?php print file_create_url($url); ?>",

                                                    "width": 800,

                                                    "height": 800

                                                    }

                                                    ],

                                                    "group": "Gallery"

                                                    }

                                                </script>



                                            </a>



                                        </div>

                                    </div>      



                                    <?php

                                    $i++;

                                endforeach;

                                ?>

                            </div>



                        </div>

                    <?php elseif ($count == 0): ?>

                        <div class="spc-bott"> <?php print theme('image_style', array('path' => $imageone, 'style_name' => 'image1170x603', 'attributes' => array('alt' => $title))); ?></div>                          

                    <?php endif; ?>

                <?php else: ?>

                    <div class="spc-bott video_embed">

                        <div class="w-row">



                            <?php print render($content['field_portfolios_video_embed']); ?>

                                                                       <!--<iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=http%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F115189988&amp;src_secure=1&amp;url=http%3A%2F%2Fvimeo.com%2F115189988&amp;image=http%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F501130728_1280.jpg&amp;key=c4e54deccf4d4ec997a64902e9a30300&amp;type=text%2Fhtml&amp;schema=vimeo" scrolling="no" frameborder="0" allowfullscreen=""></iframe>-->





                        </div>

                    </div>



                <?php endif; ?>

                <div class="spc-bott">

                    <div class="w-row">

                        <div class="w-col w-col-4 div-spc">

                            <div>

                                <h4><?php print t('Skills'); ?></h4>

                                <div class="line-con ln-p"></div>

                            </div>

                            <p><?php print strip_tags(render($content['field_skills'])); ?></p>

                        </div>

                        <div class="w-col w-col-4 div-spc">

                            <div>

                                <h4><?php print t('Client');?></h4>

                                <div class="line-con ln-p"></div>

                            </div>

                            <p><?php print strip_tags(render($content['field_client'])); ?></p>

                        </div>

                        <div class="w-col w-col-4 col-center">

                            <div class="btn-spc"><a class="button btn-line btn-medium" href="<?php print render($content['field_link_site']); ?>"><?php print t('View Project');?></a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="spc-bott">

                    <div class="w-row">

                        <div class="w-col">

                            <?php print render($content['body']); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php } ?>



