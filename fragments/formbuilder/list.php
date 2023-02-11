<?php
/**
 * @var rex_fragment $this
 */

/** @var array $fields */
$content = $this->getVar('content');
?>
<?php if ($content) : ?>
<?= $content ?>
<?php endif; ?>
