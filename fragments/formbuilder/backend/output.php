<?php
/**
 * @var rex_fragment $this
 */

/** @var string $output */
$output = $this->getVar('output');
?>
<textarea class="form-control rex-code rex-js-code" id="template">
<?php if ($output) : ?>
<?= html_entity_decode($output) ?>
<?php endif; ?>
</textarea>
