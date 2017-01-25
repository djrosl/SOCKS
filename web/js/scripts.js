$(document).ready(function(){
  $('.popup-handler').click(function(e){
      e.preventDefault();
      $('.popup').fadeOut(100);
      var popup = $(this).data('popup');
      $('.'+popup).fadeIn(300)
  });
  $('.popup .close').click(function(e){
      e.preventDefault();
      $(this).parents('.popup').fadeOut(100);
  });
  $('#register-form-email').change(function(){
      //$('#register-form-username').val($(this).val().split('@')[0])
  });
    $('#registration-form').submit(function(e){
        e.preventDefault();

        var data = $(this).serialize();

        $.post($(this).attr('action'), data, function (response) {

                $('.popup').fadeOut(100);

                $('.popup.confirm').fadeIn(100);

        });

    });

    $('body').on('click', '.catalog_slider .owl-next, .catalog_slider .owl-prev', function(e){
            console.log($('.catalog_slider .owl-item.active').next().length);
            if($('.catalog_slider .owl-item:last-child').hasClass('active')){
                $('.catalog_slider').trigger('to.owl.carousel', 0)
            }
        /*if($('.catalog_slider .owl-item.active').index() - 1 == 0){
            $('.catalog_slider').trigger('to.owl.carousel', $('.catalog_slider .owl-item').length)
        }*/
    });
});