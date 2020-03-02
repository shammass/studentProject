@section('title', 'Notifications')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">
         <div class="dropdown pull-right">
          <!--  <a href="{{route('createService')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Service &nbsp; &nbsp;</a> -->
       </div>
        <span class="cat__core__title">
            <strong>Notification List</strong>
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
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Service</th>
                <th>Description</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Service</th>
                <th>Description</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($fetchRequestedService as $services)
            @php
            $fetchCustomerDetails = App\User::where(['user_id' => $services->customer_id])->first();
            $fetchServiceName = App\Service::select('service_name')->where(['service_id' => $services->service_id])->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $fetchCustomerDetails->username }}</td>
                <td>{{ $fetchCustomerDetails->contact_no }}</td>
                <td>{{ $fetchServiceName->service_name}}</td>
                <td>{{ $services->description }}</td>
                <td>{{ $services->city == NULL ? $fetchCustomerDetails->city : $services->city}}</td>
                <td>{{ $services->pincode == NULL ? $fetchCustomerDetails->pincode : $services->pincode }}</td>
                <td>{{ $services->address == NULL ? $fetchCustomerDetails->address : $services->address }}</td>
                <td style="width:250px;">
                    <a href="{{route('acceptRequest', $services->request_id)}}" class="btn btn-primary" style="margin-left:40px;"> Accept</a>
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
$("#m_section_name").html("Notification");
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

