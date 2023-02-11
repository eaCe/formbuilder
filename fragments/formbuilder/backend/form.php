<div x-data="formBuilder()">

    <?php
    /**
     * table selection.
     */
    $fragment = new rex_fragment();
    echo $fragment->parse('formbuilder/backend/table-select.php');

    /**
     * fields.
     */
    $fragment = new rex_fragment();
    echo $fragment->parse('formbuilder/backend/fields.php');

    /**
     * field selection.
     */
    $fragment = new rex_fragment();
    echo $fragment->parse('formbuilder/backend/field-select.php');
    ?>

</div>
