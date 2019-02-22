let editor_config = {
    path_absolute: "/",
    selector: "#articulo",
    language: 'es_CO',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern",
    ],
    height: 400,
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media fullscreen",
    relative_urls: false,
    image_dimensions: false,
    image_class_list: [
        {title: 'Responsiva miniatura', value: 'img-thumbnail-tinymce'},
        {title: 'Solo responsiva', value: 'img-fluid'},
        {title: 'Responsiva rondodeada', value: 'img-fluid rounded'},
    ],
    file_browser_callback: function (field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name + '&data=124&type=Files';

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no"
        });
    }
};

tinymce.init(editor_config);
$('#lfm').filemanager('image');

let limpiar_btn = document.getElementById('limpiar-btn');

document.getElementById('img-entrada').addEventListener('change', function () {
    document.getElementById('holder').removeAttribute('src')
    this.classList.remove('is-invalid')
    let img_valida = /.*(jpe?g|png|gif|tif?[ff]|svg)\b/.test(this.value)

    if (img_valida) {
        this.classList.remove('is-invalid')
        document.getElementById('holder').setAttribute('src', this.value)
    } else if (!this.value) {
        this.classList.remove('is-invalid')
        document.getElementById('holder').removeAttribute('src')
    } else
        this.classList.add('is-invalid')
});

limpiar_btn.addEventListener('click', function () {
    document.getElementById('holder').removeAttribute('src')
});

