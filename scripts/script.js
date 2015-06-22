$(window).load(function () {

    //load_message();
    load_people();

    $('#message').submit(function (e) {

        e.preventDefault();


        var message = $('.message').val();
        var from_id = $('.from_id').val();
        var to_id = $('.to_id').val();


        var date_send = $.now();

        var url = 'http://test.loc/message';
        if (to_id.length > 0) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {

                    message: message,
                    from_id: from_id,
                    to_id: to_id,

                    date_send: date_send
                }

            }).done(function (data) {

                load_message(to_id);
                $('.chat_window').scrollTop(10000);
                $('.message').val('');
            }).fail(function (data) {
                console.log('fail');
            });


        }


    });


    function load_message(to_id) {

        var url_chat = 'http://test.loc/message/load_message/' + to_id;

        //var from_id = $('.from_id').val();
        //var to_id = $('.to_id').val();


        $.ajax({
            url: url_chat
            //type: 'POST',
            //data: {
            //    from_id: from_id,
            //    to_id: to_id
            //
            //}
        }).done(function (data) {


            $('.chat-message').html(data);


            $('.chat-message').scrollTop(50000);
        }).fail(function (data) {
            console.log('fail');
        });


    }

    function load_people() {

        var url_people = 'http://test.loc/people';
        $.ajax({
            url: url_people

        }).done(function (data) {


            $('.right-side').html(data);


        }).fail(function (data) {
            console.log('fail');
        });

    }

    $('.message').focus(function () {
        var url_chat = 'http://test.loc/message/set_status';

        $.ajax({
            url: url_chat


        }).done(function (data) {


        }).fail(function (data) {
            console.log('fail');
        });
    });
    $('.send').click(function () {
        $('#chat').show();
    });

    $('.sms').click(function () {

        $('.right-side').toggleClass('open');

    });
    $(document).on('click', '.user', function () {

        $('.chat').show();
        $('.close').click(function(){
            $('.chat').hide();

        });
        var to_id = $(this).attr('data-id');
        var image = $(this).find('.user-image').html();
        var user = $(this).find('.user-name').html();
        $('.chat_window').find('.chat-image').html(image);
        $('.chat_window').find('.chat-user').html(user);
        $('.to_id').val(to_id);

        setInterval(function () {

        load_message( $('.to_id').val());
        }, 1000);


    });

    function check_new_message() {

        var url_chat = 'http://test.loc/message/check_new_message';

        $.ajax({
            url: url_chat


        }).done(function (data) {


            var obj = JSON.parse(data);
            if (obj.length > 0) {
                $('.count').html(obj.length);


            } else {

                $('.count').html('');
            }


            $('.count').addClass('bounceIn');


        //$('.count').removeClass('bounceIn');



        }).fail(function (data) {
            console.log('fail');
        });

    }

    setInterval(function () {

        check_new_message()
    }, 1000);


      function load_image(id){

          var url_images = 'http://test.loc/upload/load_images/'+id;

          $.ajax({
              url: url_images


          }).done(function (data) {

                $('.center').html(data);


          }).fail(function (data) {
              console.log('fail');
          });
    }
    $('.view_image').click(function(){

       var id = $(this).attr('data-id');
        load_image(id);
    });

});