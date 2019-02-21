<template>
    <div>
        <div class="card">


            <div class="card-body">
                <template>
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
                            <template slot="categoria" slot-scope="row">
                                {{ row.value.nombre }}
                            </template>
                            <template slot="publicar" slot-scope="row">
                                <span class="badge badge-success" v-if="row.value">Publicado</span>
                                <span class="badge badge-warning" v-else>Borrador</span>
                            </template>
                            <template slot="acciones" slot-scope="row">
                                <a :href="'/admin/articulos/'+row.item.id+'/edit'"
                                   class="btn btn-brand btn-stack-overflow btn-sm text-white"
                                   v-if="JSON.parse(privilegios_modulo)['is_actualizar']">
                                    <i class="fa fa-user-edit"></i>
                                </a>
                                <a @click="onDelete(row.item)" class="btn btn-brand btn-youtube btn-sm text-white"
                                   v-if="JSON.parse(privilegios_modulo)['is_eliminar']">
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
                </template>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'articulo',
        props: ['privilegios_modulo'],
        data() {
            return {
                items: [],
                fields: [
                    {key: 'titulo', label: 'Título', sortable: true, sortDirection: 'asc'},
                    {key: 'categoria', label: 'Categorías', sortable: true},
                    {key: 'publicar', label: 'Publicado'},
                    {key: 'acciones', label: 'Acciones'}
                ],
                currentPage: 1,
                perPage: 5,
                totalRows: 0,
                pageOptions: [5, 10, 15],
                sortBy: null,
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
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
            axios.get('/admin/list/articulo').then(res => {
                console.log(res)
                this.items = res.data;
                this.totalRows = this.items.length
            }).catch(fail => {
                console.log(fail)
            });
        },
        methods: {
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            onDelete(item) {
                axios.delete(`/admin/articulos/${item.id}`).then(res => {
                    this.items.splice(this.items.indexOf(item), 1);
                }).catch(fail => {
                    console.log(fail.data)
                });
            },
        }
    }
</script>

<style scoped lang="scss">
</style>
