$('document').ready(function() {

    var username_state = false;
    var email_state = false;
    // var name_state = false;
    // var Lname_state = false;
    // var phone_state = false;


    $('#username').on('blur', function() {
        var username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username
            },
            success: function(response) {
                if (response == 'taken') {
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_error');
                    $('#username').siblings("span").text("Sorry... Username already taken");
                } else if (response == "not_taken") {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_success');
                    $('#username').siblings("span").text("Username available");
                }
            }
        })
    });

    $('#email').on('blur', function() {
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("Sorry... Email already taken");
                } else if (response == "not_taken") {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_success');
                    $('#email').siblings("span").text("Email available");
                }
            }
        })
    });

    // $('#name').on('blur', function() {
    //     var name = $('#name').val();
    //     if (name == '') {
    //         name_state = false;
    //         return;
    //     }
    //     });

    // $('#Lname').on('blur', function() {
    //      var Lname = $('#Lname').val();
    //      if (Lname == '') {
    //         Lname_state = false;
    //          return;
    //      }
    //      });
    // $('#phone').on('blur', function() {
    //     var phone = $('#phone').val();
    //     if (phone == '') {
    //         phone_state = false;
    //         return;
    //     }
    //     });


    $('#reg_btn').on("click", function(e) {
        var username = $("#username").val();
        var email = $("#email").val();
        var name = $("#name").val();
        var Lname = $("#Lname").val();
        var phone = $("#phone").val();
        var password = $("#password").val();


        if (username_state == false || email_state == false) {
            e.preventDefault();
            $("#error_msg").text("Fix the errors in the form first");
        } else {
            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'name': name,
                    'Lname': Lname,
                    'phone': phone,
                    'password': password
                },
                success: function(response) {
                    alert('User saved');
                    $('#username').val('');
                    $('#email').val('');
                    // $('#name').val('');
                    // $('#Lname').val('');
                    // $('#phone').val('');
                    $('#password').val('');
                }
            })
        }
    });

});