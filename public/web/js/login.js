$(document).ready(function(){
	/*************Commeon function for ajax call*******/
       function ajaxCall() {
                    this.send = function(data, url, method, success, type) {
                        type = type || 'json';
                        var successRes = function(data) {
                            success(data);
                        }
                        var errorRes = function(e) {
                            console.log(e);
                            alert("Error found \nError Code: " + e.status + " \nError Message: " + e.statusText);
                        }
                        $.ajax({
                            url: url,
                            type: method,
                            data: data,
                            success: successRes,
                            error: errorRes,
                            dataType: type,
                            timeout: 600000
                        });
                    }
                }





  /*//*********************register form script***********/
  $('#registerForm').validate({
    rules: {
      first_name: {
             required: true
        },
        last_name: {
             required: true
        },
      email:{
          required:true,
          email:true,
          remote:{
                    url: "/checkEmail",
                    type: "get",
                    
                }
        },
        password:{
          required:true,
          minlength:8
        },
        cpassword:{
          required:true,
          minlength:8,
          equalTo: '[name="password"]'
        }

    },
    messages: {
      email: {
                    remote: "This Email is  already Exist!"
              }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form1').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  $('#loginForm').validate({
    rules: {
      email:{
        required: true,
        email:true
      },
      password:{
        required:true
      }
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
     error.addClass('invalid-feedback');
      element.closest('.form1').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
})