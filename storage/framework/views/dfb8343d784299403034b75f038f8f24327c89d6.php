<?php $__env->startSection('title', 'Requests'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Request List</strong>
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
			<?php $__currentLoopData = $requestData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $fetchCustomerDetails = App\User::where(['user_id' => $request->customer_id])->first();
                $fetchProviderDetails = App\User::where(['user_id' => $request->accepted_by])->first();
                $fetchServiceDetails = App\Service::where(['service_id' => $request->service_id])->first();
             ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($fetchCustomerDetails->username); ?></td>
                <td><?php echo e($request->description); ?></td>
                <td><?php echo e($fetchProviderDetails->username ?? "NULL"); ?></td>
                 <td><?php echo e($fetchServiceDetails->service_name); ?></td>
                <td><?php echo e($request->address); ?></td>
                <td><?php echo e($request->city); ?></td>
                <td><?php echo e($request->pincode); ?></td>
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

