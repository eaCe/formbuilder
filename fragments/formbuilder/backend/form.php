<div x-data="formBuilder()">

    <div class="row">
        <div class="col-md-6">
            <?php
            /**
             * table selection.
             */
            $fragment = new rex_fragment();
            echo $fragment->parse('formbuilder/backend/table-select.php');
            ?>
        </div>
        <div class="col-md-6">
            <?php
            /**
             * template selection.
             */
            $fragment = new rex_fragment();
            echo $fragment->parse('formbuilder/backend/template-select.php');
            ?>
        </div>
    </div>

    <hr>

    <?php
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

    <hr>

    <?php
    /**
     * generate template button.
     */
    $fragment = new rex_fragment();
    echo $fragment->parse('formbuilder/backend/generate-button.php');
    ?>

    <template x-if="showTemplate">
        <div class="mt-6">
            <?php
            $fragment = new rex_fragment();
            echo $fragment->parse('formbuilder/backend/output.php');
            ?>
        </div>
    </template>
</div>
