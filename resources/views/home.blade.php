@extends('layouts.app')
@section('content')
    {{--    {{p($order_detail)}}--}}
    <div class="wrapper m-2">
        <header class="order-detail">
            <div class="order-header">
                <div class="row m-0">
                    <div class="col-md-4 bg-white logo-div">
                        <div class="header-logo">
                            <div class="thelogo"><img src="{{ asset('images/thelogo.png') }}"></div>
                            <div class="toolname">
                                <div class="tooltitle">CON<span class="logo4color">4</span>MATION</div>
                                <div class="toolversion">v3.0</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 bg-white order-info-div">
                        <div class="header-description">
                            <div class="header-job-id">
                                {{$order_detail->data->order_number}}
                            </div>
                            <div class="header-desc-items">
                                <div class="header-desc-item">
                                    <span class="header-desc-label">
                                         {{$order_detail->data->order_detail}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="preview-and-tools-wrap">
            <div class="row m-0" id="leftcol">
                <div class="col-md-3 bg-white preview_area">
                    <h3 class="colheader">Preview Area</h3>
                    <div class="img-container image-list-div previewthumbs">
                        @if(isset($order_detail->data->images) && !empty($order_detail->data->images))
                            @foreach($order_detail->data->images as $image)
                                <div class="thumbItem">
                                    <img class="image_list img-responsive"
                                         src="{{$image}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-8 bg-white tools_area">
                    <h3 class="colheader">Tools</h3>
                    <div class="row">
                        <div class="col-md-12 docs-buttons">
                            <!-- <h3>Toolbar:</h3> -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"
                                        title="Zoom In">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;zoom&quot;, 0.1)">
                                      <span class="fa fa-search-plus"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"
                                        title="Zoom Out">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;zoom&quot;, -0.1)">
                                      <span class="fa fa-search-minus"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="move" data-option="-10"
                                        data-second-option="0" title="Move Left">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;move&quot;, -10, 0)">
                                        <span class="fa fa-arrow-left"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="move" data-option="10"
                                        data-second-option="0" title="Move Right">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;move&quot;, 10, 0)">
                                      <span class="fa fa-arrow-right"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                        data-second-option="-10" title="Move Up">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;move&quot;, 0, -10)">
                                      <span class="fa fa-arrow-up"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                        data-second-option="10" title="Move Down">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;move&quot;, 0, 10)">
                                      <span class="fa fa-arrow-down"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90"
                                        title="Rotate Left">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;rotate&quot;, -90)">
                                      <span class="fa fa-undo-alt"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="90"
                                        title="Rotate Right">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;rotate&quot;, 90)">
                                      <span class="fa fa-redo-alt"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1"
                                        title="Flip Horizontal">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;scaleX&quot;, -1)">
                                      <span class="fa fa-arrows-alt-h"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1"
                                        title="Flip Vertical">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;scaleY&quot;, -1)">
                                      <span class="fa fa-arrows-alt-v"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;disable&quot;)">
                                      <span class="fa fa-lock"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;enable&quot;)">
                                      <span class="fa fa-unlock"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;reset&quot;)">
                                      <span class="fa fa-sync-alt"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" id="undoButton" data-method="undo"
                                        title="Undo">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;undo&quot;)">
                                      <span class="fa fa-undo-alt"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" id="redoButton" data-method="redo"
                                        title="Redo">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;redo&quot;)">
                                      <span class="fa fa-redo-alt"></span>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-primary" data-method="rotateTemplate"
                                        title="Rotate Template">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="$().cropper(&quot;rotateTemplate&quot;)">
                                      <span class="fa fa-redo-alt"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary" id="3D_preview"
                                        title="Show 3D preview">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="Show 3D preview">
                                      <span class=""> 3D </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="statusbar">
                                <div id="jobinfo">
                                    <div class="status-side bold">Item: <span class="normaltext">Front</span></div>
                                    <div class="status-width bold">Width: <span class="normaltext">undefined in</span>
                                    </div>
                                    <div class="status-height bold">Height: <span class="normaltext">undefined in</span>
                                    </div>
                                </div>
                                <div id="timer">
                                    <div class="expire-message"></div>
                                    <div class="countdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="img-container canvasImage">
                                @if(isset($order_detail->data->images) && !empty($order_detail->data->images))
                                    <div>
                                        <img id="image"
                                             src="{{$order_detail->data->images[0]}}">
                                    </div>
                                @endif

                            </div>
                        </div>
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
                        <div class="preview-image-container">
                            <img src="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        // var $image = $('#image');
        //
        // // $image.cropper({
        // //     // aspectRatio: 16 / 9,
        // //     autoCrop: false,
        // //     dragMode: 'none',
        // //     viewMode: 2,
        // //     minContainerWidth: 50,
        // //     minContainerHeight: 50,
        // //     minCanvasWidth: 100,
        // //     minCanvasHeight: 100,
        // //     // degree: 90,
        // // });
        // // Get the Cropper.js instance after initialized
        // var cropper = $image.data('cropper');
        $(document).ready(function () {
            $('#3D_preview').click(function () {
                $(".preview-image-container img").prop('src', $(".cropper-canvas img").prop('src'))
                $('#3DPreviewModal').modal('show');
            });
        });

    </script>
@endsection

