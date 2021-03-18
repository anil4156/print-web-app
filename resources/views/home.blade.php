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
                                <button type="button" class="btn btn-primary" data-method="setDragMode"
                                        data-option="move"
                                        title="Move">
				    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                          data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
				      <span class="fa fa-arrows-alt"></span>
				    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="setDragMode"
                                        data-option="crop"
                                        title="Crop">
				    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                          data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
				      <span class="fa fa-crop-alt"></span>
				    </span>
                                </button>
                            </div>

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
                                <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
				    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                          data-original-title="$().cropper(&quot;crop&quot;)">
				      <span class="fa fa-check"></span>
				    </span>
                                </button>
                                <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
				    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                          data-original-title="$().cropper(&quot;clear&quot;)">
				      <span class="fa fa-times"></span>
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
                                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                    <input type="file" class="sr-only" id="inputImage" name="file"
                                           accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                                          data-original-title="Import image with Blob URLs">
				      <span class="fa fa-upload"></span>
				    </span>
                                </label>
                                <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
				    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title=""
                          data-original-title="$().cropper(&quot;destroy&quot;)">
				      <span class="fa fa-power-off"></span>
				    </span>
                                </button>
                            </div>


                            <!-- Show the cropped image in modal -->
                            <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true"
                                 aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <a class="btn btn-primary" id="download" href="javascript:void(0);"
                                               download="cropped.jpg">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal -->
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
        // $(document).ready(function () {
        //     $('.image_list').click(function () {
        //         cropper.replace($(this).prop('src'));
        //     });
        // });

    </script>
@endsection

