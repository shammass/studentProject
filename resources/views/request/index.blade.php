@section('title', 'Requests')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Request List</strong>
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
                <th>Request</th>
                <th>Service Provider Name</th>
                <th>Service</th>
                <th>Address</th>
                <th>City</th>
                <th>Pincode</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
               <th>ID</th>
                <th>Customer Name</th>
                <th>Request</th>
                <th>Service Provider Name</th>
                <th>Service</th>
                <th>Address</th>
                <th>City</th>
                <th>Pincode</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($requestData as $request)
            @php
                $fetchCustomerDetails = App\User::where(['user_id' => $request->customer_id])->first();
                $fetchProviderDetails = App\User::where(['user_id' => $request->accepted_by])->first();
                $fetchServiceDetails = App\Service::where(['service_id' => $request->service_id])->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $fetchCustomerDetails->username }}</td>
                <td>{{ $request->description }}</td>
                <td>{{ $fetchProviderDetails->username ?? "NULL" }}</td>
                 <td>{{ $fetchServiceDetails->service_name }}</td>
                <td>{{ $request->address }}</td>
                <td>{{ $request->city }}</td>
                <td>{{ $request->pincode }}</td>
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
$("#m_section_name").html("Requests");
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

