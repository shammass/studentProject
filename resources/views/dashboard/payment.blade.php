@section('title', 'Dashboard')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="cat__content">

<script src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.min.js"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.15805" type="text/javascript"></script>
<script type="text/javascript">
    JotForm.init(function(){
      productID = {"0":"input_3_1001","1":"input_3_1002","2":"input_3_1003"};
      paymentType = "product";
      JotForm.setCurrencyFormat('USD',true, 'point');
      JotForm.totalCounter({"input_3_1001":{"price":"100"},"input_3_1002":{"price":"200"},"input_3_1003":{"price":"300"}});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('blur', function(){isNaN(this.value) || this.value < 1 ? this.value = '0' : this.value = parseInt(this.value)})});
      $$('.form-product-custom_quantity').each(function(el, i){el.observe('focus', function(){this.value == 0 ? this.value = '' : this.value})});
      JotForm.handleProductLightbox();
      setTimeout(function() {
          $('input_5').hint('ex: myname@example.com');
       }, 20);
    JotForm.newDefaultTheme = false;
    /*INIT-END*/
    });

   JotForm.prepareCalculationsOnTheFly([null,{"name":"clickTo","qid":"1","text":"PayPal Pro Payment Form","type":"control_head"},{"name":"submit","qid":"2","text":"Submit","type":"control_button"},{"name":"myProducts3","qid":"3","text":"My Products","type":"control_paypalpro"},{"name":"buyerName","qid":"4","text":"Buyer Name","type":"control_fullname"},{"name":"buyerEmail","qid":"5","text":"Buyer E-mail","type":"control_email"},{"name":"shippingAddress","qid":"6","text":"Shipping Address","type":"control_address"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"clickTo","qid":"1","text":"PayPal Pro Payment Form","type":"control_head"},{"name":"submit","qid":"2","text":"Submit","type":"control_button"},{"name":"myProducts3","qid":"3","text":"My Products","type":"control_paypalpro"},{"name":"buyerName","qid":"4","text":"Buyer Name","type":"control_fullname"},{"name":"buyerEmail","qid":"5","text":"Buyer E-mail","type":"control_email"},{"name":"shippingAddress","qid":"6","text":"Shipping Address","type":"control_address"}]);}, 20);
