<?php
/**
 * @var rex_fragment $this
 */

$tablesArray = \FriendsOfREDAXO\Builder::getTablesArray();
?>
<form method="get"
      :action="rex.fb_url"
      x-target="field-select"
      @ajax:before="unsetTable();showLoader();showFieldSelection=false"
      @ajax:after="setTable();hideLoader()"
      x-ajax>
    <label for="table-select">
        <?= rex_i18n::msg('formbuilder_table_select') ?>
    </label>
    <select name="table"
            id="table-select"
            class="form-control"
            x-ref="tableSelect"
            @change="$el.form.requestSubmit()"
            :disabled="fields.length !== 0">
        <option value="" disabled></option>
        <?php
        foreach ($tablesArray as $tableArray) {
            $table = rex_yform_manager_table::get($tableArray['table_name']);
            echo '<option value="' . $table->getTableName() . '">' . $table->getName() . '</option>';
        }
        ?>
    </select>
</form>
