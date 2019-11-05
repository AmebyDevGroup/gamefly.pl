$(document).ready(function () {
    $('.editor').each(function () {
        CKEDITOR.replace(this.id, {
            uiColor: '#343a40'
        });
    });
    
});
