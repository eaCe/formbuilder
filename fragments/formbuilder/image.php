<?php
/**
 * @var rex_fragment $this
 */

/** @var \FriendsOfREDAXO\Field $field */
$field = $this->getVar('field');

if (!$field) {
    return '';
}
?>

<?php switch ($field->getTemplate()): ?>
<?php case 'list': ?>
    <div>Image - List Output</div>
<?php break; ?>
<?php case 'cards': ?>
    <div>Image - Cards Output</div>
<?php break; ?>
<?php endswitch; ?>
