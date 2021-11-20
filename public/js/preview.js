
const preview = document.getElementById('preview');
const placeholder = 'https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png';
const pictureInput = document.getElementById('picture');

pictureInput.addEventListener('change', function() {
    const url = this.value;
    console.log(url);
    if (url) {
        preview.setAttribute('src', url);
        } else {
            preview.setAttribute('src', placeholder);
        }
});