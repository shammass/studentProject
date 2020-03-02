
<?php $__env->startSection('title', 'Login'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-color: black;">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                <div class="cat__pages__login__block__promo text-white text-center">
                    <h2 class="mb-">
                        <strong>Registration</strong>
                    </h2>
                </div>
                <div class="cat__pages__login__block__inner">
                    <div class="cat__pages__login__block__form">
                        <h4 class="text-uppercase">
                            <strong>Please Register</strong>
                        </h4>
                        <br />
                        <?php if(isset(Auth::user()->email)): ?>
                            <script>window.location="/main/dashboard"</script>
                        <?php endif; ?>
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong><?php echo e($message); ?></strong>
                            </div>
                        <?php endif; ?>
                        <?php if(count($errors)>0): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('register')); ?>" enctype = "multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input id="name"
                                       class="form-control"
                                       placeholder="Name"
                                       name="name"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email ID</label>
                                <input id="email"
                                       class="form-control"
                                       placeholder="Email"
                                       name="email"
                                       type="email"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                              <label class="form-label">Service</label>
                                   <select name="services" class="form-control" data-validation="[NOTEMPTY]" id="services" onchange="myFunction()">
                                     <option value="">Please Select</option>
                                  <?php $__currentLoopData = $fetchAllServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($service->service_name); ?>"><?php echo e($service->service_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                            </div>
                            <div class="form-group" id="license">
                               <label class="form-control-label">Upload Your License</label><br><br>
                        <?php echo Form::file('license_image', array('class' => 'image', 'data-validation-message'=>'License must not be empty!')); ?>

                            </div>
                            <div class="form-group" id="description">
                                <label class="form-label">Description</label>
                                       <textarea
                                       class="form-control"
                                       name="description" placeholder="Description of your work" data-validation="[NOTEMPTY]"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                       <textarea id="address"
                                       class="form-control"
                                       name="address" placeholder="Address" data-validation="[NOTEMPTY]"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input id="city"
                                       class="form-control"
                                       placeholder="City"
                                       name="city"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pin Code</label>
                                <input id="pin"
                                       class="form-control"
                                       placeholder="Pin-Code"
                                       name="pin"
                                       type="number"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contact Number</label>
                                <input id="contact"
                                       class="form-control"
                                       placeholder="Contact Number"
                                       name="contact"
                                       type="number"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                               <label id="profile" class="form-control-label">Upload Your Profile Picture</label><br><br>
                        <?php echo Form::file('profile_image', array('class' => 'image', 'data-validation-message'=>'Profile Image must not be empty!')); ?>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <input type="hidden" name="role" value="4">

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
  $("#license").hide();
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


        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Change BG
        var min = 1, max = 5,
            next = Math.floor(Math.random()*max) + min,
            final = next > max ? min : next;
        $('.random-bg-image').data('img', final);
        $('.cat__pages__login').data('img', final).css('backgroundImage', 'url(dist/modules/pages/common/img/login/' + final + '.jpg)');

    });



    function myFunction() {
      var service = $("#services").val();
      if(service === 'Driver'){
        $("#license").show();
      }
    }

</script>
<!-- END: page scripts -->
</body>

