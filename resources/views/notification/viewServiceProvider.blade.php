@section('title', 'Services')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Service Provider Details List</strong>
        </span>
    </div>


	   <div class="col-xl-12"  style="background-color:#fff; margin-bottom:21px;">
        <div class="cat__core__widget cat__core__widget__2">
            <div class="cat__core__widget__2__head" style="background-image: url('{!! asset('/dist/modules/dummy-assets/common/img/photos/10.jpeg') !!}');">
            </div>
            <div class="cat__core__widget__2__content">
                <div class="cat__core__widget__2__left">
                 <?php
if (isset(Auth::user()->user_id) && isset(Auth::user()->profile) && !empty(Auth::user()->profile)) {
	$profileimage = Auth::user();
	?>
                   <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                     <img src="<?php echo asset("/upload/profileimage/$profileimage->profile_image") ?>" alt="">
                    </a>
                   <?php } else {?>
                         <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                            <img src="{!! asset('/upload/profileimage/user_profile.jpg') !!}" alt="Alternative text to the image">
                         </a>
                   <?php }?>
                    <br />
                    <h3>Name: {{$fetchServiceProviderDetails->username}}   </h3>
                    <h4>Contact Number: {{$fetchServiceProviderDetails->contact_no}}   </h4>
                    <h6></h6><br>
                    <!-- <p>{{ Auth::user()->profile_summary }}</p> -->
                </div>
            </div>
        </div>
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

