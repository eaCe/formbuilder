<?php
/**
 * @var rex_fragment $this
 */
?>

<button
    class="btn btn-success"
    :disabled="table=='' || template=='' || !fields.length"
    @click="generateTemplate()">
    Generate Template
</button>
