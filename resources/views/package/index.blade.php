@section('title', 'Packages')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">
         <div class="dropdown pull-right">
           <a href="{{route('createPackage')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Package &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Package List</strong>
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
                <th>Package Name</th>
                <th>Validity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Validity</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($fetchAllPackages as $package)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $package->package_name }}</td>
                <td>{{ $package->validity }}</td>
                <td style="width:250px;">
                    <a href="{{route('editPackage', $package->package_id)}}" class="btn btn-primary" style="margin-left:40px;"> Edit</a>
                     {!! Form::open(['method' => 'DELETE','route' => ['deletePackage', $package->package_id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
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

