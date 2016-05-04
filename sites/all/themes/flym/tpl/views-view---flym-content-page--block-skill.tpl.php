<div class="w-container">
    <div class="w-row">
        <?php if (isset($footer)): ?>
            <?php print $footer; ?>
        <?php endif; ?>
        <div class="w-col w-col-5 w-col-stack">
            <?php if (isset($header)): ?>              
                <?php print $header; ?>
            <?php endif; ?>
            <?php if (isset($rows)): ?>
                <ul class="w-list-unstyled ul-sp">
                    <?php print $rows; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>