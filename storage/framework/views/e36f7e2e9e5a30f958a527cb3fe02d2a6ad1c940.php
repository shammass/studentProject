<?php $__env->startSection('title', 'Notifications'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">
         <div class="dropdown pull-right">
          <!--  <a href="<?php echo e(route('createService')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Service &nbsp; &nbsp;</a> -->
       </div>
        <span class="cat__core__title">
            <strong>Notification List</strong>
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
                <th>Customer Contact</th>
                <th>Description</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Description</th>
                <th>City</th>
                <th>Pincode</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1;?>
			<?php $__currentLoopData = $fetchRequestedService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
            $fetchCustomerDetails = App\User::where(['user_id' => $services->customer_id])->first();
             ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($fetchCustomerDetails->username); ?></td>
                <td><?php echo e($fetchCustomerDetails->contact_no); ?></td>
                <td><?php echo e($services->description); ?></td>
                <td><?php echo e($services->city == NULL ? $fetchCustomerDetails->city : $services->city); ?></td>
                <td><?php echo e($services->pincode == NULL ? $fetchCustomerDetails->pincode : $services->pincode); ?></td>
                <td><?php echo e($services->address == NULL ? $fetchCustomerDetails->address : $services->address); ?></td>
                <td style="width:250px;">
                    <a href="<?php echo e(route('acceptRequest', $services->request_id)); ?>" class="btn btn-primary" style="margin-left:40px;"> Accept</a>
                </td>
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

