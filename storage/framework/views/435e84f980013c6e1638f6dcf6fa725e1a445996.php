<?php $__env->startSection('title', 'Service Tracking'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Accepted Service List</strong>
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
			<?php $__currentLoopData = $fetchAccptedServiceByMe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tracking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $getCustomerDetails = App\User::where(['user_id' => $tracking->customer_id])->first();
                $getServiceName = App\Service::where(['service_id' => $tracking->service_id])->first();
             ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($getCustomerDetails->username); ?></td>
                <td><?php echo e($getCustomerDetails->contact_no); ?></td>
                <td><?php echo e($getServiceName->service_name); ?></td>
                <td><?php echo e($tracking->address ?? $getCustomerDetails->address); ?></td>
                <td><?php echo e($tracking->pincode ?? $getCustomerDetails->pincode); ?></td>
                <td><?php echo e($tracking->created_at->todatestring()); ?></td>
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

