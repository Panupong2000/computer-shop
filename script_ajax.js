$('document').ready(function() {

    var username_state = false;
    var email_state = false;
    
    

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
                    $('#username').siblings("span").text("ชื่อนี้ถูกใช้งานแล้ว");
                } else if (response == "not_taken") {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_success');
                    $('#username').siblings("span").text("ชื่อนี้สามารถใช้งานได้");
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
                    $('#email').siblings("span").text("อีเมลนี้ถูกใช้งานแล้ว");
                } else if (response == "not_taken") {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_success');
                    $('#email').siblings("span").text("อีเมลนี้สามารถใช้านได้");
                }
            }
        })
    });

     $('#name').on('blur', function() { 
        var name = $('#name').val();
        if (name == '') {
            name_state = false;
            return;
        }
        $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                'name_check': 1,
                'name': name
            },
            success: function(response){
            if(!input_name_th.match(pattern_thai)){
                $('#name').siblings("span").text("กรุณากรอกชื่อให้เป็นภาษาไทย");
                return false;
                }
             }
          })
        });

    $('#Lname').on('blur', function() {
         var Lname = $('#Lname').val();
         if (Lname == '') {
            Lname_state = false;
             return;
         }
         
         });
    $('#phone').on('blur', function() {
        var phone = $('#phone').val();
        if (phone == '') {
            phone_state = false;
            return;
        }
        
        });


    $('#reg_btn').on("click", function(e) {
        var username = $("#username").val();
        var email = $("#email").val();
        var name = $("#name").val();
        var Lname = $("#Lname").val();
        var phone = $("#phone").val();
        var password = $("#password").val();

        
        if (username_state == false || email_state == false  ) {
            e.preventDefault();
            $("#error_msg").text("กรุณากรอกแบบฟอร์มให้ครบ");
        }else if (name == '' || Lname == '') {
            e.preventDefault();
            $("#error_msg").text("กรุณากรอกชื่อและนามสกุล");
        } 
        else if (phone == '' ) {
            e.preventDefault();
             $("#error_msg").text("กรุณากรอกเบอร์โทรศัพท์");
         }
         else if (password == '' ) {
            e.preventDefault();
             $("#error_msg").text("กรุณากรอกรหัสผ่าน");
         }  
        else {
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
                    $('#name').val('');
                    $('#Lname').val('');
                    $('#phone').val('');
                    $('#password').val('');
                }
            })
        }
    });

});