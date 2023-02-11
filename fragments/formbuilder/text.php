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
    @php
        $test = 'test';
    @endphp
    <div>Text - List Output</div>
<?php break; ?>
<?php case 'cards': ?>
    <div>Text - Cards Output</div>
<?php break; ?>
<?php endswitch; ?>
