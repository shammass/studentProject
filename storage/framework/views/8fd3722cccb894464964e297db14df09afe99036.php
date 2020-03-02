<?php $__env->startSection('title', 'Dashboard'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<div class="cat__content">

    <div class="row">
        <div class="col-xl-4"  style="background-color:#fff; margin-bottom:21px;">
            <div class="cat__core__widget cat__core__widget__2">
                <div class="cat__core__widget__2__head" style="background-image: url('<?php echo asset('/dist/modules/dummy-assets/common/img/photos/10.jpeg'); ?>');">
                </div>
                <div class="cat__core__widget__2__content">
                    <div class="cat__core__widget__2__left">
                     <?php
if (isset(Auth::user()->user_id) && isset(Auth::user()->profile_image) && !empty(Auth::user()->profile_image)) {
	$profileimage = Auth::user();
	?>
                       <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                         <img src="<?php echo asset("/upload/profileimage/$profileimage->profile_image") ?>" alt="">
                        </a>
                       <?php } else {?>
                             <a class="cat__core__avatar cat__core__avatar--90 cat__core__avatar--border-white" href="javascript:void(0);">
                                <img src="/upload/profileimage/<?php echo e($userType->profile); ?>" alt="Alternative text to the image">
                             </a>
                       <?php }?>
                        <br />
    					<h3>Welcome  <?php echo e(Auth::user()->username); ?> </h3>
    					<h6><?php echo e(Auth::user()->email); ?></h6><br>
                    	<!-- <p><?php echo e(Auth::user()->profile_summary); ?></p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-lg-6">
                    <a href="<?php echo e(route('showServiceProviderNotification')); ?>">
                        <div class="cat__core__widget__3 bg-default">
                            <div class="cat__core__step cat__core__step--danger">
                                <span class="cat__core__step__digit">
                                    <i class="icmn-bullhorn"></i>
                                </span>
                                <div class="cat__core__step__desc">
                                    <span class="cat__core__step__title">Notifications</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="<?php echo e(route('trackMyService')); ?>">
                        <div class="cat__core__widget__3 bg-default">
                        <div class="cat__core__step cat__core__step--primary">
                            <span class="cat__core__step__digit">
                                <i class="icmn-clipboard"></i>
                            </span>
                            <div class="cat__core__step__desc">
                                <span class="cat__core__step__title">Track Services</span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="<?php echo e(route('viewFeedback')); ?>">
                        <div class="cat__core__widget__3 bg-default">
                            <div class="cat__core__step cat__core__step--default">
                                <span class="cat__core__step__digit">
                                    <i class="icmn-eye"></i>
                                </span>
                                <div class="cat__core__step__desc">
                                    <span class="cat__core__step__title">View FeedBack</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {

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
<!-- END: page scripts -->
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
