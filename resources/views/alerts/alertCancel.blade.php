@include('sweet::alert')
<script src="{!! 'assets/js/sweetalert.min.js' !!}"></script>
<script src="{!! 'assets/js/sweetalert-dev.js' !!}"></script>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            title: "{!! Session::get('sweet_alert.title') !!}",
            type: "{!! Session::get('sweet_alert.type') !!}",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4",
            showCancelButton: true
            // more options
        });
    </script>
@endif