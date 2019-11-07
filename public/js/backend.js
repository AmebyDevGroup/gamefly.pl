$(document).ready(function () {
    $('.editor').each(function () {
        CKEDITOR.replace(this.id, {
            uiColor: '#343a40'
        });
    });
    $(function () {
        $(".bootstrap-tagsinput input").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: $('#tags').data('autocomplete'),
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                $('#tags').tagsinput('add', ui.item.value);
                $(this).val("");
                $(this).html("");
                return false;
            }
        });
    });
});
