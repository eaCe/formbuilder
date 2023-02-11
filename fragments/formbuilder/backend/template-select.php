<?php
/**
 * @var rex_fragment $this
 */
?>
<form>
    <label for="table-select">
        <?= rex_i18n::msg('formbuilder_template_select') ?>
    </label>
    <select name="template"
            id="template-select"
            class="form-control"
            x-model="template"
            :disabled="table===''">
        <option value="" disabled></option>
        <option value="list">List</option>
        <option value="cards">Cards</option>
        <option value="article">Article</option>
    </select>
</form>
