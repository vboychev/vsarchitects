<div class="w-hidden-tiny w-clearfix div-social">
    <div class="w-clearfix filters">
        <ul class="w-list-unstyled filter-list">
            <li class="filter-iterm"><a class="filter" href="#" data-filter="all">All</a>
                <?php
                $name = 'project_categories';
                $myvoc = taxonomy_vocabulary_machine_name_load($name);
                $tree = taxonomy_get_tree($myvoc->vid);
                foreach ($tree as $term) {
                    print'<li class="filter-iterm"><a class="filter" href="#" data-filter=".' . $term->tid . '">' . $term->name . '</a>
            </li>';
                }
                ?>
            <li class="filter-iterm">
                <a class="w-inline-block filter filter-star" href="#" data-filter=".star">
                    <i class="fa fa-star fa-2x"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end of portfolio filters-->
<?php if ($rows): ?>
    <div class="w-clearfix grid" id="Grid">
        <?php print $rows; ?>
    </div>
<?php endif; ?>
<!-- end of portfolio grid-->
<?php if ($pager): ?>
    <?php print $pager; ?>
<?php endif; ?>

