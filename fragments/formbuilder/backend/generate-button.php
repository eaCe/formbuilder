<?php
/**
 * @var rex_fragment $this
 */
?>

<form
    method="post"
    x-ajax
    @ajax:before="showLoader()"
    @ajax:after="hideLoader();showTemplate=true"
    @ajax:error="showTemplate=false"
    x-target="template"
    :action="rex.fb_url">
    <button
        class="btn btn-success"
        :disabled="table=='' || template=='' || !fields.length"
        @click="generateTemplate()">
        Generate Template
    </button>

    <input type="hidden" name="generate" value="true">
    <input type="hidden" name="table" :value="table">
    <input type="hidden" name="template" :value="template">
    <input type="hidden" name="fields" :value="JSON.stringify(fields)">
</form>
