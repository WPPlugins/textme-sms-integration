(function ($) {

    $(document).ready(function () {

        var elements = ['first name','last name', 'order number', 'address', 'city', 'email'];

        $('#textme_new_order_customer_content , #textme_new_order_customer_manager_content , #textme_order_complete_sms , #textme_order_cancel_sms , #textme_order_cancel_sms_customer').textcomplete([
            { // html
                mentions: elements,
                match: /\B@(\w*)$/,
                search: function (term, callback) {
                    callback($.map(this.mentions, function (mention) {
                        return mention.indexOf(term) === 0 ? mention : null;
                    }));
                },
                index: 1,
                replace: function (mention) {
                    return '[' + mention + ']';
                }
            }
        ]);

        $( "#textme_acount_form" ).on( "submit", function( event ) {
            event.preventDefault();
            $('.spinner').addClass('is-active');
            var data = $( this ).serialize() ;
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    'action': 'textme_update_account',
                    'data': data
                },
                success: function (response) {
                    $('.spinner').removeClass('is-active');
                    $('.notice').removeClass('hidden');
                }
            });
        });

        $( "#textme_option_form" ).on( "submit", function( event ) {
            event.preventDefault();
            $('.spinner').addClass('is-active');
            var data = $( this ).serialize() ;
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    'action': 'tetxme_update_option_page',
                    'data': data
                },
                success: function (response) {
                    $('.spinner').removeClass('is-active');
                    $('.notice').removeClass('hidden');
                }
            });
        });

        $('#textme_cf7_user').click(function () {
            var $this = $(this);
            console.log('fsfs');
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.send_user_sms').show();
            } else {
                // the checkbox was unchecked
                $('.send_user_sms').hide();
            }
        });

        $('#textme_pojo_user').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.send_pojo_user_sms').show();
            } else {
                // the checkbox was unchecked
                $('.send_pojo_user_sms').hide();
            }
        });


        $('#textme_order_cancel').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.textme_order_cancel_content').show();
            } else {
                // the checkbox was unchecked
                $('.textme_order_cancel_content').hide();
            }
        });

        $('#textme_new_order').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
               $('.textme_new_order_content').show();
            } else {
                // the checkbox was unchecked
                $('.textme_new_order_content').hide();
            }
        });

        $('#textme_order_complete').click(function () {
            var $this = $(this);
            // $this will contain a reference to the checkbox
            if ($this.is(':checked')) {
                // the checkbox was checked
                $('.textme_order_complete_content').show();
            } else {
                // the checkbox was unchecked
                $('.textme_order_complete_content').hide();
            }
        });

    });
})(jQuery);