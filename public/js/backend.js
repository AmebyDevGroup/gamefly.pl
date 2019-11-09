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
    $(document).on('click', '.single_item .add-item', function (e) {
        var ids = [];
        var newBox = $('.single_item_box.default_item_box').clone();
        newBox.removeClass('default_item_box');
        $("input[name^='items']").each(function (key, item) {
            ids.push(parseInt($(item).attr('name')
                .replace('items', '')
                .replace('[code]', '')
                .replace('[comments]', '')
                .replace('[x]', '0')
                .replace('[', '').replace(']', '')
            ));
        });
        var newValue = (Math.max(...ids) + 1);
        newBox.find('input').each(function (key, item) {
            $(item).attr('name', $(item).attr('name').replace("[x]", "[" + newValue + "]"));
        });
        newBox.appendTo('.items');
    });
    $(document).on('click', '.single_item .remove-item', function (e) {
        $(this).parents('.single_item_box').remove();
    });
});
