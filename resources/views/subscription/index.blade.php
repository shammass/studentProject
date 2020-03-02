@section('title', 'View Subscription')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Subscription List</strong>
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
                <th>Service Provider Name</th>
                <th>Service Name</th>
                <th>Package Name</th>
                <th>Expiry</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Service Provider Name</th>
                <th>Service Name</th>
                <th>Package Name</th>
                <th>Expiry</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
            @foreach($getAllSubscriptionDetails as $key=> $subscribe)
            @php
                $username = App\User::select('username','service_type')->where(['user_id' => $subscribe->service_provider_id])->first();
                $servicename = App\Service::select('service_name')->whereIn('service_id', explode(',',$username->service_type))->get();
                $packagename = App\Package::select('package_name')->where(['package_id' => $subscribe->package_id])->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $username->username }}</td>
                <td>@foreach($servicename as $key1 => $value1 )
                        {{$value1->service_name}},
                @endforeach</td>
                <td>{{ $packagename->package_name }}</td>
                <td>{{ $subscribe->expiry }}</td>
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
$("#m_section_name").html("Subscription");
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

