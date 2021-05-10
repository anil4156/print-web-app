$(function () {
    'use strict';

    var console = window.console || {
        log: function () {
        }
    };
    var localStorageArr = [];
    var URL = window.URL || window.webkitURL;
    var $image = $('#image');
    var $download = $('#download');
    var $dataX = $('#dataX');
    var $dataY = $('#dataY');
    var $dataHeight = $('#dataHeight');
    var $dataWidth = $('#dataWidth');
    var $dataRotate = $('#dataRotate');
    var $dataScaleX = $('#dataScaleX');
    var $dataScaleY = $('#dataScaleY');
    var options = {
        preview: '.img-preview',
        dragMode: 'move',
        cropBoxMovable: false,
        cropBoxResizable: false,
        minCropBoxWidth: 680,
        minCropBoxHeight: 400,
        // autoCrop: false,
        // dragMode: 'none',
        // viewMode: 2,
        // checkCrossOrigin: false,
        // crop: function (e) {
        //     $dataX.val(Math.round(e.detail.x));
        //     $dataY.val(Math.round(e.detail.y));
        //     $dataHeight.val(Math.round(e.detail.height));
        //     $dataWidth.val(Math.round(e.detail.width));
        //     $dataRotate.val(e.detail.rotate);
        //     $dataScaleX.val(e.detail.scaleX);
        //     $dataScaleY.val(e.detail.scaleY);
        // }
    };
    var originalImageURL = $image.attr('src');
    var uploadedImageName = 'cropped.jpg';
    var uploadedImageType = 'image/jpeg';
    var uploadedImageURL;

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Cropper
    $image.on({
        ready: function (e) {
            console.log(e.type);
        },
        cropstart: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropmove: function (e) {
            console.log(e.type, e.detail.action);
        },
        cropend: function (e) {
            console.log(e.type, e.detail.action);
        },
        crop: function (e) {
            console.log(e.type);
        },
        zoom: function (e) {
            //console.log("**********",e);
            // if (e.detail.ratio > 1) {
            //     //alert('hi');
            //   e.preventDefault();
            //   $(this).cropper('zoomTo', 1);
            // }
            //zoomMax = e.detail.ratio;
            console.log(e.type, e.detail.ratio);
        }
    }).cropper(options);

    // Buttons
    if (!$.isFunction(document.createElement('canvas').getContext)) {
        $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
    }

    if (typeof document.createElement('cropper').style.transition === 'undefined') {
        $('button[data-method="rotate"]').prop('disabled', true);
        $('button[data-method="scale"]').prop('disabled', true);
    }

    // Download
    // if (typeof $download[0].download === 'undefined') {
    //     $download.addClass('disabled');
    // }

    // Options
    $('.docs-toggles').on('change', 'input', function () {
        var $this = $(this);
        var name = $this.attr('name');
        var type = $this.prop('type');
        var cropBoxData;
        var canvasData;

        if (!$image.data('cropper')) {
            return;
        }

        if (type === 'checkbox') {
            options[name] = $this.prop('checked');
            cropBoxData = $image.cropper('getCropBoxData');
            canvasData = $image.cropper('getCanvasData');

            options.ready = function () {
                $image.cropper('setCropBoxData', cropBoxData);
                $image.cropper('setCanvasData', canvasData);
            };
        } else if (type === 'radio') {
            options[name] = $this.val();
        }

        $image.cropper('destroy').cropper(options);
    });

    // Methods
    $('.docs-buttons').on('click', '[data-method]', function () {
        var $this = $(this);
        var data = $this.data();
        var cropper = $image.data('cropper');
        var cropped;
        var $target;
        var result;
        var imageID = $image.data('id');

        if ($this.prop('disabled') || $this.hasClass('disabled')) {
            return;
        }

        if (cropper && data.method) {
            data = $.extend({}, data); // Clone a new one

            if (typeof data.target !== 'undefined') {
                $target = $(data.target);

                if (typeof data.option === 'undefined') {
                    try {
                        data.option = JSON.parse($target.val());
                    } catch (e) {
                        console.log(e.message);
                    }
                }
            }

            cropped = cropper.cropped;

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('clear');
                    }

                    break;

                case 'getCroppedCanvas':
                    if (uploadedImageType === 'image/jpeg') {
                        if (!data.option) {
                            data.option = {};
                        }

                        data.option.fillColor = '#fff';
                    }

                    break;
            }

            result = $image.cropper(data.method, data.option, data.secondOption);

            switch (data.method) {
                case 'rotate':
                    if (cropped && options.viewMode > 0) {
                        $image.cropper('crop');
                    }

                    break;

                case 'scaleX':
                case 'scaleY':
                    $(this).data('option', -data.option);
                    break;

                case 'getCroppedCanvas':
                    if (result) {
                        // Bootstrap's Modal
                        $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                        if (!$download.hasClass('disabled')) {
                            download.download = uploadedImageName;
                            $download.attr('href', result.toDataURL(uploadedImageType));
                        }
                    }

                    break;

                case 'destroy':
                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                        uploadedImageURL = '';
                        $image.attr('src', originalImageURL);
                    }

                    break;
            }

            if ($.isPlainObject(result) && $target) {
                try {
                    $target.val(JSON.stringify(result));
                } catch (e) {
                    console.log(e.message);
                }
            }
            $image.cropper('enableDisableUndoRedo');

            // save image data to local storage
            saveLocalStorage(imageID, false);
        }
    });

    // ok to print
    $('#ok_to_print').click(function (e) {
        var imageId = $image.data('id');
        $('#active_' + imageId).removeClass('active-image');
        $('#active_' + imageId).addClass('thumb-checkmark-img');
        // $('#image-list-' + imageIdArr[1]).next().trigger('click');
        var okToPrint = true;
        var needToReplace = false;
        var item = $('#item-view-value').text();
        saveLocalStorage(imageId, okToPrint, needToReplace, item);

        var images = JSON.parse(localStorage.getItem('images'));
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
                // if($("#checkbox_3d").prop('checked') == true){
                //     $('#ready-to-print-modal').dialog('open');
                // }else{
                //     $('#confirm_orientation').dialog('open');
                // }
                $('#ready-to-print-modal').dialog('open');
                //$('#confirm_orientation').dialog('open');
            }
        }

    });

     // need_to_replace modal popup
    $('#need-to-replace-modal').dialog({
        title: "Need to replace:",
        resizable: false,
        autoOpen: false,
        height: "auto",
        width: 400,
        modal: true,
        draggable: false,
        close: function( event, ui ) {
           },
        position: {my: 'top', at: 'top+150'},
    });
    // replace_no
    $('#replace_no').click(function (e) {
        $('#need-to-replace-modal').dialog('close');
        return false;
    });
    // need to replace
    $('#need_to_replace').click(function (e) {

        
        var imageId = $image.data('id');
        $('#xmark_' + imageId).removeClass('active-image');
        $('#xmark_' + imageId).addClass('thumb-checkmark-img');
        var okToPrint = false;
        var needToReplace = true;
        saveLocalStorage(imageId, okToPrint, needToReplace);
        $('#need-to-replace-modal').dialog('open');

       /* var images = JSON.parse(localStorage.getItem('images'));
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
                //$('#confirm_orientation').dialog('open');
            }
        }*/

    });

    function saveLocalStorage(imageID, okToPrint = false, needToReplace = false, item = '') {
        if (okToPrint == false) {
            $('#active_' + imageID).removeClass('thumb-checkmark-img');
            $('#active_' + imageID).addClass('active-image');
        }
        if (needToReplace == false) {
            $('#xmark_' + imageID).removeClass('thumb-checkmark-img');
            $('#xmark_' + imageID).addClass('active-image');
        }
        var imageData = {
            [imageID]: {
                data: $image.cropper('getData'),
                canvasData: $image.cropper('getCanvasData'),
                cropBoxData: $image.cropper('getCropBoxData'),
                canvasImageData: $image.cropper("getCroppedCanvas", '{"maxWidth": 300, "maxHeight": 300}').toDataURL("image/png"),
                disableImage: $image.data('cropper').disabled,
                okToPrint: okToPrint,
                needToReplace:needToReplace,
                previewItem:item,
            }
        };
        Object.assign(localStorageArr, JSON.parse(localStorage.getItem('images')));
        Object.assign(localStorageArr, imageData);
        localStorage.setItem('images', JSON.stringify(Object.assign({}, localStorageArr)));
    }

    // Keyboard
    $(document.body).on('keydown', function (e) {
        if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
            return;
        }

        switch (e.which) {
            case 37:
                e.preventDefault();
                $image.cropper('move', -1, 0);
                break;

            case 38:
                e.preventDefault();
                $image.cropper('move', 0, -1);
                break;

            case 39:
                e.preventDefault();
                $image.cropper('move', 1, 0);
                break;

            case 40:
                e.preventDefault();
                $image.cropper('move', 0, 1);
                break;
        }
    });

    // replace_yes
    var $file = $('#file');

    $('#replace_yes').click(function (e) {
        //$('#need-to-replace-modal').dialog('close');
        var files = $('#file')[0].files;
        var file;
        console.log("-------------",files);
        var actimageID = $image.data('id');
        if (files && files.length) {
            file = files[0];

            $('#xmark_' + actimageID).removeClass('active-image');
            $('#xmark_' + actimageID).addClass('thumb-checkmark-img');
            var okToPrint = false;
            var needToReplace = false;
            saveLocalStorage(actimageID, okToPrint, needToReplace);
            if (!$image.data('cropper')) {
                return;
            }

            if (/^image\/\w+$/.test(file.type)) {
                var actimageID = actimageID.replace(/\D/g, "");
                //alert(res);
                  const file12 = file;
                    const reader = new FileReader();
                    reader.onloadend = () => {
                      var base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
                      localStorage.setItem('uploadedImageURL'+actimageID, 'data:image/png;base64,'+base64String);
                      //document.body.style.background = `url(data:image/png;base64,${base64String})`;
                    $image.cropper('destroy').attr('src', 'data:image/png;base64,'+base64String).cropper(options);
                    if (actimageID == '0') {
                        //$("front_image img").attr("src","public/images/sun.png");
                        $('.front_image').attr('src', 'data:image/png;base64,'+base64String);
                        $('#image-list-0').data('src', 'data:image/png;base64,'+base64String);
                    }
                    
                    if (actimageID == '1') {
                        $('.back_image').attr('src', 'data:image/png;base64,'+base64String);
                        $('#image-list-1').data('src', 'data:image/png;base64,'+base64String);
                    }
                    };
                    reader.readAsDataURL(file12);

                $('#need-to-replace-modal').dialog('close');
                $file.val('');
            } else {
                window.alert('Please choose an image file.');
            }
        }else {
            window.alert('Please choose an image file.');
        }

    });


    var $inputImage = $('#inputImage');

    if (URL) {
        $inputImage.change(function () {
            //$('#need-to-replace-modal').dialog('close');
            var files = this.files;
            var file;
            var actimageID = $image.data('id');

            $('#xmark_' + actimageID).removeClass('active-image');
            $('#xmark_' + actimageID).addClass('thumb-checkmark-img');
            var okToPrint = false;
            var needToReplace = false;
            saveLocalStorage(actimageID, okToPrint, needToReplace);
            if (!$image.data('cropper')) {
                return;
            }

            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    uploadedImageName = file.name;
                    uploadedImageType = file.type;

                    if (uploadedImageURL) {
                        URL.revokeObjectURL(uploadedImageURL);
                    }
                    var actimageID = actimageID.replace(/\D/g, "");
                    //alert(res);
                      const file12 = file;
                        const reader = new FileReader();
                        reader.onloadend = () => {
                          var base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
                          localStorage.setItem('uploadedImageURL'+actimageID, 'data:image/png;base64,'+base64String);
                          //document.body.style.background = `url(data:image/png;base64,${base64String})`;
                        $image.cropper('destroy').attr('src', 'data:image/png;base64,'+base64String).cropper(options);
                        if (actimageID == '0') {
                            //$("front_image img").attr("src","public/images/sun.png");
                            $('.front_image').attr('src', 'data:image/png;base64,'+base64String);
                            $('#image-list-0').data('src', 'data:image/png;base64,'+base64String);
                        }
                        
                        if (actimageID == '1') {
                            $('.back_image').attr('src', 'data:image/png;base64,'+base64String);
                            $('#image-list-1').data('src', 'data:image/png;base64,'+base64String);
                        }
                        };
                        reader.readAsDataURL(file12);
                   
                    uploadedImageURL = URL.createObjectURL(file);
                    //$image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);

                    
                    $inputImage.val('');
                } else {
                    window.alert('Please choose an image file.');
                }
            }
        });
    } else {
        $inputImage.prop('disabled', true).parent().addClass('disabled');
    }
});
