<script>
    window.formBuilder = () => {
        return {
            table: '',
            showFieldSelection: false,
            fields: [],
            init() {
                // reset data
                this.table = '';
                this.showFieldSelection = false;
                this.fields = [];
                // :/
                setTimeout(() => {
                    this.$refs.tableSelect.value = '';
                }, 1)
            },
            setTable() {
                this.table = this.$refs.tableSelect.value;
            },
            resetTable() {
                this.table = this.$refs.tableSelect.value;
            },
            unsetTable() {
                this.table = '';
            },
            addField(field) {
                this.fields.push(field);
                this.showFieldSelection = false;
            },
            deleteField(index) {
                if (confirm('Delete field?')) {
                    this.fields.splice(index, 1);
                }
            },
        }
    };


    window.fieldListItem = (field) => {
        return {
            field: field
        }
    };
</script>

<?php
$form = new rex_fragment();

$fragment = new rex_fragment();
$fragment->setVar('body', $form->parse('formbuilder/backend/form.php'), false);
echo $fragment->parse('core/page/section.php');
?>
