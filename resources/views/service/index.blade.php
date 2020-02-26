@section('title', 'Service Provider')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Service Provider List</strong>
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
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($fetchAllServiceProviders as $providers)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $providers->username }}</td>
                <td>{{ $providers->email }}</td>
                <td>{{ $providers->contact_no }}</td>
                <td>{{ $providers->role === 4 ? 'Requested Service Provider' : 'Service Provider'}}</td>
                @if($providers->role === 4)
               <td style="width:250px;">
                    <a href="{{route('accept', $providers->user_id)}}" class="btn btn-primary" style="margin-left:40px;"> Accept</a>
                </td>
                @else
                <td style="width:250px;">
                    <a href="{{route('reject', $providers->user_id)}}" class="btn btn-danger" style="margin-left:40px;"> Reject</a>
                </td>
                @endif
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

