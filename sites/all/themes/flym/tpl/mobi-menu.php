<?php global $base_url;?> 
<div class="w-nav w-hidden-main responsive-nav" data-collapse="medium" data-animation="over-left" data-duration="400" data-contain="1">
      <div class="w-container">
        <a class="w-nav-brand brand-res" href="<?php print $base_url;?>"><img src="<?php print $logo;?>" width="70" alt="<?php $site_name;?>">
        </a>
        
        <!-- start responsive navigation -->
       
          <?php if ($page['main_menu']): ?>
         <nav class="w-nav-menu res-menu nav-menu-main " role="navigation">
                <?php print render($page['main_menu']); ?>
             </nav><!-- end responsive navigation -->
        <?php endif; ?>
        
        <div class="w-nav-button menu-button">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>