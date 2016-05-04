<?php global $base_url;?>
<div class="w-hidden-medium w-hidden-small w-hidden-tiny left-navigation" data-ix="hover-out">
    <div class="hamburger" data-ix="hover">
        <div class="ham2">
            <div class="line-1"></div>
            <div class="line-3" data-ix="90-grade"></div><!-- plus to x interaction -->
        </div>
    </div>
    <nav class="menu-wrapper nav-menu-main">
        <a class="w-inline-block brand" href="<?php print $base_url;?>" data-ix="move"><img src="<?php print $logo;?>" width="120" alt="<?php print $site_name;?>"><!-- logo goes here -->
        </a>

        <?php if ($page['main_menu']): ?>
            <div class="navigation " data-ix="move-2">
                <?php print render($page['main_menu']); ?>
            </div>
        <?php endif; ?>

        <div class="social-ico" data-ix="move">
            <a class="w-inline-block social" href="#">
                <i class="fa fa-facebook-square fa-2x"></i>
            </a>
            <a class="w-inline-block social" href="#">
                <i class="fa fa-twitter-square fa-2x"></i>
            </a>
            <a class="w-inline-block social" href="#">
                <i class="fa fa-pinterest-square fa-2x"></i>
            </a>
            <a class="w-inline-block social" href="#">
                <i class="fa fa-vimeo-square fa-2x"></i>
            </a>
            <div class="copyright">
                <div class="copyright-text">© 2014 Flym by company</div>
            </div>
        </div>
    </nav><!-- end navigation -->
</div>

