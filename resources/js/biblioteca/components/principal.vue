<template>
    <b-container fluid class="p-4">
        <b-row>
            <b-alert class="col-12"
                     variant="danger"
                     dismissible
                     fade
                     :show="showDismissibleAlert"
                     @dismissed="showDismissibleAlert=false">
                El enlace de la imagen no se puede eliminar porque es usado por un articulo.
            </b-alert>

            <div class="col-12 col-md-2" v-for="image in imagenes">
                <b-img thumbnail fluid :src="image.url_imagen"/>
                {{ image.url_imagen }}
                <a @click="deleteItem(image)"
                   :class="privilegios.is_eliminar?'btn btn-danger btn-sm text-white':'btn btn-danger btn-sm text-white d-none'"><i
                    class="far fa-trash-alt"></i></a>
            </div>
        </b-row>
    </b-container>
</template>


<script>
    export default {
        name: 'biblioteca',
        props: ['imagenes_http', 'ruta_eliminar', 'lista_privilegios'],
        data() {
            return {
                imagenes: JSON.parse(this.imagenes_http),
                privilegios: {},
                showDismissibleAlert: false
            }
        },
        created() {
            axios.get(this.lista_privilegios).then(res => {
                this.privilegios = res.data
            }).catch(fail => {
            });
        },
        methods: {
            deleteItem(item) {
                axios.delete(this.ruta_eliminar + '/' + item.id).then(res => {
                    this.imagenes.splice(this.imagenes.indexOf(item), 1);
                }).catch(fail => {
                    console.log('fail',fail)
                    this.showDismissibleAlert = true;
                });
            },
            countDownChanged(dismissCountDown) {
                this.dismissCountDown = dismissCountDown
            },
            showAlert() {
                this.dismissCountDown = this.dismissSecs
            }
        }
    }
</script>

<style scoped lang="scss">
</style>
