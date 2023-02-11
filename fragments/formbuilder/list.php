<?php
/**
 * @var rex_fragment $this
 */

/** @var array $fields */
$content = $this->getVar('content');
?>
<?php if ($content) : ?>
<div class="list">
    <?= $content ?>
</div>
<?php endif; ?>
