

<script type="text/javascript">
  	$(document).ready(function () {


  /*//*********************Add country Form route***********/
  $('#countryForm').validate({
    rules: {
      country_name: {
        required: true
              }
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  
});
  </script>