@extends('layouts.app')
@section('content')
    <div class="wrapper p-3">
        <div class="order-detail">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <div class="pr-lg-3">
                            <h4><b>PrintVICE</b></h4>
                        </div>
                        <div class="jobNoDetail">
                            <div class=""><h6>Job No: {{$order_detail['ordersid']}}</h6></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="jobNameDetail">
                        <div class="job-name"><h6>Job Name: {{$order_detail['jobname']}}</h6></div>
                        <div class="job-name"><h6>Run Size: -</h6></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="description-detail">
                        <div class="color-spec"><h6>Color Spec: {{$order_detail['color']}}</h6></div>
                        <div class="description"><h6>Description: -</h6></div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="size-detail">
                        <?php
                        $size = explode('x', $order_detail['size']);
                        ?>
                        <div class="item-width"><h6>Width: {{$size[0]}}</h6></div>
                        <div class="item-height"><h6>Height: {{$size[1]}}</h6></div>
                    </div>
                </div>
                <div class="col-md-1">
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
                <div class="col-md-2">
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
            <div class="row">
                <div class="col-md-10 docs-buttons">
                    <!-- Rotate Template -->
                    <div class="btn-group">
                        <span class="tool-name">Orientation: </span>
                        <button type="button" class="btn btn-primary" data-method="rotateTemplatePotrait"
                                data-option="90"
                                title="Rotate Template Potrait">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Rotate Template Potrait"
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fa-reacteurope"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotateTemplateLandscape"
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
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90"
                                title="Rotate Left">
                            <span class="fa fa-undo-alt"></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="90"
                                title="Rotate Right">
                            <span class="fa fa-redo-alt"></span>
                        </button>
                    </div>

                    <!-- Scale -->
                    <div class="btn-group">
                        <span class="tool-name">Scale: </span>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.5"
                                title="Scale Up">
                            <span class="fas fa-caret-up"></span><i class=""></i>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.5"
                                title="Scale Down">
                            <span class="fas fa-caret-down"></span>
                        </button>
                    </div>

                    <!-- Move -->
                    <div class="btn-group">
                        <span class="tool-name">Move: </span>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="-10"
                                data-second-option="0" title="Move Left">
                            <span class="fa fa-arrow-left"></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="10"
                                data-second-option="0" title="Move Right">
                            <span class="fa fa-arrow-right"></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                data-second-option="-10" title="Move Up">
                            <span class="fa fa-arrow-up"></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                data-second-option="10" title="Move Down">
                            <span class="fa fa-arrow-down"></span>
                        </button>
                        <button type="button" class="btn btn-primary disable-image" data-method="disable"
                                title="Disable">
                            <span class="fa fa-lock"></span>
                        </button>
                        <button type="button" class="btn btn-primary enable-image" data-method="enable" title="Enable">
                            <span class="fa fa-unlock"></span>
                        </button>
                    </div>

                    <!-- Preview -->
                    <div class="btn-group">
                        <span class="tool-name">Preview: </span>
                        <button type="button" class="btn btn-primary" id="3D_preview"
                                title="Show 3D preview">
                            <span class=""> 3D </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"
                                title="Zoom In">
                            <span class="fa fa-search-plus"></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"
                                title="Zoom Out">
                            <span class="fa fa-search-minus"></span>
                        </button>
                    </div>

                    <!-- Other -->
                    <div class="btn-group">
                        <span class="tool-name">Other: </span>
                        <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                            <span class="fa fa-sync-alt"></span>
                        </button>
                        <button type="button" class="btn btn-primary" id="undoButton" data-method="undo"
                                title="Undo" disabled="true">
                            <span class="fa fa-undo-alt"></span>
                        </button>
                        <button type="button" class="btn btn-primary" id="redoButton" data-method="redo"
                                title="Redo" disabled="true">
                            <span class="fa fa-redo-alt"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-2">
                    <!--  Action -->
                    <div class="btn-group">
                        <span class="tool-name">Action: </span>
                        <button type="button" class="btn btn-primary" id="proceed_to_finish" title="Proceed to Finish">
                            <span class="fas fa-check"></span>
                        </button>
                        <button type="button" class="btn btn-primary" id="need_to_replace" title="Need to Replace">
                            <span class="fas fa-edit"></span>
                        </button>
                        <button type="button" class="btn btn-primary" id="ok_to_print" title="Ok to Print">
                            <span class="fas fa-print"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="preview-and-image-area">
            <div class="row">
                <div class="col-md-3 preview-area">
                    <h3 class="colheader">Preview Area</h3>
                    <div class="img-container image-list-div previewthumbs">
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
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-9 preview-area">
                    <div class="img-container canvasImage" id="canvasImageDiv">
                        @if(isset($order_detail['images']) && !empty($order_detail['images']))
                            <img id="image" src="{{$order_detail['images'][0]['file']}}" class="">
                        @endif
                    </div>
                    <div id="cymkErrorDiv" style="display: none;">
                        <p>Image is not CYMK.</p>
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
    </div>
    <!-- The 3D Preview Modal -->
    <div class="modal fade" id="3DPreviewModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div id="threeDconfirmwrapper">
                        <h4>Dear Customer:</h4>
                        <p>Use this 3D preview to confirm that artwork is oriented correctly on both sides. If
                            everything looks good, please check the box below. If there is an issue close this window
                            and rotate the artwork until it is correct.</p>
                        <form id="confirm3Dform">
                            <div>
                                <input class="confirm3d-checkbox" type="checkbox" name="checkbox_3d" id="checkbox_3d">
                                <span class="checkbox-label">Orientation is correct.</span>
                            </div>
                        </form>

                        <p><strong>Please Note: </strong>This 3D preview is only for verifying rotation. Colors on the
                            screen do not reflect the colors of the printed product.</p>
                        <div class="cardWrapper">
                            <div class="row">
                                <div class="card col-md-10">
                                    <div class="cardFace front">
                                        <img
                                            src="{{isset($order_detail['images'][0]['file']) ? $order_detail['images'][0]['file'] : ''}}">
                                    </div>
                                    <div class="cardFace back">
                                        <img
                                            src="{{isset($order_detail['images'][1]['file']) ? $order_detail['images'][1]['file'] : ''}}">
                                    </div>

                                </div>
                                <div class="rotation-slider col-md-2">
                                    <div id="vertical-rotation">
                                        <input type="text" id="vertical-amount"
                                               style="border:0; color:#f6931f; font-weight:bold;visibility: hidden;">
                                        <div id="vertical-slider"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
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

                if ($(this).data('cymk') == 1) {

                    var optionData = null;
                    var canvasData = null;
                    var cropBoxData = null;
                    var disableImage = false;
                    var okToPrint = false;
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
                        }
                    }
                    // options
                    var options = {
                        preview: '.img-preview',
                        autoCrop: false,
                        dragMode: 'none',
                        viewMode: 2,
                        checkCrossOrigin: false,
                        zoomOnWheel: false,
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
                        },
                    };
                    $('#canvasImageDiv').show();
                    $('#cymkErrorDiv').hide();
                    $('#image').cropper('destroy').attr('src', $(this).data('src')).cropper(options);
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
                            $('#confirm_orientation').dialog('open');
                        } else {
                            $('#proceed_to_finish_dialog').dialog('open');
                        }
                    } else {
                        $('#proceed_to_finish_dialog').dialog('open');
                    }
                }
            });

            // display 30 min counter
            var minute = parseInt(50);
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
                    localStorage.clear();
                    $('#image').cropper('reset');
                    location.reload();
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
                        transformOrigin: "95px 95px",
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
                        transformOrigin: "95px 95px",
                        ease: Back.easeOut
                    });
                }
            });
        });
    </script>
@endsection

