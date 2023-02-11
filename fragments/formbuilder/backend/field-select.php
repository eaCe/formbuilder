<?php
/**
 * @var rex_fragment $this
 */

/** @var array $fields */
$fields = $this->getVar('fields');
?>

<div class="relative">
    <button class="btn btn-primary"
            :disabled="table==''"
            @click.prevent="showFieldSelection=!showFieldSelection">
        Feld hinzufügen
    </button>

    <ul id="field-select"
        class="absolute left-0 bg-white list-unstyled rounded-md overflow-auto max-h-80 min-w-[200px] divide-y divide-solid divide-gray-200 border border-solid border-gray-200 my-1"
        @click.outside="showFieldSelection=false"
        x-show="showFieldSelection">
        <?php
        if ($fields) {
            foreach ($fields as $field) {
                $fragment = new rex_fragment();
                $fragment->setVar('field', $field);
                echo $fragment->parse('formbuilder/backend/field-list-item.php');
            }
        }
        ?>
    </ul>
</div>
