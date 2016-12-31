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
      $('#register-form-username').val($(this).val().split('@')[0])
  });
    $('#registration-form').submit(function(e){
        e.preventDefault();

        var data = $(this).serialize();

        $.post($(this).attr('action'), data, function (response) {

                $('.popup').fadeOut(100);

                $('.popup.confirm').fadeIn(100);

        });

    });

    /*$('#login-form').submit(function(e){
        e.preventDefault();

        var data = $(this).serialize();

        $.post($(this).attr('action'), data, function (response) {
            if(response){
                window.location.href = window.location.href;
            }
        });

    });*/
});