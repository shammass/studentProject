<?php $__env->startSection('title', 'Services'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <div class="cat__core__widget__2__head" style="background-image: url('<?php echo asset('/dist/modules/dummy-assets/common/img/photos/10.jpeg'); ?>');">
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
                         <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="/upload/profileimage/<?php echo e($fetchServiceProviderDetails->profile); ?>">
                            <img src="/upload/profileimage/<?php echo e($fetchServiceProviderDetails->profile); ?>" alt="Alternative text to the image">
                         </a>
                   <?php }?>
                    <br />
                    <h3>Name: <?php echo e($fetchServiceProviderDetails->username); ?>   </h3>
                    <h4>Contact Number: <?php echo e($fetchServiceProviderDetails->contact_no); ?>   </h4>

                    <h4>Rating:
                <?php if($rating == 1): ?>
                    <td>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                <?php elseif($rating == 2): ?>
                    <td>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                <?php elseif($rating == 3): ?>
                    <td>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </td>
                <?php elseif($rating == 4): ?>
                <td>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </td>
                <?php else: ?>
                <td>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </td>
                <?php endif; ?></h4>
                    <h6></h6><br>
                    <!-- <p><?php echo e(Auth::user()->profile_summary); ?></p> -->
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

