@section('title', 'Send Service Request')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')

<div class="cat__content">

<!-- START: ecommerce/Pages-edit -->
<section class="card">
   <div class="card-header">
       <!--  <div class="dropdown pull-right">
           <a href="" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Blog &nbsp; &nbsp;</a>
       </div> -->
        <span class="cat__core__title">
            <strong>Send Service Request</strong>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
            <div class="col-lg-12">
			 {!! Form::open(array('route' => 'storeServiceRequest','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data')) !!}
				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-blogname">Services <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                           <select name="services" class="form-control">
                               <option value="">Please Select</option>
                               @foreach($fetchAllServices as $key=>$service)
                                    <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>
                   <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Brief Description  <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <textarea class="form-control" rows="4"  name="description" placeholder="Write a Brief Description" data-validation="[NOTEMPTY]" data-validation-message="Brief Description must not be empty!"></textarea>
                        </div>
                    </div>
                </div>
                <p style="color: red;">Note: You can skip below fields if you want this service to be done to your Address which you given while registration</p>
                <div class="row">
                     <div class="col-lg-6">
                        <label class="form-control-label" style="margin-top:8px;">City</label>
                       <input class="form-control"  placeholder="City"   name="city"  type="text" >
                    </div>
                    <div class="col-lg-6">
                        <label class="form-control-label" style="margin-top:8px;">PinCode</label>
                        <input class="form-control"  placeholder="PinCode"   name="pincode"  type="text" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-control-label">Address</label>
                        <textarea class="form-control" type="text" id="contents"  name="address" placeholder="Write a Full  Address" ></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Send Request</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="{{ route('viewServicesForCustomer')}}"  class="btn btn-default">Cancel</a>
                </div>
			{!! Form::close() !!}
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
</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {
		$("#m_section_name").html("Services");
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

