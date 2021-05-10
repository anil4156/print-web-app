@extends('layouts.app')
@section('content')
    <div class="home-main">
        <div class="order-detail">
            <div class="row align-items-center justify-content-between">
                <div class="logo_div inner_">
                    <div class="header-logo">
                            <!-- <h4><b>PrintVICE</b></h4> -->
                            <h1 class="_mainlogo">D</h1>
                            <h5 class="job_number">Job No: {{$order_detail['ordersid']}}</h5>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ URL::to('createPDF') }}">Export to PDF</a>
                <div class="name_size inner_">
                    <div class="jobNameDetail">
                        <div class="job-name"><h6>Job Name: {{$order_detail['jobname']}}</h6></div>
                        <div class="job-name"><h6>Run Size: -</h6></div>
                    </div>
                </div>
                <div class="color_spec inner_">
                    <div class="description-detail">
                        <div class="color-spec"><h6>Color Spec: {{$order_detail['color']}}</h6></div>
                        <div class="description"><h6>Description: -</h6></div>
                    </div>
                </div>
                <div class="hi_wi inner_">
                    <div class="size-detail">
                        <?php
                        $size = explode('x', $order_detail['size']);
                        ?>
                        <div class="item-width"><h6>Width: {{$size[0]}}</h6></div>
                        <div class="item-height"><h6>Height: {{$size[1]}}</h6></div>
                    </div>
                </div>
                <div class="item inner_">
                    <div class="item-detail">
                        <div class="item-view">
                            <h6>
                                Item:
                                <span id="item-view-value">
                                    {{isset($order_detail['images'][0]['image_view']) ? $order_detail['images'][0]['image_view'] : '-'}}
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="preview inner_">
                    <div class="preview-expiration-detail">
                        <div class="">
                            <h6>
                                The preview will expire in <b><span id="expiration_time"></span></b>
                            </h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="image-tools">
            <div class="row justify-content-between">
                <div class="docs-buttons">
                    <!-- Rotate Template -->
                    <div class="btn-group vert_land">
                        <span class="tool-name">Orientation: </span>
                        <button type="button" class="btn btn-primary vert" data-method="rotateTemplatePotrait"
                                data-option="90"
                                title="Rotate Template Potrait">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Rotate Template Potrait"
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fa-reacteurope"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary horz" data-method="rotateTemplateLandscape"
                                data-option="0"
                                title="Rotate Template Landscape">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Rotate Template Landscape"
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fa-reacteurope"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Rotate -->
                    <div class="btn-group">
                        <span class="tool-name">Rotate: </span>
                        <button type="button" class="btn btn-primary rotate minus" data-method="rotate" data-option="-90"
                                title="Rotate Left">
                                <img src="public/images/rotate_left.png">
                        </button>
                        <button type="button" class="btn btn-primary rotate plus" data-method="rotate" data-option="90"
                                title="Rotate Right">
                                <img src="public/images/rotate_right.png">
                        </button>
                    </div>

                    <!-- Scale -->
                    <div class="btn-group scale_me">
                        <span class="tool-name">Scale: </span>
                        <button type="button" class="btn btn-primary sc_up" data-method="zoomScale" data-option="0.2"
                                title="Scale Up">
                            <span class="fas fa-caret-up"></span><i class=""></i>
                        </button>
                        <button type="button" class="btn btn-primary sc_down" data-method="zoomScale" data-option="-0.2"
                                title="Scale Down">
                            <span class="fas fa-caret-down"></span>
                        </button>
                        <button type="button" id="actual_size" class="btn btn-primary scale_" data-method="zoom"
                                title="Scale Down">
                                <img src="public/images/scale.png">
                        </button>
                    </div>

                    <!-- Move -->
                    <div class="btn-group move_prod">
                        <span class="tool-name">Move: </span>
                        <button type="button" class="btn btn-primary mv mv_left" data-method="move" data-option="-10"
                                data-second-option="0" title="Move Left">
                            <span class="fa fa-arrow-left"></span>
                        </button>
                        <button type="button" class="btn btn-primary mv mv_right" data-method="move" data-option="10"
                                data-second-option="0" title="Move Right">
                            <span class="fa fa-arrow-right"></span>
                        </button>
                        <button type="button" class="btn btn-primary mv mv_up" data-method="move" data-option="0"
                                data-second-option="-10" title="Move Up">
                            <span class="fa fa-arrow-up"></span>
                        </button>
                        <button type="button" class="btn btn-primary mv mv_down" data-method="move" data-option="0"
                                data-second-option="10" title="Move Down">
                            <span class="fa fa-arrow-down"></span>
                        </button>
                        <button type="button" class="btn btn-primary lock disable-image" data-method="disable"
                                title="Disable">
                                <img src="public/images/lock.png">
                        </button>
                        <button type="button" class="btn btn-primary mt-1 unlock enable-image" data-method="enable" title="Enable">
                                <img src="public/images/unlocked.png">
                        </button>
                    </div>

                    <!-- Preview -->
                    <div class="btn-group">
                        <span class="tool-name">Preview: </span>
                        <button type="button" class="btn btn-primary" id="cut_image"
                                title="Show cut_images">
                                <img src="public/images/cut.png">
                        </button>
                        <button type="button" class="btn btn-primary" id="3D_preview"
                                title="Show 3D preview">
                                <img src="public/images/3d.png">
                        </button>
                        <button type="button" class="btn btn-primary zoom_in" data-method="zoom" data-option="0.1"
                                title="Zoom In">
                                <img src="public/images/zoom.png">
                        </button>
                        <button type="button" class="btn btn-primary zoom_out" data-method="zoom" data-option="-0.1"
                                title="Zoom Out">
                                <img src="public/images/zoom-out.png">
                        </button>
                    </div>

                    <!-- Other -->
                    <div class="btn-group">
                        <span class="tool-name">Other: </span>
                        <button type="button" class="btn btn-primary refresh" data-method="reset" title="Reset">
                                <img src="public/images/refresh.png">
                        </button>
                        <button type="button" class="btn btn-primary undo" id="undoButton" data-method="undo"
                                title="Undo" disabled="true">
                                <img src="public/images/undo.png">
                        </button>
                        <button type="button" class="btn btn-primary redo" id="redoButton" data-method="redo"
                                title="Redo" disabled="true">
                                <img src="public/images/redo.png">
                        </button>
                        <button type="button" class="btn btn-primary question" id="InfoButton" data-method="info"
                                title="info">
                                <img src="public/images/que.png">
                        </button>
                        <button type="button" class="btn btn-primary square" id="squareButton" data-method="square"
                                title="" >
                                <img src="public/images/sq.png">
                        </button>
                    </div>
                </div>
                <div class="text-md-right action_menus">
                    <!--  Action -->
                    <div class="btn-group mr-0 action_btns">
                        <!-- <span class="tool-name">Action: </span> -->
                        <!-- <button type="button" class="btn btn-primary" id="proceed_to_finish" title="Proceed to Finish">
                            <img src="public/images/ok.png">
                        </button> -->
                        
                        <button type="button" class="btn btn-primary act print" id="ok_to_print" title="Ok to Print">
                            <!-- <img src="public/images/print.png"> -->
                            ok to print
                        </button>
                        <button type="button" class="btn btn-primary act replace" id="need_to_replace" title="Need to Replace">
                            <!-- <img src="public/images/edit.png"> -->
                            Need to Replace
                        </button>
                        <button type="button" class="btn btn-primary change_mode" id="change_theme" title="Change Theme">
                            <img class="change_mode_img" src="public/images/moon.png">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="preview-and-image-area">
            <div class="row">
                <div class="preview-area-left">
                    
                    <div class="img-container image-list-div previewthumbs">
                        <h3 class="colheader mb-4">Preview Area</h3>
                        <div class="images_holder_wrapper">
                        @if(isset($order_detail['images']) && !empty($order_detail['images']))
                            @foreach($order_detail['images'] as $key => $image)
                                <div class="thumbItem image_list {{$image['isCymk'] == 1 ? 'cymk_images' : ''}}"
                                     id="image-list-{{$key}}"
                                     data-cymk="{{$image['isCymk']}}"
                                     data-image_view="{{$image['image_view']}}" data-id="{{$key}}"
                                     data-src="{{$image['file']}}">
                                    <div class="image-view">
                                        <h6>{{$image['image_view']}}</h6>
                                    </div>
                                    <img
                                        class="img-responsive {{$image['image_view'] == "Front" ? 'front_image' : 'back_image'}}"
                                        src="{{$image['file']}}" data-id="{{$key}}">

                                    <span class="fas fa-check active-image" id="active_image_{{$key}}"></span>
                                    <span class="fa fa-times active-image" id="xmark_image_{{$key}}"></span>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
                <div class="preview-area-right">
                    <div class="mobile_for">
                        <div class="ruler"></div>
                        <div class="ruler vertical"></div>
                        <div class="img-container canvasImage" id="canvasImageDiv">
                            <div class="boxes-holder">
                                <div class="container_wrapper" >
                            @if(isset($order_detail['images']) && !empty($order_detail['images']))
                                <img id="image" src="{{$order_detail['images'][0]['file']}}" class="">
                            @endif
                                </div>
                            </div>
                        </div>
                        <div id="cymkErrorDiv" style="display: none;">
                            <p>Image is not CYMK.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="confirm_orientation">
            Please take a moment to confirm that your artwork is oriented correctly in our 3D preview tool.
        </div>
        <div id="proceed_to_finish_dialog">
            Please approve all sides by clicking the green "OK to Print" button.
        </div>
        <div id="ready-to-print-modal">
            <h5>Click OK below if your file(s) have been proofed and are ready to print.</h5>
            <!-- <ul>
                <li>Rotation is correct</li>
                <li>Adequate bleed is included</li>
                <li>Fonts &amp; Text is correct</li>
                <li>Images are present &amp; layered correctly</li>
            </ul>
            <h5>If the job is production ready, click the "Send to Production" button below.</h5> -->
        </div>
        <div id="help_modal_dialog">
            <ol class="rectangle-list">
                <li><div>Modals are built with HTML, CSS, and JavaScript.</div></li>
                <li><div>Modals use position: fixed, which can sometimes be a bit particular about its rendering. Whenever possible, place your modal HTML in a top-level position to avoid potential interference from other elements. You’ll likely run into issues when nesting a .modal within another fixed element.</div></li>
                <li><div>Clicking on the modal “backdrop” will automatically close the modal.</div></li>
                <li><div>Bootstrap only supports one modal window at a time. Nested modals aren’t supported as we believe them to be poor user experiences.</div></li>
                <li><div>Before getting started with Bootstrap’s modal component, be sure to read the following as our menu options have recently changed.</div></li>
            </ol>
        </div>
        <div id="time-expiration-modal">
            <h5>DO YOU NEED MORE TIME TO PROOF YOUR PRINT FILES?</h5>
        </div>

        <div id="need-to-replace-modal" class="">
            <h5 class="mt-2">Need to replace new files</h5>
            <form enctype="multipart/form-data">
                <div class="head"><button class="btn"><h4 id="item-replace-view-value"></h4></button>
                <input name="file" id="file" type="file" /> </div>
                <button type="button" class="btn btn-primary my-3 btn-danger mr-2" id="replace_yes" title="YES">YES</button>
            <button type="button" class="btn btn-primary my-3 btn-success" id="replace_no" title="No">NO</button>
            </form>
            <!-- <label class="btn btn-primary btn-upload my-3 mr-3 btn-danger" for="inputImage" title="Upload image file">
                <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Import image with Blob URLs">
                  YES
                </span>
            </label> -->
            
        </div>
    </div>
    <!-- The 3D Preview Modal -->
    <div class="modal fade modal_showing_3d" id="3DPreviewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div id="threeDconfirmwrapper">
                        <h4>Dear Customer:</h4>
                        <!-- <p>Use this 3D preview to confirm that artwork is oriented correctly on both sides. If
                            everything looks good, please check the box below. If there is an issue close this window
                            and rotate the artwork until it is correct.</p>
                        <form id="confirm3Dform">
                            <div>
                                <input class="confirm3d-checkbox" type="checkbox" name="checkbox_3d" id="checkbox_3d">
                                <span class="checkbox-label">Orientation is correct.</span>
                            </div>
                        </form> -->

                        <p><strong>Please Note: </strong>This 3D preview is only for verifying rotation. Colors on the
                            screen do not reflect the colors of the printed product.</p>
                        
                            <div class="card_outer_wrpper">
                                <div class="cardWrapper">
                                    <div class="row justify-content-lg-center">
                                        <div class="card image_3dim ">
                                            <div class="cardFace front">
                                                <img
                                                    src="{{isset($order_detail['images'][0]['file']) ? $order_detail['images'][0]['file'] : ''}}">
                                            </div>
                                            <div class="cardFace back">
                                                <img
                                                    src="{{isset($order_detail['images'][1]['file']) ? $order_detail['images'][1]['file'] : ''}}">
                                            </div>

                                        </div>
                                        <div class="rotation-slider">
                                            <div id="vertical-rotation">
                                                <input type="text" id="vertical-amount"
                                                       style="border:0; color:#f6931f; font-weight:bold;visibility: hidden;">
                                                <div id="vertical-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="">
                                            <div id="horizontal-rotation">
                                                <input type="text" id="horizontal-amount"
                                                       style="border:0; color:#f6931f; font-weight:bold;visibility: hidden;">
                                                <div id="horizontal-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        // window.onbeforeunload = function () {
        //     // localStorage.clear();
        //     return "Are you sure you want to leave?";
        // };

        $(document).ready(function () {
            // localStorage.clear();

            // open 3D Preview Modal
            $('#3D_preview').click(function () {
                var images = JSON.parse(localStorage.getItem('images'));
                var previewImages = [];
                if (images != null) {
                    for (var k in images) {
                        var image = images[k];
                        previewImages.push(image.canvasImageData);
                    }
                }
                if (previewImages.length != 0) {
                    $(".cardWrapper .front img").prop('src', previewImages[0]);
                    $(".cardWrapper .back img").prop('src', previewImages[1]);
                }

                $('#3DPreviewModal').modal('show');
            });

            // reinitialize cropper for each image click
            $(".image_list").on("click", function () {
                var imageID = $(this).data('id');

                // change item view in header
                $('#item-view-value').text($(this).data('image_view'));
                $('#item-replace-view-value').text($(this).data('image_view'));
                if ($(this).data('cymk') == 1) {

                    var optionData = null;
                    var canvasData = null;
                    var cropBoxData = null;
                    var disableImage = false;
                    var okToPrint = false;
                    var needToReplace = false;
                    var imageData = JSON.parse(localStorage.getItem('images'));
                    if (imageData != null) {
                        var cropperImageData = imageData['image_' + imageID];
                        if (cropperImageData != null) {
                            // console.log(cropperImageData);
                            optionData = cropperImageData.data;
                            canvasData = cropperImageData.canvasData;
                            cropBoxData = cropperImageData.cropBoxData;
                            disableImage = cropperImageData.disableImage;
                            okToPrint = cropperImageData.okToPrint;
                            needToReplace = cropperImageData.needToReplace;
                        }
                    }
                    // options
                    var options = {
                        preview: '.img-preview',
                            //aspectRatio: 16 / 9,
                            dragMode: 'move',
                            cropBoxMovable: false,
                            cropBoxResizable: false,
                            minCropBoxWidth: 680,
                            minCropBoxHeight: 400,
                        // autoCrop: false,
                        // dragMode: 'none',
                        // viewMode: 2,
                        // checkCrossOrigin: false,
                        // zoomOnWheel: false,
                        data: optionData,
                        ready: function () {
                            $('#image').cropper("setCanvasData", canvasData);
                            $('#image').cropper("setCropBoxData", cropBoxData);
                            $('#image').cropper("resetUndoRedoBuffer");
                            $('#image').data('id', 'image_' + imageID);
                            if (disableImage == true) {
                                $('#image').cropper("disable");
                            } else {
                                $('#image').cropper("enable");
                            }

                            if (okToPrint == true) {
                                $('#active_image_' + imageID).removeClass('active-image');
                                $('#active_image_' + imageID).addClass('thumb-checkmark-img');
                                // $('#image-list-' + imageID).next().trigger('click');
                            }
                            if (needToReplace == true) {
                                $('#xmark_image_' + imageID).removeClass('active-image');
                                $('#xmark_image_' + imageID).addClass('thumb-checkmark-img');
                                // $('#image-list-' + imageID).next().trigger('click');
                            }
                        },
                    };
                    $('#canvasImageDiv').show();
                    $('#cymkErrorDiv').hide();
                    

                    if (localStorage.getItem('uploadedImageURL'+imageID) != null) {
                        var dataImage = localStorage.getItem('uploadedImageURL'+imageID);
                        //console.log("99999999999",dataImage);
                        $('#image').cropper('destroy').attr('src', dataImage).cropper(options);
                        if (imageID == '0') {
                            //$("front_image img").attr("src","public/images/sun.png");
                            $('.front_image').attr('src', dataImage);
                            $('#image-list-0').data('src', dataImage);
                        }
                        
                        if (imageID == '1') {
                            $('.back_image').attr('src', dataImage);
                            $('#image-list-1').data('src', dataImage);
                        }
                    }else{
                        $('#image').cropper('destroy').attr('src', $(this).data('src')).cropper(options);
                    }
                    
                } else {
                    $('#canvasImageDiv').hide();
                    $('#cymkErrorDiv').show();
                }
            });

            // intialize cropper on first image
            $(".image-list-div .image_list").first().click();

            //display ok to print icon after page refresh
            if (JSON.parse(localStorage.getItem('images')) != null) {
                var images = JSON.parse(localStorage.getItem('images'));
                for (var k in images) {
                    var image = images[k];
                    var keyArray = k.split('_');
                    if (image.okToPrint == true) {
                        $('#active_image_' + keyArray[1]).removeClass('active-image');
                        $('#active_image_' + keyArray[1]).addClass('thumb-checkmark-img');
                    }
                    if (image.needToReplace == true) {
                        $('#xmark_image_' + keyArray[1]).removeClass('active-image');
                        $('#xmark_image_' + keyArray[1]).addClass('thumb-checkmark-img');
                    }
                }
            }

            // orienation confirmation popup
            $('#confirm_orientation').dialog({
                title: "Confirm Orientation",
                resizable: false,
                autoOpen: false,
                height: "auto",
                width: 400,
                modal: true,
                draggable: false,
                position: {my: 'top', at: 'top+150'},
                buttons: {
                    "Open 3D Preview": function () {
                        $(this).dialog("close");
                        $('#3D_preview').trigger('click');

                    }
                }
            });

            // proceed to finish dialog
            $('#proceed_to_finish_dialog').dialog({
                title: "Whoa There!",
                resizable: false,
                autoOpen: false,
                height: "auto",
                width: 400,
                modal: true,
                draggable: false,
                position: {my: 'top', at: 'top+150'},
                buttons: {
                    "ok": function () {
                        $(this).dialog("close");
                    }
                }
            });

            // ready to print modal popup
            $('#ready-to-print-modal').dialog({
                title: "Dear Customer:",
                resizable: false,
                autoOpen: false,
                height: "auto",
                width: 400,
                modal: true,
                draggable: false,
                close: function( event, ui ) {
                    localStorage.removeItem('countDownDate');
                    localStorage.removeItem('minuteCount');
                    localStorage.removeItem('secondCount');
                    location.reload();
                   },
                position: {my: 'top', at: 'top+150'},
                buttons: {
                    "OK": function () {
                        var page = "vasant"
                        fetch_data(page);
                        //$(this).dialog("close");
                        //$('#3D_preview').trigger('click');

                    }
                }
            });

            // proceed to finish dialog
            $('#help_modal_dialog').dialog({
                title: "Help",
                resizable: false,
                autoOpen: false,
                height: "auto",
                width: 800,
                modal: true,
                draggable: false,
                position: {my: 'top', at: 'top+150'},
                buttons: {
                    "OK": function () {
                        $(this).dialog("close");
                    }
                }
            });

             // ready to print modal popup
            $('#time-expiration-modal').dialog({
                title: "Dear Customer:",
                resizable: false,
                autoOpen: false,
                height: "auto",
                width: 400,
                modal: true,
                draggable: false,
                close: function( event, ui ) {
                    $('#expiration_time').html('00:00:00');
                    localStorage.clear();
                    $('#image').cropper('reset');
                    location.reload();
                   },
                position: {my: 'top', at: 'top+150'},
                buttons: {
                    "YES": function () {
                        localStorage.removeItem('countDownDate');
                        localStorage.removeItem('minuteCount');
                        localStorage.removeItem('secondCount');
                        location.reload();
                        //$(this).dialog("close");
                        //$('#3D_preview').trigger('click');

                    },
                    "NO": function () {
                        alert('This Session is no longer available');
                        $('#expiration_time').html('00:00:00');
                        localStorage.clear();
                        $('#image').cropper('reset');
                        location.reload();
                    }
                }
            });

            //proceed_to_finish
            $('#proceed_to_finish').click(function () {

                var images = JSON.parse(localStorage.getItem('images'));
                if (images != null) {
                    if (Object.keys(images).length == $(".image-list-div .cymk_images").length) {
                        var displayPreviewAlert = true;
                        for (var k in images) {
                            var image = images[k];
                            if (image.okToPrint == false) {
                                displayPreviewAlert = false;
                                break;
                            }
                        }
                        if (displayPreviewAlert == true) {
                            if($("#checkbox_3d").prop('checked') == true){
                                $('#ready-to-print-modal').dialog('open');
                            }else{
                                $('#confirm_orientation').dialog('open');
                            }
                        } else {
                            $('#proceed_to_finish_dialog').dialog('open');
                        }
                    } else {
                        $('#proceed_to_finish_dialog').dialog('open');
                    }
                }
            });

            //Help Modal
            $('#InfoButton').click(function () {
                $('#help_modal_dialog').dialog('open');
            });
            // display 30 min counter
            var minute = parseInt(30);
            if (localStorage.getItem('countDownDate') == null) {
                var countDownDate = new Date();
                countDownDate = countDownDate.setMinutes(countDownDate.getMinutes() + minute);
                localStorage.setItem('countDownDate', countDownDate);
                var secondCount = localStorage.getItem('secondCount') == null ? parseInt(0) : localStorage.getItem('secondCount');
                var minuteCount = localStorage.getItem('minuteCount') == null ? parseInt(0) : localStorage.getItem('minuteCount');
            } else {

                var secondCount = localStorage.getItem('secondCount');
                var minuteCount = localStorage.getItem('minuteCount');
                var countDownDate = localStorage.getItem('countDownDate');
                // countDownDate = countDownDate.setMinutes(countDownDate.getMinutes() + (minute - parseInt(minuteCount)));
            }
            // Update the count down every 1 second
            var x = setInterval(function () {
                localStorage.setItem('secondCount', secondCount);
                secondCount = parseInt(secondCount) + 1;

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
                var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
                var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);

                // Output the result
                $('#expiration_time').html(hours + ":" + minutes + ":" + seconds);


                if (secondCount == 59) {
                    minuteCount = parseInt(minuteCount) + 1;
                    localStorage.setItem('minuteCount', minuteCount);
                    secondCount = parseInt(0);

                }

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    $('#expiration_time').html('00:00:00');
                    $('#time-expiration-modal').dialog('open');
                    //$('#expiration_time').html('00:00:00');
                    // localStorage.clear();
                    // $('#image').cropper('reset');
                    // location.reload();
                }
            }, 1000);
        });

        //slider for 3D rotation
        $(function () {
            gsap.set(".cardWrapper", {perspective: 800});
            gsap.set(".card", {transformStyle: "preserve-3d"});
            gsap.set([".back", ".front"], {backfaceVisibility: "hidden"});
            $("#horizontal-slider").slider({
                orientation: "horizontal",
                range: "min",
                value: 0,
                max: 180,
                min: -180,
                slide: function (event, ui) {
                    $("#horizontal-amount").val(ui.value);
                    var str1 = $("#vertical-amount").val();
                    if (str1 == '') {
                        str1 = 0;
                    }
                    if (str1 >= 90 || str1 <= -90 && ui.value <= 90) {
                        gsap.set(".front", {rotationX: 180});
                        gsap.set(".front", {rotationY: 0});
                    } else {
                        gsap.set(".front", {rotationY: -180});
                        gsap.set(".front", {rotationX: 0});
                    }
                    gsap.to($(".card"), {
                        duration: 1.2,
                        rotationX: str1,
                        rotationY: ui.value,
                        //transformOrigin: "95px 95px",
                        ease: Back.easeOut
                    });
                }
            });
            //var str = 50;
            $("#vertical-slider").slider({
                orientation: "vertical",
                range: "min",
                value: 0,
                max: 180,
                min: -180,
                slide: function (event, ui) {
                    $("#vertical-amount").val(ui.value);
                    var str = $("#horizontal-amount").val();
                    if (str == '') {
                        str = 0;
                    }
                    if (str >= 90 || str <= -90 && ui.value <= 90) {
                        gsap.set(".front", {rotationY: -180});
                        gsap.set(".front", {rotationX: 0});

                    } else {
                        gsap.set(".front", {rotationX: 180});
                        gsap.set(".front", {rotationY: 0});
                    }

                    gsap.to($(".card"), {
                        duration: 1,
                        rotationY: str,
                        rotationX: ui.value,
                        //transformOrigin: "95px 95px",
                        ease: Back.easeOut
                    });
                }
            });
        });


        // $(document).ready(function(){
        //     $('button.change_mode').click(function(){
        //         $(this).children('img').attr('src', 'public/images/sun.png');
        //     })
        // })

        $(document).ready(function(){
          var flag = 0;  
          $("button.change_mode").click(function(){
            if(flag == 0) {
              $("button.change_mode img").attr("src","public/images/sun.png");
              flag = 1;
            }
            else if(flag == 1) {
              $("button.change_mode img").attr("src","public/images/moon.png");
              flag = 0;
            }
          });
        }); 


        $(document).ready(function(){
          var flag = 0;  
          $("button.lock.disable-image").click(function(){
            if(flag == 0) {
              $("button.lock.disable-image img").attr("src","public/images/unlocked.png");
              flag = 1;
            }
            else if(flag == 1) {
              $("button.lock.disable-image img").attr("src","public/images/lock.png");
              flag = 0;
            }
          });
        }); 

        $(document).ready(function(){
          var flag = 0;  
          $("button.change_mode").click(function(){
            if(flag == 0) {
              $("button.rotate.minus img").attr("src","public/images/dark_rotate_minus.png");
              $("button.rotate.plus img").attr("src","public/images/dark_rotate_plus.png");
              $("button.scale_ img").attr("src","public/images/dark_scale.png");
              $("button.lock.disable-image img").attr("src","public/images/dark_lock.png");
              $("#cut_image img").attr("src","public/images/dark_cut.png");
              $("#3D_preview img").attr("src","public/images/dark_3d.png");
              $("button.zoom_in img").attr("src","public/images/dark_zoom.png");
              $("button.zoom_out img").attr("src","public/images/dark_zoom_out.png");
              $("button.refresh img").attr("src","public/images/dark_refresh.png");
              $("button.undo img").attr("src","public/images/dark_undo.png");
              $("button.redo img").attr("src","public/images/dark_redo.png");
              $("button.question img").attr("src","public/images/dark_que.png");
              $("button.square img").attr("src","public/images/dark_sq.png");
              $("#proceed_to_finish img").attr("src","public/images/dark_ok.png");
              $('div.ui-dialog.ui-corner-all.ui-widget').addClass('dark_mode')
              flag = 1;
            }
            else if(flag == 1) {
              $("button.rotate.minus img").attr("src","public/images/rotate_left.png");
              $("button.rotate.plus img").attr("src","public/images/rotate_right.png");
              $("button.scale_ img").attr("src","public/images/scale.png");
              $("button.lock.disable-image img").attr("src","public/images/lock.png");
              $("#cut_image img").attr("src","public/images/cut.png");
              $("#3D_preview img").attr("src","public/images/3d.png");
              $("button.zoom_in img").attr("src","public/images/zoom.png");
              $("button.zoom_out img").attr("src","public/images/zoom-out.png");
              $("button.refresh img").attr("src","public/images/refresh.png");
              $("button.undo img").attr("src","public/images/undo.png");
              $("button.redo img").attr("src","public/images/redo.png");
              $("button.question img").attr("src","public/images/que.png");
              $("button.square img").attr("src","public/images/sq.png");
              $("#proceed_to_finish img").attr("src","public/images/ok.png");
              $('div.ui-dialog.ui-corner-all.ui-widget').removeClass('dark_mode')

              flag = 0;
            }
          });
        }); 

        $('button.change_mode').click(function() {
          $('div.home-main').toggleClass('dark_mode');
        });

        function createRuler() {
        var $ruler = $('.ruler');
        for (var i = 0, step = 0; i < $ruler.innerWidth() / 5; i++, step++) {
            var $tick = $('<div>');
            if (step == 0) {
                $tick.addClass('tickLabel').html(i * 5) ;
            } else if ([1, 3, 5, 7, 9].indexOf(step) > -1) {
                $tick.addClass('tickMinor');
                if (step == 9) {
                    step = -1;
                }
            } else {
                $tick.addClass('tickMajor');
            }
            $ruler.append($tick);
        }
        }

        $(window).on('load resize', function() {
            $('.ruler').empty();
                createRuler(); 
        });

        $('button#cut_image').click(function(){
            $('.home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-modal, .home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-container.cropper-bg').toggleClass('show_cut');
        })

        $('button#squareButton').click(function(){
            $('.home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-container.cropper-bg').toggleClass('show_cut');
            $('.home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-view-box, .home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-modal, .cropper-dashed').toggleClass('show_sq');
        })

        $('button#actual_size').click(function(){
            $('.home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-container.cropper-bg').toggleClass('show_cut');
            $('.home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-view-box, .home-main .preview-and-image-area .preview-area-right .boxes-holder .cropper-modal, .cropper-dashed').toggleClass('show_sq');
        })




        function fetch_data(page)
        {
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '{{ route("createPDF") }}';
            //var data = '';
            var images = JSON.parse(localStorage.getItem('images'));
            var previewImages = [];
            // if (images != null) {
            //     for (var k in images) {
            //         var image = images[k];
            //         previewImages.push(image.canvasImageData);
            //     }
            // }
            // if (previewImages.length != 0) {
            //     $(".cardWrapper .front img").prop('src', previewImages[0]);
            //     $(".cardWrapper .back img").prop('src', previewImages[1]);
            // }
            $.ajax({
                type: 'POST',
                url: url,
                data: images,
                // xhrFields: {
                //     responseType: 'blob'
                // },
                success: function(response){
                    console.log(response);
                    window.open(response, '_blank');
                    $('#ready-to-print-modal').dialog('close');
                //     var blob = new Blob([response]);
                //     var link = document.createElement('a');
                //     link.href = window.URL.createObjectURL(blob);
                //     link.download = "Sample.pdf";
                //     link.click();
               },
                error: function(blob){
                    console.log(blob);
                }
            });
        }


    </script>
@endsection

