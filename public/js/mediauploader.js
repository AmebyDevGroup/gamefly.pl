$(function () {
    const kw_imup_container = $('.foto-upload');
    const styles = '<style>.foto-upload .wrapper{display:flex;justify-content:center;flex-direction:column;text-align:center;height:250px;padding:15px;border:1px solid #ced4da;border-radius:.25rem;color:#495057;background:#fff}.foto-upload .hidden{display:none}.foto-upload .file{display:none;margin:0 auto}.foto-upload img{display:block;margin:0 auto;height:150px;width:auto;box-shadow:0 0 20px 0 #ccc}</style>';
    if (kw_imup_container.length) {
        $(document).find('head').prepend(styles);
        kw_imup_container.each(function () {
            let inputFile = $(this).find('input[type=file]').first();
            let currentImage = inputFile.data('image');
            let inputName = inputFile.attr('name');
            let defaultLabel = $(this).find('.label').html();
            let img, btn, txt = 'Wybierz', txtAfter = 'Wybierz inny plik';
            if (!$(this).find('#' + inputName + '_upload').length) {
                $(this).find('.input').append('<input type="button" value="' + txt + '" id="' + inputName + '_upload" class="btn btn-secondary">');
                btn = $('#' + inputName + '_upload');
                $(this).find('.wrapper').prepend('<img src="" class="hidden" alt="Przesłany plik" id="' + inputName + '_uploadImg" width="100%">');
                img = $('#' + inputName + '_uploadImg');
                if (currentImage != null) {
                    img.attr('src', currentImage);
                    img.removeClass('hidden');
                    kw_imup_container.find('.label').html(inputFile.data('image_name'));
                    btn.val(txtAfter);
                }
            }
            btn.on('click', function () {
                inputFile.click();
            });
            inputFile.on('change', function (e) {
                if (inputFile.val()) {
                    kw_imup_container.find('.label').html(inputFile.val());
                    var i = 0;
                    for (i; i < e.originalEvent.srcElement.files.length; i++) {
                        var file = e.originalEvent.srcElement.files[i],
                            reader = new FileReader();
                        reader.onloadend = function () {
                            img.attr('src', reader.result).animate({opacity: 1}, 700);
                        };
                        reader.readAsDataURL(file);
                        img.removeClass('hidden');
                    }
                    btn.val(txtAfter);
                } else {
                    img.animate({opacity: 0}, 300);
                    img.addClass('hidden');
                    kw_imup_container.find('.label').html(defaultLabel);
                    btn.val(txt);
                }
            });
        })
    }
});
