<?php
/**
 * @var rex_fragment $this
 */

/** @var array $fields */
$field = $this->getVar('field');
?>

<?php if ($field) : ?>
    <li class="border-x-0"
        x-data='fieldListItem(<?= json_encode($field) ?>)'>
        <button
            @click.prevent="addField(field)"
            class="btn btn-default rounded-none border-0 w-full text-left block">
            <?= $field['name'] ?>
        </button>
    </li>
<?php endif; ?>
