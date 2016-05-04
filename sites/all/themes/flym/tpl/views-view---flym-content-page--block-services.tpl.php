
<div class="w-container">
    <div class="w-row">
        <?php if (isset($rows)): ?>
            <div class="w-col w-col-9 w-col-stack div-spc">
                <div class="w-row">
                    <?php print $rows; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($footer)): ?>
            <div class="w-col w-col-3 w-col-stack">
                <?php print $footer; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

