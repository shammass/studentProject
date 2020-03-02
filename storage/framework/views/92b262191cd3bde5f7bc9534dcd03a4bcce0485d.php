<?php $__env->startSection('title', 'Write Feedback'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="cat__content">

<!-- START: ecommerce/Pages-edit -->
<section class="card">
   <div class="card-header">
       <!--  <div class="dropdown pull-right">
           <a href="" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Blog &nbsp; &nbsp;</a>
       </div> -->
        <span class="cat__core__title">
            <strong>Send Feedback</strong>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
			<?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			<?php endif; ?>
            <div class="col-lg-12">
			 <?php echo Form::open(array('route' => 'storeFeedback','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')); ?>

				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-blogname">Service Provider <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                           <select name="provider" class="form-control" data-validation="[NOTEMPTY]" data-validation-message=" Please Choose Service Provider!">
                               <option value="">Please Select</option>
                               <?php $__currentLoopData = $fetchServiceProviderId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php 
                               	$fetchServiceProviderName = App\User::
                               	select('username')
                               	->where(['user_id' => $id->accepted_by])
                               	->first();
                                ?>
                                    <option value="<?php echo e($id->accepted_by); ?>"><?php echo e($fetchServiceProviderName->username); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                    </div>
                   <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Feedback  <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <textarea class="form-control" rows="4"  name="feedback" placeholder="Write Your Feedback Here" data-validation="[NOTEMPTY]" data-validation-message="Feedback must not be empty!"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" id="rating">
                            <label class="form-control-label">Rating <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                             	<span class="fa fa-star rating1" onclick="rating(1);"></span>
								<span class="fa fa-star rating2" onclick="rating(2);"></span>
								<span class="fa fa-star rating3" onclick="rating(3);"></span>
								<span class="fa fa-star rating4" onclick="rating(4);"></span>
								<span class="fa fa-star rating5" onclick="rating(5);"></span>
                        </div>
                    </div>

                    <input type="hidden" id="hiddenRating" name="rating" value="">

                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Send</button>
                    <a href="<?php echo e(route('viewFeedback')); ?>"  class="btn btn-default">Cancel</a>
                </div>
			<?php echo Form::close(); ?>

            </div>

        </div>
    </div>
</section>
<!-- END: ecommerce/product-edit -->
<!-- END: ecommerce/products-list -->

<!-- START: page scripts -->

<!-- include summernote css/js-->

<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
<script>
    $(function () {

        // Datatables
        $('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
            responsive: true,
            "autoWidth": false
        });

    })

    function rating(rating) {
    		$(".rating1").remove();
    		$(".rating2").remove();
    		$(".rating3").remove();
    		$(".rating4").remove();
    		$(".rating5").remove();
    		$("#hiddenRating").val(rating);
    	if(rating === 1){
    		$("#rating").append('<span class="fa fa-star rating1 checked" onclick="rating(1);"></span><span class="fa fa-star rating2" onclick="rating(2);"></span><span class="fa fa-star rating3" onclick="rating(3);"></span><span class="fa fa-star rating4" onclick="rating(4);"></span><span class="fa fa-star rating5" onclick="rating(5);"></span>')
    	}else if(rating === 2){
    		$("#rating").append('<span class="fa fa-star rating1 checked" onclick="rating(1);"></span><span class="fa fa-star rating2 checked" onclick="rating(2);"></span><span class="fa fa-star rating3" onclick="rating(3);"></span><span class="fa fa-star rating4" onclick="rating(4);"></span><span class="fa fa-star rating5" onclick="rating(5);"></span>')
    	}else if(rating === 3){
    		$("#rating").append('<span class="fa fa-star rating1 checked" onclick="rating(1);"></span><span class="fa fa-star rating2 checked" onclick="rating(2);"></span><span class="fa fa-star rating3 checked" onclick="rating(3);"></span><span class="fa fa-star rating4" onclick="rating(4);"></span><span class="fa fa-star rating5" onclick="rating(5);"></span>')
    	}else if(rating === 4){
    		$("#rating").append('<span class="fa fa-star rating1 checked" onclick="rating(1);"></span><span class="fa fa-star rating2 checked" onclick="rating(2);"></span><span class="fa fa-star rating3 checked" onclick="rating(3);"></span><span class="fa fa-star rating4 checked" onclick="rating(4);"></span><span class="fa fa-star rating5" onclick="rating(5);"></span>')
    	}else {
    		$("#rating").append('<span class="fa fa-star rating1 checked" onclick="rating(1);"></span><span class="fa fa-star rating2 checked" onclick="rating(2);"></span><span class="fa fa-star rating3 checked" onclick="rating(3);"></span><span class="fa fa-star rating4 checked" onclick="rating(4);"></span><span class="fa fa-star rating5 checked" onclick="rating(5);"></span>')
    	}
    }

</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {
		$("#m_section_name").html("Feedback");
        ///////////////////////////////////////////////////////////
        // tooltips
        $("[data-toggle=tooltip]").tooltip();

        ///////////////////////////////////////////////////////////
        // chart1
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [5, 0, 7, 8, 12],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // chart 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

        ///////////////////////////////////////////////////////////
        // custom scroll
        if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    contentWidth: '100%',
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

    } );
</script>
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });


    });
</script>

