@section('title', 'My Profile')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<!-- START: apps/profile -->
<nav class="cat__core__top-sidebar cat__core__top-sidebar--bg">
    <div class="row">
        <div class="col-xl-8 offset-xl-4">

            <h2>
			     <span class="text-black">
					<strong>{{ Auth::user()->name }}</strong>
				</span>
			    <small class="text-muted">{{ Auth::user()->email }}</small>
            </h2>
            <!-- <p class="mb-1">Founder / CEO</p> -->
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-xl-4">
        <section class="card cat__apps__profile__card" style="background-image: url({!! asset('/dist/modules/dummy-assets/common/img/photos/4.jpeg') !!}">
            <div class="card-body text-center">
                 <?php
if (isset(Auth::user()->user_id)) {
	$profile = Auth::user();
	?>
                    <a class="cat__core__avatar cat__core__avatar--border-white cat__core__avatar--110" href="javascript:void(0);">
                        <img src="/upload/profileimage/{{$profile->profile}}" alt="Alternative text to the image">
                    </a>
                   <?php } else {?>
                          <a class="cat__core__avatar cat__core__avatar--border-white cat__core__avatar--110" href="javascript:void(0);">
                             <img src="{!! asset('/upload/profile/user_profile.jpg') !!}" alt="Alternative text to the image">
                           </a>
                   <?php }?>

                <br />
                <br />

                <br />
                <p class="text-white">
                    Last activity: {{date('d-M-y -  H:i', strtotime(Auth::user()->created_at))}}
                </p>
                <p class="text-white">
                    <span class="cat__core__donut cat__core__donut--success"></span>
                    Online
                </p>
            </div>
        </section>



    </div>
    <div class="col-xl-8">
        <section class="card">
            <div class="card-body">
                <div class="nav-tabs-horizontal">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#posts" role="tab">
                                <i class="icmn-eye"></i>
                                View Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#messaging" role="tab">
                                <i class="icmn-pencil2"></i>
                                Edit Detail
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="posts" role="tabcard">
                            <h5 class="text-black mt-4">
                                <strong>Personal Information</strong>
                            </h5>
                             @if ($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert" id="id">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Oh snap! </strong> {{ $message }}
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert" id="id">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Well done! </strong>&nbsp; {{ $message }} !
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                            <img src="/upload/profileimage/{{$profile->profile}}" alt=""><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Name</b></label>
                                        <p>{{ Auth::user()->username }}</p>
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l1"><b>Email</b></label>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l3"><b>Mobile</b></label>
                                        <p>{{ Auth::user()->contact_no }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="messaging" role="tabcard">
                            <h5 class="text-black mt-4">
                                <strong>Edit Information</strong>
                            </h5><br>
                           {!! Form::open(array('url' => ['/update/'.$profile->user_id],'method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group"><br>
                                        <label class="form-control-label" for="l6"><b>Profile Image</b></label><br><br>
                                        <img src="/upload/profileimage/{{$profile->profile}}">&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="hidden" name="profile" value="{{ Auth::user()->profile }}">
                                        <input type="file" name="profile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l0"><b>Name</b></label>
                                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
                                    </div>
                                </div>
                                @if(Auth::user()->role == 3)
                                    <div class="col-lg-6">
                                @if($getMyService->count() == 2)
                                    <div class="form-group">
                                        <label class="form-control-label"  for="l1"><b>Service</b></label>
                                       <select name="service" class="form-control" readonly>
                                            <option value="">You Have Already Selected 2 Services.</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label class="form-control-label" for="l1"><b>Service</b></label>
                                       <select name="service" class="form-control">
                                            <option value="">Please Select</option>
                                            @foreach($service as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <span>Current Service: </span>
                                @foreach($getMyService as $key=>$value)
                                        <span>{{$value->service_name}}, </span>
                                @endforeach
                                </div>
                                @endif
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l3"><b>Email</b></label>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l4"><b>Mobile</b></label>
                                        <input type="number" class="form-control" name="contact_no" value="{{ Auth::user()->contact_no }}">
                                    </div>
                                </div>
                            </div><br>
                             @if(Auth::user()->role == 3 && Auth::user()->role == 2)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l3"><b>City</b></label>
                                        <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l4"><b>PinCode</b></label>
                                        <input type="number" class="form-control" name="pincode" value="{{ Auth::user()->pincode }}">
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l6"><b>Address</b></label>
                                        <textarea name="address" class="form-control" cols="10" rows="5">{{ Auth::user()->address }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="l6"><b>Description</b></label>
                                        <textarea name="description" class="form-control" cols="10" rows="5">{{ Auth::user()->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="submit" class="btn width-200 btn-primary">Update Profile</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END: apps/profile -->
<script>
    $('#id').delay(3000).fadeOut('fast');
</script>
<!-- START: page scripts -->
<script>
    $(function() {
		$("#m_section_name").html("My Profile");
        ///////////////////////////////////////////////////////////
        // ADJUSTABLE TEXTAREA
        autosize($('.adjustable-textarea'));

        ///////////////////////////////////////////////////////////
        // CALENDAR


        ///////////////////////////////////////////////////////////
        // SWAL ALERTS
        $('.swal-btn-success').click(function(e){
            e.preventDefault();
            swal({
                title: "Following",
                text: "Now you are following Artour Scott",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok"
            });
        });

        $('.swal-btn-success-2').click(function(e){
            e.preventDefault();
            swal({
                title: "Friends request",
                text: "Friends request was succesfully sent to Artour Scott",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok"
            });
        });

    });
</script>
<!-- END: page scripts -->
@include('components/footer')
