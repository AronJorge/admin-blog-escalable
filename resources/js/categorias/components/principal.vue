<template>
    <div>
        <div :class="{'card-img-overlay': preloadShow}">
            <div :class="{'sk-cube-grid':preloadShow}">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>
        </div>
        <b-collapse class="mt-2" v-model="showCollapse" id="collapse4">
            <div class="card">
                <div class="card-header">
                    <b>{{ bottomForm? 'Actualizar':'Crear'}} categoria</b>
                </div>

                <div class="card-body">
                    <b-form @submit="onUpdate" @reset="onReset"
                            v-if="bottomForm && JSON.parse(privilegios_modulo).is_actualizar">
                        <div class="row">
                            <b-col cols="12" md="6">
                                <b-input-group size="sm" class="mb-3"
                                               prepend="Nombre de la categoría<span class='text-danger'>*</span>">
                                    <b-form-input v-model="form.nombre" type="text"
                                                  placeholder="Ingresar nombre de la categoría"
                                                  :state="nameState">
                                    </b-form-input>

                                </b-input-group>
                            </b-col>
                        </div>
                        <b-button type="submit" size="sm" variant="primary" :disabled="fielsValidaded">
                            Actualizar
                        </b-button>
                        <b-button type="reset" size="sm" class="limpiarData" variant="danger">Limpiar</b-button>
                        <b-button type="reset" size="sm" @click="showCollapse = false" class="float-right"
                                  variant="secondary">
                            Cancelar
                        </b-button>
                    </b-form>

                    <b-form @submit="onSubmit" @reset="onReset" v-else>
                        <div class="row">
                            <b-col cols="12" md="6">
                                <b-input-group size="sm" class="mb-3"
                                               prepend="Nombre de la categoría<span class='text-danger'>*</span>">
                                    <b-form-input v-model="form.nombre" type="text"
                                                  placeholder="Ingresar nombre de la categoría"
                                                  :state="nameState">
                                    </b-form-input>

                                </b-input-group>
                            </b-col>

                        </div>
                        <b-button type="submit" size="sm" variant="primary" :disabled="fielsValidaded">
                            Guardar
                        </b-button>
                        <b-button type="reset" size="sm" class="limpiarData" variant="danger">Limpiar</b-button>
                        <b-button type="reset" size="sm" @click="showCollapse = false" class="float-right"
                                  variant="secondary">
                            Cancelar
                        </b-button>
                    </b-form>
                </div>
            </div>
        </b-collapse>

        <div class="card">
            <div class="card-header">
                <b>Usuarios</b>
                <div class="card-header-actions pr-2">
                    <a @click="showCollapse = togleCollapse('create'); showCollapseCreate= !showCollapseCreate; bottomForm= false;"
                       :class="showCollapse ? 'collapsed btn-setting' : 'btn-setting'"
                       aria-controls="collapse4"
                       :aria-expanded="showCollapse ? 'true' : 'false'"
                       v-if="JSON.parse(privilegios_modulo)['is_crear']">
                        <span class="text-primary font-weight-bold">Crear</span> <i
                        class="fas fa-user-plus text-primary"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">

                <b-alert variant="danger"
                         dismissible
                         :show="showDismissibleAlert"
                         @dismissed="showDismissibleAlert=false">
                    {{ mensageAlert }}
                </b-alert>
                <div class="table-responsive">
                    <b-container fluid>
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
                                 empty-text="No hay datos para mostrar"
                                 empty-filtered-text="No hay registros que coincidan con su solicitud"
                                 @filtered="onFiltered">

                            <template slot="email_verified_at" slot-scope="row">
                                <span v-if="row.value == null" class="btn-brand btn-sm btn-youtube"><i
                                    class="far fa-envelope"></i><span><i class="fas fa-user-times"></i></span></span>
                                <span v-else class="btn-brand btn-sm btn-spotify"><i
                                    class="far fa-envelope"></i><span><i class="fas fa-user-check"></i></span></span>
                            </template>
                            <template slot="actions" slot-scope="row">
                                <a @click="onEdit(row.item);togleCollapse('update');showCollapseCreate=false; bottomForm=true"
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
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    let expresionRegularEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    export default {
        name: "principal",
        props: ['categorias', 'privilegios_modulo'],
        data() {
            return {
                form: {
                    nombre: ''
                },
                items: [],
                fields: [
                    {key: 'nombre', label: 'Nombre', sortable: true},
                    {key: 'actions', label: 'Actions'}
                ],
                currentPage: 1,
                perPage: 5,
                totalRows: '',
                pageOptions: [5, 10, 15,25,50,75,100],
                sortBy: null,
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                bottomForm: false,
                showCollapse: false,
                showCollapseCreate: false,
                showCollapseUpdate: false,
                preloadShow: false,
                itemEdit: {},
                showDismissibleAlert: false,
                mensageAlert: ''
            }
        },
        computed: {
            nameState() {
                return this.form.nombre.length > 2 ? true : false
            },

            fielsValidaded() {
                return !(this.form.nombre.length > 2)

            },
            sortOptions() {
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            }
        },
        created() {
            this.items = JSON.parse(this.categorias);
            this.totalRows = this.items.length;
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            togleCollapse(method) {
                if (method == 'create' && this.showCollapse && !this.showCollapseCreate) {
                    document.getElementsByClassName('limpiarData')[0].click();
                    return true;
                }
                else if (method == 'create' && !this.showCollapse && !this.showCollapseCreate)
                    return true;
                else if (method == 'update' && this.showCollapse && this.showCollapseCreate)
                    return true;
                else if (method == 'create' && this.showCollapse && this.showCollapseCreate) {
                    document.getElementsByClassName('limpiarData')[0].click();
                    return false;
                }
            },
            onSubmit(evt) {
                evt.preventDefault();
                this.preloadShow = true;

                axios.post(`/admin/categorias`, this.form).then(res => {
                    this.items.unshift(res.data);
                    document.getElementsByClassName('limpiarData')[0].click();
                    this.preloadShow = false;
                }).catch(fail => {
                    console.log('fail', fail)
                    this.preloadShow = false;
                });
            },
            onEdit(item) {
                this.showCollapse = true;
                this.itemEdit = item;
                this.form = {
                    id: item.id,
                    nombre: item.nombre,
                };
            },
            onUpdate(evt) {
                evt.preventDefault();
                this.preloadShow = true;

                axios.put(`/admin/categorias/${this.form.id}`, this.form).then(res => {
                    Object.assign(this.items[this.items.indexOf(this.itemEdit)], res.data);
                    document.getElementsByClassName('limpiarData')[0].click();
                    this.showCollapse = false;
                    this.preloadShow = false;

                }).catch(fail => {
                    console.log('fail', fail.response)
                    this.showDismissibleAlert = true;
                    this.mensageAlert = fail.response.data;
                    this.preloadShow = false;
                });
            },
            onDelete(item) {
                axios.delete(`/admin/categorias/${item.id}`).then(res => {
                    this.items.splice(this.items.indexOf(item), 1);
                }).catch(fail => {
                    console.log(fail.data)
                });
            },
            onReset(evt) {
                evt.preventDefault();
                /* Reset our form values */
                this.form.nombre = '';
                this.form.id = '';
                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                });
            }
        }
    }
</script>

<style scoped lang="scss">
    .card-img-overlay {
        z-index: 2000;
        padding-left: 200px !important;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sk-cube-grid {
        width: 40px;
        height: 40px;
        /*margin: 100px auto;*/
        z-index: 2001;
    }

    .sk-cube-grid .sk-cube {
        width: 33%;
        height: 33%;
        background-color: #9e1315;
        float: left;
        -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
        animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
    }

    .sk-cube-grid .sk-cube1 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .sk-cube-grid .sk-cube2 {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }

    .sk-cube-grid .sk-cube3 {
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }

    .sk-cube-grid .sk-cube4 {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }

    .sk-cube-grid .sk-cube5 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    .sk-cube-grid .sk-cube6 {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;
    }

    .sk-cube-grid .sk-cube7 {
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
    }

    .sk-cube-grid .sk-cube8 {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }

    .sk-cube-grid .sk-cube9 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    @-webkit-keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
        }
        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
        }
    }

    @keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
            -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
        }
        35% {
            -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
        }
    }
</style>
