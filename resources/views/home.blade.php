@extends('layouts.app')
@section('content')
    <div class="wrapper p-3">
        <div class="order-detail">
            <div class="row">
                <div class="col-md-2 logo-div">
                    <div class="header-logo">
                        <div class="thelogo pr-lg-2"><img src="{{ asset('images/thelogo.png') }}"></div>
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
                <div class="col-md-2">
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
                                The preview will expire in <b><span id="expiration_time">2:30:15</span></b>
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
                                title="Rotate Template">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fa-reacteurope"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotateTemplateLandscape"
                                data-option="0"
                                title="Rotate Template">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
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
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotate&quot;, -90)">
                              <span class="fa fa-undo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="90"
                                title="Rotate Right">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotate&quot;, 90)">
                                <span class="fa fa-redo-alt"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Scale -->
                    <div class="btn-group">
                        <span class="tool-name">Scale: </span>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.5"
                                title="Scale">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;scaleX&quot;, 0.5)">
                              <span class="fas fa-caret-up"></span><i class=""></i>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.5"
                                title="Scale">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;scaleX&quot;, -0.5)">
                              <span class="fas fa-caret-down"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Move -->
                    <div class="btn-group">
                        <span class="tool-name">Move: </span>
                        <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move"
                                title="Move">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                  data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                              <span class="fa fa-arrows-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;disable&quot;)">
                              <span class="fa fa-lock"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;enable&quot;)">
                              <span class="fa fa-unlock"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Preview -->
                    <div class="btn-group">
                        <span class="tool-name">Preview: </span>
                        <button type="button" class="btn btn-primary" id="3D_preview"
                                title="Show 3D preview">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Show 3D preview"
                                  data-original-title="Show 3D preview">
                              <span class=""> 3D </span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"
                                title="Zoom In">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;zoom&quot;, 0.1)">
                              <span class="fa fa-search-plus"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"
                                title="Zoom Out">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;zoom&quot;, -0.1)">
                              <span class="fa fa-search-minus"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Other -->
                    <div class="btn-group">
                        <span class="tool-name">Other: </span>
                        <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Reset"
                                  data-original-title="$().cropper(&quot;reset&quot;)">
                              <span class="fa fa-sync-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" id="undoButton" data-method="undo"
                                title="Undo">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Undo"
                                  data-original-title="$().cropper(&quot;undo&quot;)">
                              <span class="fa fa-undo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" id="redoButton" data-method="redo"
                                title="Redo">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title="Redo"
                                  data-original-title="$().cropper(&quot;redo&quot;)">
                              <span class="fa fa-redo-alt"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-md-2">
                    <!--  Action -->
                    <div class="btn-group">
                        <span class="tool-name">Action: </span>
                        <button type="button" class="btn btn-primary">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fas fa-check"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fas fa-edit"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false"
                                  title=""
                                  data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                              <span class="fas fa-print"></span>
                            </span>
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
                            @foreach($order_detail['images'] as $image)
                                <div class="thumbItem">
                                    <div class="image-view">
                                        <h6>{{$image['image_view']}}</h6>
                                    </div>
                                    <img
                                        class="image_list img-responsive {{$image['image_view'] == "Front" ? 'front_image' : 'back_image'}}"
                                        src="{{$image['file']}}" data-cymk="{{$image['isCymk']}}"
                                        data-image_view="{{$image['image_view']}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-9 preview-area">
                    <div class="img-container canvasImage" id="canvasImageDiv">
                        @if(isset($order_detail['images']) && !empty($order_detail['images']))
                            <img id="image232" src="{{$order_detail['images'][0]['file']}}" class="">
                        @endif
                    </div>
                    <div id="cymkErrorDiv" style="display: none;">
                        <p>Image is not CYMK.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The 3D Preview Modal -->
    <div class="modal fade" id="3DPreviewModal">
        <div class="modal-dialog modal-lg">
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
                            <div class="card">
                                <div class="cardFace front">
                                    <img src="http://localhost/print-web-app/public/images/our-mission.png">
                                </div>
                                <div class="cardFace back">
                                    <img src="http://localhost/print-web-app/public/images/our-vision.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <p style="display: none;">
                                <label for="amount">H Amout：</label>
                                <input type="text" id="horizontal-amount"
                                       style="border:0; color:#f6931f; font-weight:bold;">
                            </p>
                        </div>
                        <p>horizontal</p>
                        <div id="horizontal-slider"></div>
                        <div>
                            <p style="display: none;">
                                <label for="vertical-amount">V Amout：</label>
                                <input type="text" id="vertical-amount"
                                       style="border:0; color:#f6931f; font-weight:bold;">
                            </p>
                        </div>
                        <p>vertical</p>
                        <div id="vertical-slider"></div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#3D_preview').click(function () {
                $(".cardWrapper .front img").prop('src', $(".image-list-div .front_image").prop('src'))
                $(".cardWrapper .back img").prop('src', $(".image-list-div .back_image").prop('src'))
                $('#3DPreviewModal').modal('show');
            });

            // reintialize cropper for each image change
            $(".image_list").on("click", function () {
                $('#item-view-value').text($(this).data('image_view'));
                if ($(this).data('cymk') == 1) {
                    var options = {
                        preview: '.img-preview',
                        autoCrop: false,
                        dragMode: 'none',
                        viewMode: 2,
                        checkCrossOrigin: false,
                    };
                    $('#canvasImageDiv').show();
                    $('#cymkErrorDiv').hide();
                    $('#image').cropper('destroy').attr('src', $(this).prop('src')).cropper(options);
                } else {
                    $('#canvasImageDiv').hide();
                    $('#cymkErrorDiv').show();
                }

            });
        });
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

