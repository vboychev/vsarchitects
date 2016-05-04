<?php if(isset($rows)):?>
<div class="w-container">
          <div class="w-slider carousel-ibox" data-animation="cross" data-duration="500" data-infinite="1">
            <div class="w-slider-mask">
                <?php print $rows;?>
                 </div>
            <div class="w-slider-nav w-slider-nav-invert w-round crs-dot"></div>
          </div>
        </div>
<?php endif;?>