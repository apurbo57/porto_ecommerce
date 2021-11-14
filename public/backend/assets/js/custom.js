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
