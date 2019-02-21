<template>

    <div class="table-responsive">
        <b-container fluid>
            <!-- User Interface controls -->
            <b-row>
                <b-col md="6" class="my-1">
                    <b-form-group horizontal label="Buscar" class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="filter" placeholder="Escriba para buscar"/>
                            <b-input-group-append>
                                <b-btn :disabled="!filter" @click="filter = ''">Limpiar</b-btn>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>

                <b-col md="6" class="my-1">
                    <b-form-group horizontal label="por pagina" class="mb-0">
                        <b-form-select :options="pageOptions" v-model="perPage"/>
                    </b-form-group>
                </b-col>
            </b-row>

            <!-- Main table element -->
            <b-table show-empty
                     stacked="md"
                     small
                     :items="items"
                     :fields="fields"
                     :current-page="currentPage"
                     :per-page="perPage"
                     :filter="filter"
                     :sort-by.sync="sortBy"
                     :sort-desc.sync="sortDesc"
                     :sort-direction="sortDirection"
                     @filtered="onFiltered">
                <template slot="is_superadmin" slot-scope="row">
                    <span class="badge badge-primary" v-if="row.value">Superadmin</span>
                    <span class="badge badge-secondary" v-else>Estandar</span>
                </template>
                <template slot="actions" slot-scope="row">
                    <a :href="'/admin/roles/'+ row.item.id +'/edit'"
                       class="btn btn-brand btn-stack-overflow btn-sm"  v-if="JSON.parse(privilegios_modulo)['is_actualizar']">
                        <i class="fa fa-user-edit"></i>
                    </a>
                    <a @click="onDelete(row.item)" class="btn btn-brand btn-youtube btn-sm text-white"  v-if="JSON.parse(privilegios_modulo)['is_eliminar']">
                        <i class="fa fa-trash"></i>
                    </a>
                </template>
            </b-table>

            <b-row>
                <b-col md="6" class="my-1">
                    <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage"
                                  class="my-0"/>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>


<script>
    export default {
        name: "principal",
        props: ['roles','privilegios_modulo'],
        data() {
            return {
                items: [],
                fields: [
                    {key: 'id', label: 'ID', sortable: true},
                    {key: 'nombre', label: 'Nombre', sortable: true},
                    {key: 'is_superadmin', label: 'Tipo de rol', sortable: true},
                    {key: 'actions', label: 'Actions'}
                ],
                currentPage: 1,
                perPage: 5,
                totalRows: '',
                pageOptions: [5, 10, 15],
                sortBy: null,
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                showCollapse: false
            }
        },
        computed: {
            sortOptions() {
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            }
        },
        created() {
            this.items = JSON.parse(this.roles);
            this.totalRows = this.roles.length;
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            onSubmit(evt) {
                evt.preventDefault();
                alert(JSON.stringify(this.form));
            },
            onReset(evt) {
                evt.preventDefault();
                /* Reset our form values */
                this.form.email = '';
                this.form.name = '';
                this.form.food = null;
                this.form.checked = [];
                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                });
            },
            onDelete(item) {
                axios.delete(`/admin/roles/${item.id}`).then(res => {
                    this.items.splice(this.items.indexOf(item), 1)
                }).catch(fail => {
                    Error('fail', fail)
                })
            }
        }
    }
</script>

<style scoped>

</style>
