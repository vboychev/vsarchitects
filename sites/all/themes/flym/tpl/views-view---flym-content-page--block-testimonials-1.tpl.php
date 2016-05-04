
<div class="w-container">
    <?php if (isset($header)): ?>
        <?php print $header; ?>
    <?php endif; ?>
    <?php if (isset($rows)): ?>
        <div class="w-slider carousel-ibox" data-animation="cross" data-duration="500" data-infinite="1">
            <div class="w-slider-mask">
                <?php print $rows; ?>
            </div>
            <div class="w-slider-nav w-slider-nav-invert w-round crs-dot"></div>
        </div>
    <?php endif; ?>
</div>


