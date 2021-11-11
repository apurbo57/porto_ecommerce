$('body').on('submit', '.product-create', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/staff/product',
        type: 'POST',
        data: $(this).serialize(),
        success: function (data) {
            console.log(data)
        }
    })
})