</script>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.15805" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.15805" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.15805" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=5dca5ac9a5e86d17235d90c1"/>
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    .form-all{
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: false;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
    }
    .form-header-group {
      font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
    }
    .form-label {
      font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Verdana, Tahoma, sans-serif, sans-serif;
    }

    .form-label.form-label-auto {

    display: inline-block;
    float: left;
    text-align: left;

    }

    .form-line {
      margin-top: 12px 36px 12px 36px px;
      margin-bottom: 12px 36px 12px 36px px;
    }

    .form-all {
      width: 590px;
    }

    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
      width: 150px;
    }

    .form-all {
      font-size: 14pxpx
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 14pxpx
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 14pxpx
    }

    .supernova .form-all, .form-all {
      background-color: ;
      border: 1px solid transparent;
    }

    .form-all {
      color: #555;
    }
    .form-header-group .form-header {
      color: #555;
    }
    .form-header-group .form-subHeader {
      color: #555;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: #555;
    }
    .form-sub-label {
      color: #6f6f6f;
    }

    .supernova {
      background-color: undefined;
    }
    .supernova body {
      background: transparent;
    }

    .form-textbox,
    .form-textarea,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: undefined;
    }

    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }

    .form-all {
      background-image: none;
    }

  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }

  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>
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
{!! Form::open(array('route' => 'storePayment','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation', 'enctype'=>'multipart/form-data', 'style'=>'margin-left:402px;')) !!}
  <input type="hidden" name="formID" value="200603747733453" />
  <input type="hidden" id="JWTContainer" value="" />
  <input type="hidden" id="cardinalOrderNumber" value="" />
  <div role="main" class="form-all">
    <ul class="form-section page-section">
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-large">
          <div class="header-text httal htvam">
            <h1 id="header_1" class="form-header" data-component="header">
              PayPal Payment Form
            </h1>
            <div id="subHeader_1" class="form-subHeader">
              Please Subscribe To Continue As Service Provider
            </div>
          </div>
        </div>
      </li>
      </li>
      <li class="form-line" data-type="control_paypalpro" id="id_3">

        <div id="cid_3" class="form-input">
          <div data-wrapper-react="true" id="payment-wrapper-songbird" data-currency="USD" data-paymentType="product" data-sandbox="Disabled">
            <div data-wrapper-react="true">
              <input type="hidden" name="simple_fpc" data-payment_type="paypalpro" data-component="payment1" value="3" />
              <input type="hidden" name="payment_total_checksum" id="payment_total_checksum" data-component="payment2" />
              <div id="image-overlay" class="overlay-content" style="display:none">
                <img id="current-image" />
                <span class="lb-prev-button">
                  prev
                </span>
                <span class="lb-next-button">
                  next
                </span>
                <span class="lb-close-button">
                  ( X )
                </span>
                <span class="image-overlay-product-container">
                  <ul class="form-overlay-item" hasIcon="false" hasImages="false" iconValue="">
                  </ul>
                  <ul class="form-overlay-item" hasIcon="false" hasImages="false" iconValue="">
                  </ul>
                  <ul class="form-overlay-item" hasIcon="false" hasImages="false" iconValue="">
                  </ul>
                </span>
              </div>
                <select name="package" class="form-control">
                    <option value="">Please Select</option>
                    @foreach($packages as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
              <hr/>
            </div>
            <table class="form-address-table payment-form-table" style="border:0" cellPadding="4" cellSpacing="0">
              <tbody>
                <tr>
                  <th colSpan="2" style="text-align:left">
                    Payment Method
                  </th>
                </tr>
                <tr>
                  <td valign="top" style="min-width:50px;vertical-align:top" rowspan="2">
                    <input type="radio" class="paymentTypeRadios" id="input_3_paymentType_credit" name="q3_myProducts3[paymentType]" value="debit" checked="" />
                    <label for="input_3_paymentType_credit">
                      <div style="display:inline-block;padding-right:4px">
                        <img src="https://cdn.jotfor.ms/images/blank.gif" class="paypalpro_img paypalpro_visa" style="display:inline-block;vertical-align:middle" alt="visa" />
                        <img src="https://cdn.jotfor.ms/images/blank.gif" class="paypalpro_img paypalpro_mc" style="display:inline-block;vertical-align:middle" alt="mc" />
                        <img src="https://cdn.jotfor.ms/images/blank.gif" class="paypalpro_img paypalpro_amex" style="display:inline-block;vertical-align:middle" alt="amex" />
                        <img src="https://cdn.jotfor.ms/images/blank.gif" class="paypalpro_img paypalpro_dc" style="display:inline-block;vertical-align:middle" alt="dc" />
                      </div>
                    </label>
                  </td>
                 <!--  <td align="left" valign="top" style="padding-bottom:2px !important;text-align:left;vertical-align:top">
                    <input type="radio" class="paymentTypeRadios" id="input_3_paymentType_express" name="q3_myProducts3[paymentType]" checked="" value="express" />
                    <label for="input_3_paymentType_express"> <img style="vertical-align:middle" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="PayPal" /> </label>
                  </td> -->
                </tr>
              </tbody>
            </table>
            <table style="display:none;border:0" id="creditCardTable" class="form-address-table payment-form-table" cellPadding="0" cellSpacing="0">
              <tbody>
                <tr>
                  <th colSpan="2" style="text-align:left;margin-top:20px;display:table" id="ccTitle3">
                    Credit/Debit Card
                  </th>
                </tr>
                <tr>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_firstName" id="sublabel_cc_firstName" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> First Name </label>
                      <input type="text" id="input_3_cc_firstName" data-validation="[NOTEMPTY]" name="firstName" class="form-textbox cc_firstName" size="20" value="" data-component="cc_firstName" />
                    </span>
                  </td>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_lastName" id="sublabel_cc_lastName" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Last Name </label>
                      <input type="text" id="input_3_cc_lastName" required name="lastName" class="form-textbox cc_lastName" size="20" value="" data-component="cc_lastName" />
                    </span>
                  </td>
                </tr>
                <tr>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_number" id="sublabel_cc_number" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Card Number </label>
                      <input type="number" id="input_3_cc_number" required name="card_number" class="form-textbox cc_number" autoComplete="off" size="20" value="" data-component="cc_number" />
                    </span>
                  </td>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_ccv" id="sublabel_cc_ccv" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Security Code </label>
                      <input type="number" id="input_3_cc_ccv" required name="cvv" class="form-textbox cc_ccv" autoComplete="off" style="width:52px" value="" data-component="cc_ccv" />
                    </span>
                  </td>
                </tr>
                <tr>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_exp_month" id="sublabel_cc_exp_month" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Expiration Month </label>
                      <select class="form-dropdown cc_exp_month" required name="expiration_month" id="input_3_cc_exp_month" data-component="cc_exp_month">
                        <option>  </option>
                        <option value="January"> January </option>
                        <option value="February"> February </option>
                        <option value="March"> March </option>
                        <option value="April"> April </option>
                        <option value="May"> May </option>
                        <option value="June"> June </option>
                        <option value="July"> July </option>
                        <option value="August"> August </option>
                        <option value="September"> September </option>
                        <option value="October"> October </option>
                        <option value="November"> November </option>
                        <option value="December"> December </option>
                      </select>
                    </span>
                  </td>
                  <td width="50%">
                    <span class="form-sub-label-container " style="vertical-align:top">
                      <label class="form-sub-label" for="input_3_cc_exp_year" id="sublabel_cc_exp_year" style="min-height:13px;margin:0 0 3px 0" aria-hidden="false"> Expiration Year </label>
                      <select class="form-dropdown cc_exp_year" required name="expiration_year" id="input_3_cc_exp_year" data-component="cc_exp_year">
                        <option>  </option>
                        <option value="2020"> 2020 </option>
                        <option value="2021"> 2021 </option>
                        <option value="2022"> 2022 </option>
                        <option value="2023"> 2023 </option>
                        <option value="2024"> 2024 </option>
                        <option value="2025"> 2025 </option>
                        <option value="2026"> 2026 </option>
                        <option value="2027"> 2027 </option>
                        <option value="2028"> 2028 </option>
                        <option value="2029"> 2029 </option>
                      </select>
                    </span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </li>


      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" data-align="auto" class="form-buttons-wrapper  ">
            <button  type="submit" class="form-submit-button">
              Submit
            </button>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>

  <input type="hidden" id="simple_spc" name="simple_spc" value="200603747733453" />


  </div>
{!! Form::close() !!}
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
@include('components/footer')
