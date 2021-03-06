$('body').on('submit', '.product-create', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/staff/product',
        type: 'POST',
        contentType: false,
        processData: false,
        data: new FormData(this),
        success: function (data) {
            if ($.isEmptyObject(data.error)) {
                if (data.success) {
                    toastr.success(data.success);
                }else{
                    toastr.error(data.unable);
                }
            }else{
                $.each(data.error, function (key, value) {
                    toastr.error(value);
                })
            }
        }
    })
})

  function convertToSlug(text, place) {
    text = text.toLowerCase();
    text = text.replace(/[^a-zA-Z0-9]+/g, '-');
      $(place).val(text);
  }

  $(document).ready(function(){

    $("#yes_sp").click(function() {
        $(".special_details").slideToggle();
    });

    $("#yes").click(function() {
        $(".wrrantyshow").slideToggle();
    });
});

$(document).on('click','#checkall', function () {
    if (this.checked) {
        $('.checkbox-item').each(function () {
            this.checked = true;
        })
    }else{
        $('.checkbox-item').each(function () {
            this.checked = false;
        })
    }
})

$(document).on('click', '.checkbox-item', function () {
    if ($('.checkbox-item').length === $('.checkbox-item:checked').length) {
        $('#checkall').prop('checked', true);
    }else{
        $('#checkall').prop('checked', false);
    }
})
