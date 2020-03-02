@section('title', 'Service Tracking')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Accepted Service List</strong>
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
                <th>Contact Number</th>
                <th>Service</th>
                <th>Address</th>
                <th>PinCode</th>
                <th>Date</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Service</th>
                <th>Address</th>
                <th>PinCode</th>
                <th>Date</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($fetchAccptedServiceByMe as $tracking)
            @php
                $getCustomerDetails = App\User::where(['user_id' => $tracking->customer_id])->first();
                $getServiceName = App\Service::where(['service_id' => $tracking->service_id])->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $getCustomerDetails->username }}</td>
                <td>{{ $getCustomerDetails->contact_no }}</td>
                <td>{{ $getServiceName->service_name }}</td>
                <td>{{ $tracking->address ?? $getCustomerDetails->address}}</td>
                <td>{{ $tracking->pincode ?? $getCustomerDetails->pincode}}</td>
                <td>{{ $tracking->created_at->todatestring()}}</td>
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

