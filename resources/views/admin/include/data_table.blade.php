@section('css')
<link href="{{ url('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ url('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
<script src="{{ url('js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ url('js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{ url('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>
 {{-- <!-- Sweet alert -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     function success(){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
     }


</script> --}}
@endsection
