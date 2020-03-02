<?php $__env->startSection('title', 'View Subscription'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: -->
<section class="card">
    <div class="card-header">

        <span class="cat__core__title">
            <strong>Subscription List</strong>
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
            <?php $__currentLoopData = $getAllSubscriptionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $subscribe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $username = App\User::select('username','service_type')->where(['user_id' => $subscribe->service_provider_id])->first();
                $servicename = App\Service::select('service_name')->whereIn('service_id', explode(',',$username->service_type))->get();
                $packagename = App\Package::select('package_name')->where(['package_id' => $subscribe->package_id])->first();
             ?>
            <tr>
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($username->username); ?></td>
                <td><?php $__currentLoopData = $servicename; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($value1->service_name); ?>,
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                <td><?php echo e($packagename->package_name); ?></td>
                <td><?php echo e($subscribe->expiry); ?></td>
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

