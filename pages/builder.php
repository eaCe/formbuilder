<script>
    window.formBuilder = () => {
        return {
            table: '',
            template: '',
            showFieldSelection: false,
            fields: [],
            loader: document.getElementById('rex-js-ajax-loader'),
            init() {
                // reset data
                this.table = '';
                this.template = '';
                this.showFieldSelection = false;
                this.fields = [];
                // :/
                setTimeout(() => {
                    this.$refs.tableSelect.value = '';

                    // TODO: remove
                    // this.fakeData();
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
                field['field_type'] = '';
                this.fields.push(field);
                this.showFieldSelection = false;
            },
            deleteField(index) {
                if (confirm('Delete field?')) {
                    this.fields.splice(index, 1);
                }
            },
            generateTemplate() {
                const data = {
                    table: this.table,
                    template: this.template,
                    fields: this.fields
                }

                console.log('builder.php:45', '  ↴', '\n', data);
            },
            showLoader() {
                this.loader.classList.add('rex-visible');
            },
            hideLoader() {
                this.loader.classList.remove('rex-visible');
            },
            fakeData() {
                // for development only...
                this.$refs.tableSelect.value = 'rex_test';
                this.table = 'rex_test';
                this.template = 'list';
                this.fields = [
                    {
                        field_type: 'html',
                        label: 'Test',
                        name: 'test',
                        type: 'value',
                        type_name: 'text'
                    },
                    {
                        field_type: 'textarea',
                        label: 'Test',
                        name: 'test',
                        type: 'value',
                        type_name: 'text'
                    },
                    {
                        field_type: 'text',
                        label: 'Test',
                        name: 'test',
                        type: 'value',
                        type_name: 'text'
                    }
                ];
            }
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
