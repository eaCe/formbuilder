window.formBuilder = () => {
    return {
        table: '',
        template: '',
        showFieldSelection: false,
        showTemplate: false,
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
            // clone field object, destroy reference
            const fieldObject = Object.assign({}, field);
            fieldObject['field_type'] = '';
            fieldObject['uid'] = this.getUID();
            this.fields.push(fieldObject);
            this.showFieldSelection = false;
        },
        deleteField(index) {
            if (confirm('Delete field?')) {
                this.fields.splice(index, 1);
            }
        },
        getUID() {
            let timestamp = new Date().getTime();
            return 'xxxxxxxxxxxxxxxxxxx'.replace(/[x]/g, function (c) {
                const r = (timestamp + Math.random() * 16) % 16 | 0;
                timestamp = Math.floor(timestamp / 16);
                return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });
        },
        generateTemplate() {
            const data = {
                table: this.table,
                template: this.template,
                fields: this.fields
            }
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
                    type_name: 'text',
                    uid: this.getUID()
                },
                {
                    field_type: 'textarea',
                    label: 'Test',
                    name: 'test',
                    type: 'value',
                    type_name: 'text',
                    uid: this.getUID()
                },
                {
                    field_type: 'text',
                    label: 'Test',
                    name: 'test',
                    type: 'value',
                    type_name: 'text',
                    uid: this.getUID()
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
