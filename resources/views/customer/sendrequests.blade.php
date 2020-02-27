@section('title', 'Send Request')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">
         <div class="dropdown pull-right">
           <a href="{{route('createServiceRequest')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Request Service &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Services List</strong>
        </span>
    </div>


	<div class="card-body">
		 @if ($message = Session::get('error'))
			<div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh snap! </strong> {{ $message }}
            </div>
		@endif
		 @if ($message = Session::get('success'))
			<div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done! </strong> {{ $message }} !
            </div>
		@endif
        <table class="table table-hover nowrap" id="example1" width="100%">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Service Requested</th>
                <th>Status</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>status</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
                @foreach($fetchAllServices as $key=>$value)

                    @php $getServiceName = App\Service::select('service_name')->where(['service_id' => $value->service_id])->first(); @endphp
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$getServiceName->service_name}}</td>
                        <td>
                            {{$value->accepted_by == 0 ? 'Pending': 'Accepted'}}
                            @if($value->accepted_by != 0)
                               <button class="btn btn-primary btn-sm" style="margin-left: 10px;"> <a href="{{route('viewServiceProvider', $value->accepted_by)}}" style="color:white;">View Details</a></button>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- END: ecommerce/products-list -->
<script>
    $('#id').delay(3000).fadeOut('fast');
</script>
<!-- START: page scripts -->
<script>
    $(function () {

        // Datatables
        $('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
            responsive: true,
            "autoWidth": false
        });

    })
</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->

