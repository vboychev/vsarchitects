<div class="w-container">

    <?php if (isset($header)): ?>
        <div><?php print $header; ?></div>
    <?php endif; ?>

    <?php if (isset($rows)): ?>
        <div>
            <div class="w-row row-cn"><?php print $rows; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
