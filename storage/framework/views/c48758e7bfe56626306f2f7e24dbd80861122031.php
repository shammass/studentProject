<?php $__env->startSection('title', 'Service Provider'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Service Provider List</strong>
        </span>
    </div>


	<div class="card-body">
		 <?php if($message = Session::get('error')): ?>
			<div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh snap! </strong> <?php echo e($message); ?>

            </div>
		<?php endif; ?>
		 <?php if($message = Session::get('success')): ?>
			<div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done! </strong> <?php echo e($message); ?> !
            </div>
		<?php endif; ?>
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
			<?php $__currentLoopData = $fetchAllServiceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $providers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($providers->username); ?></td>
                <td><?php echo e($providers->email); ?></td>
                <td><?php echo e($providers->contact_no); ?></td>
                <td><?php echo e($providers->role === 4 ? 'Requested Service Provider' : 'Service Provider'); ?></td>
                <?php if($providers->role === 4): ?>
               <td style="width:250px;">
                    <a href="<?php echo e(route('accept', $providers->user_id)); ?>" class="btn btn-primary" style="margin-left:40px;"> Accept</a>
                </td>
                <?php else: ?>
                <td style="width:250px;">
                    <a href="<?php echo e(route('reject', $providers->user_id)); ?>" class="btn btn-danger" style="margin-left:40px;"> Reject</a>
                </td>
                <?php endif; ?>
            </tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
$("#m_section_name").html("Service Provider");
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

