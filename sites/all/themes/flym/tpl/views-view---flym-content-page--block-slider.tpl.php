   <!-- start slider page -->
  <?php if(isset($rows)):?>
   <div class="w-slider m-slider" data-animation="slide" data-duration="500" data-infinite="1" data-hide-arrows="1">
      <div class="w-slider-mask">
          <?php print $rows; ?>
      </div>
        <div class="w-slider-arrow-left">
        <div class="w-icon-slider-left m-arrow"></div>
      </div>
      <div class="w-slider-arrow-right">
        <div class="w-icon-slider-right m-arrow ma-2"></div>
      </div>
    </div>
   <?php endif;?>