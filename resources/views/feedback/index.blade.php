@section('title', 'Feedback')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">
         <div class="dropdown pull-right">
           <a href="{{route('sendFeedback')}}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Write Feedback &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Feedbacks</strong>
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
                <th>Feedback</th>
                <th>Service Provider Name</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Feedback</th>
                <th>Service Provider Name</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			@foreach($fetchFeedbacks as $feedbacks)
            @php
                $fetchServiceProviderName = App\User::select('username')->where(['user_id' => $feedbacks->feedback_to])->first();
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $feedbacks->feedback }}</td>
                <td>{{ $fetchServiceProviderName->username }}</td>
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

        $("#m_section_name").html("Feedback");

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

