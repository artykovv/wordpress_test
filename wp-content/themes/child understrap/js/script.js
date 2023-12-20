jQuery(document).ready(function($) {
    $('#property-form').submit(function (e) {
        e.preventDefault();

        var title = $('#property-title').val();
        var description = $('#property-description').val();
        var img = $('#property-img')[0].files[0];
        var tip = $('#property-tip').val();
        var city = $('#property-city').val();
        var ploschad = $('#property-ploschad').val();
        var stoimost = $('#property-stoimost').val();
        var zhilayaPloschad = $('#property-zhilaya-ploschad').val();
        var etazh = $('#property-etazh').val();
        var adres = $('#property-zhilaya-adres').val(); // Исправлено на правильный ID

        var formData = new FormData();
        formData.append('action', 'add_property');
        formData.append('title', title);
        formData.append('description', description);
        formData.append('img', img);
        formData.append('tip', tip);
        formData.append('city', city);
        formData.append('ploschad', ploschad);
        formData.append('stoimost', stoimost);
        formData.append('zhilayaPloschad', zhilayaPloschad);
        formData.append('etazh', etazh);
        formData.append('adres', adres); // Добавляем значение адреса

        $.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#response-message').html(response);
            }
        });
    });
});
