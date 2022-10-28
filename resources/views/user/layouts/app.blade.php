<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="">
    <title>{{ @$pageTitle }}</title>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('/') }}assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('/') }}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="{{ asset(getOption('app_fav_icon')) }}">
    @stack('style')
        <style>
            #kt_table_users tr:nth-child(even){background-color: #f2f2f2;}
            #kt_table_users thead{
                background-color: #eaeafc;
            }
            #kt_table_users thead tr th{
                color: black;
                font-size: 15px;
            }

            .modalHeaderH1{
                background-color: #eaeafc;
                color: black;
                padding: 10px;
            }
        </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">

        <!--begin::Aside-->
    @include('user.layouts.aside')
    <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

        <!--begin::Header-->
        @include('user.layouts.navbar')
        <!--end::Header-->

        <!--begin::Content-->
        @yield('content')
        <!--end::Content-->

        <!--begin::Footer-->
        @include('user.layouts.footer')
        <!--end::Footer-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->


<!--end::Modals-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->

<!--end::Main-->

<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}

<script src="{{ asset('/') }}assets/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('/') }}assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('/') }}assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('/') }}assets/js/custom/widgets.js"></script>
<script src="{{ asset('/') }}assets/js/custom/apps/chat/chat.js"></script>
<script src="{{ asset('/') }}assets/js/custom/modals/create-app.js"></script>
<script src="{{ asset('/') }}assets/js/custom/modals/upgrade-plan.js"></script>
<script src="{{ asset('/') }}assets/js/toastr.js"></script>
<!--end::Page Custom Javascript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--end::Javascript-->
@stack('script')

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(session()->has( 'success' ))
    toastr.success("{{ session()->get( 'success' ) }}");
    @endif

    @if(session()->has( 'error' ))
    toastr.error("{{ session()->get( 'error' ) }}");
    @endif

    @if (@$errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>

<!--Start::Delete Item  -->
<script>
    $(document).on("click", ".deleteItem", function () {
        let form_id = this.dataset.formid;
        Swal.fire({
            title: 'Sure! You want to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete It!'
        }).then((result) => {
            if (result.value) {
                $("#" + form_id).submit();
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                )
            }
        })
    });
</script>
<!--End::Delete Item  -->
</body>
<!--end::Body-->
</html>
