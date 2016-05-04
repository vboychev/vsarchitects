<div class="w-container">
    <?php if (isset($header)): ?>
        <?php print $header; ?>
    <?php endif; ?>
    <div class="w-slider carousel-ibox c-clients" data-animation="slide" data-duration="800" data-infinite="1" data-ix="show-arrow" data-delay="6000" data-autoplay="1">
        <div class="w-slider-mask">
            <?php if (isset($rows)): ?>

                <div class="w-slide w-clearfix">
                    <?php print $rows; ?>
                </div>

            <?php endif; ?>
            <?php if (isset($attachment_after)): ?>
                <div class="w-slide w-clearfix">
                    <?php print $attachment_after; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

