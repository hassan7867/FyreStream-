<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, maximum-scale=5.0, initial-scale=1.0, user-scalable=no" />
<title>FyreStream</title>
<!--<link rel="icon" href="images/favicon-16x16.png" type="image/png">-->
<!--<link href="css/style.css" type="text/css" rel="stylesheet">-->

<link href="{{asset('web/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('web/css/custom.css')}}" rel="stylesheet" type="text/css" />


<link href="{{asset('web/css/responsive.css')}}" type="text/css" rel="stylesheet">

<!--for resposive css -->
<link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
<!--for fonts -->

<!--for resposive css-->
<link href="{{asset('web/css/owl.carousel.css')}} " rel="stylesheet" type="text/css" />
<link href="{{asset('web/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
<!--other useful css-->

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<!--other useful css-->

<!--other useful js-->

<!--other useful js-->

<!--for resposive js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>

<script src="{{asset('web/js/login.js')}}"></script>
<!--for resposive js-->

<!-- Custom Responsive-->
<link href="{{asset('web/css/vd-media.css')}}" type="text/css" rel="stylesheet">
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
</head>

<body>

@yield('content')


   
<!--for responsive slid-->

<script src="{{asset('web/js/owl.carousel.js')}}"></script>

<script type="text/javascript">

$(".lgn-mobile-hamb").click(function(){
    $(".login-nav").slideToggle();
});


        var owl = $('.owl-carousel');
        $("#blog-demo").owlCarousel( {
            nav: true,
            dots: true,
            dotsEach: true,
            loop:true,
            autoplay:false,
            autoplayTimeout:3000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                560:{
                    items:1,
                    nav:true
                },
                767:{
                    items:1,
                    nav:true,
                    loop:true
                },
                768:{
                    items:1,
                    nav:true
                },
                991:{
                    items:1,
                    nav:true,
                    loop:true
                },
                1199:{
                    items:1,
                    nav:true,
                    loop:true
                }
            }
        });
</script>
<!--for responsive slid-->  
</body>
</html>




