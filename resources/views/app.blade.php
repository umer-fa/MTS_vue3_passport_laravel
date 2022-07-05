<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{env('APP_NAME')}}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('fillow/images/favicon.png')}}" />
    <link href="{{asset('fillow/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('fillow/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('fillow/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('fillow/vendor/nouislider/nouislider.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('fillow/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>
{{--{{\DB::connection()->getDatabaseName()}}--}}
<div id="app"></div>
<script src="{{ asset('js/app.js') }}"></script>


<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{asset('fillow/vendor/global/global.min.js')}}"></script>
<script src="{{asset('fillow/js/dlabnav-init.js')}}"></script>
<script src="{{asset('fillow/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('fillow/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

<!-- Apex Chart -->
{{--    @if($name=='dashboard')--}}
<script src=""></script>
{{--@endif--}}
<!-- Datatable -->
<script src="{{asset('fillow/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('fillow/js/plugins-init/datatables.init.js')}}"></script>

<script src="{{asset('fillow/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

<script src="{{asset('fillow/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('fillow/vendor/peity/jquery.peity.min.js')}}"></script>
<!-- Dashboard 1 -->
    <script src=""></script>
<script src="{{asset('fillow/vendor/owl-carousel/owl.carousel.js')}}"></script>

<script src="{{asset('fillow/js/custom.js')}}"></script>
<script src="{{asset('fillow/js/dlabnav-init.js')}}"></script>
<script>
    var token = localStorage.getItem('token1', JSON.stringify("token is this"));
    if(token){
        $.getScript( "{{asset('fillow/vendor/apexchart/apexchart.js')}}", function( data, textStatus, jqxhr ) {});
        $.getScript( "{{asset('fillow/js/dashboard/dashboard-1.js')}}", function( data, textStatus, jqxhr ) {});
    }
    function cardsCenter() {
        /*  testimonial one function by = owl.carousel.js */
        jQuery('.card-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            //center:true,
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive:{
                0:{
                    items:1
                },
                576:{
                    items:1
                },
                800:{
                    items:1
                },
                991:{
                    items:1
                },
                1200:{
                    items:1
                },
                1600:{
                    items:1
                }
            }
        })
    }

    jQuery(window).on('load',function(){
        setTimeout(function(){
            cardsCenter();
        }, 1000);
    });

</script>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
</body>
</html>
