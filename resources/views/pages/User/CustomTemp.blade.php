<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Template Designer</title>

    <!-- Style sheets -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Gorditas' rel='stylesheet' type='text/css'>

    <!-- jQuery UI - required -->
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <!-- Custom iconic font - required -->
    <link href="css/icon-font.css" rel="stylesheet" />
    <!-- External plugins css - required -->
    <link rel="stylesheet" type="text/css" href="css/plugins.min.css" />
    <!-- The CSS for the plugin itself - required -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancyProductDesigner.css" />
    <!-- Optional - only when you would like to use custom fonts - optional -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancyProductDesigner-fonts.css" />

    <!-- Include js files -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- HTML5 canvas library - required -->
    <script src="js/fabric.js" type="text/javascript"></script>
    <!-- The plugin itself - required -->
    <script src="js/jquery.fancyProductDesigner.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function(){

            var yourDesigner = $('#template-designer').fancyProductDesigner({
                editorMode: false,
                fonts: ['Arial', 'Fearless', 'Helvetica', 'Times New Roman', 'Verdana', 'Geneva', 'Gorditas'],
                customTextParameters: {
                    colors: false,
                    removable: true,
                    resizable: true,
                    draggable: true,
                    rotatable: true,
                    autoCenter: true,
                    boundingBox: "Base"
                },
                customImageParameters: {
                    draggable: true,
                    removable: true,
                    colors: '#000',
                    autoCenter: true,
                    boundingBox: "Base"
                }
            }).data('fancy-product-designer');

            //create an image
            $('#image-button').click(function(){
                var image = yourDesigner.createImage();
                return false;
            });
            
            //event handler when the price is changing
            $('#template-designer')
                    .bind('priceChange', function(evt, price, currentPrice) {
                        $('#price').text(currentPrice);
                    });

            //click handler for input upload
            $('#upload-button').click(function(){
                $('#design-upload').click();
                return false;
            });

            //upload image
            document.getElementById('design-upload').onchange = function (e) {
                if(window.FileReader) {
                    var reader = new FileReader();
                    reader.readAsDataURL(e.target.files[0]);
                    reader.onload = function (e) {

                        var image = new Image;
                        image.src = e.target.result;
                        image.onload = function() {
                            var maxH = 400,
                                maxW = 300,
                                imageH = this.height,
                                imageW = this.width,
                                scaling = 1;

                            if(imageW > imageH) {
                                if(imageW > maxW) { scaling = maxW / imageW; }
                            }
                            else {
                                if(imageH > maxH) { scaling = maxH / imageH; }
                            }

                            yourDesigner.addElement('image', e.target.result, 'my custom design', {colors: $('#colorizable').is(':checked') ? '#000000' : false, zChangeable: true, removable: true, draggable: true, resizable: true, rotatable: true, autoCenter: true, boundingBox: "Base", scale: scaling});
                        };
                    };
                }
                else {
                    alert('FileReader API is not supported in your browser, please use Firefox, Safari, Chrome or IE10!')
                }
            };
        });
    </script>
</head>

<body>
<div id="main-container" class="container">
    <h3 id="clothing">Template Designer</h3>
    <div id="template-designer" class="fpd-shadow-1">
        @if(isset($backDets))
            @foreach($backDets as $dets)
                <div class="fpd-product" title="{!! $dets->name !!}-Front" data-thumbnail="img/cusTempEng/Background/{!! $dets->fileFront !!}">
                    <img src="img/cusTempEng/Background/{!! $dets->fileFront !!}" title="Base" data-parameters='{"x": 0, "y": 0, "colors": "#000000", "price": {!! $dets->price !!}, "draggable": true,"resizable": true}' />
                    <span title="Any Text" data-parameters='{"boundingBox": "Base", "x": 326, "y": 232, "zChangeable": true, "removable": true, "draggable": true, "rotatable": true, "resizable": true, "colors": "#000000"}' >Default Text</span>
                    <div class="fpd-product" title="{!! $dets->name !!}-Back" data-thumbnail="img/cusTempEng/Background/{!! $dets->fileBack !!}">
                        <img src="img/cusTempEng/Background/{!! $dets->fileBack !!}" title="Base" data-parameters='{"x": 0, "y": 0, "colors": "Base", "price": {!! $dets->price !!},"draggable": true,"resizable": true}' />
                    </div>
                </div>
            @endforeach
        @endif

        <div class="fpd-design">
            @if(isset($desDets))
                @foreach($desDets as $catkey => $catDets )
                    <div class="fpd-category" title="{!! $catkey !!}">
                        @foreach($catDets as $dets)
                        <img src="img/cusTempEng/Designs/{!! $dets->fileDesign !!}" title="{!! $dets->name !!}" data-parameters='{"zChangeable": true, "x": 215, "y": 200, "colors": "#000000", "removable": true, "draggable": true, "rotatable": true, "resizable": true, "price": {!! $dets->price !!}, "boundingBox": "Base", "autoCenter": true}' />
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <br />

    <div class="row">
        <div class="api-buttons col-md-3">
            <a href="#" id="checkout-button" class="btn btn-success">Checkout</a>
        </div>
        <div class="api-buttons col-md-3">
            <a href="#" id="upload-button" class="btn btn-warning">Upload own design</a>
        </div>
        <div class="api-buttons col-md-3">
            <span class="price badge badge-inverse"><span id="price"></span> LKR</span>
        </div>
    </div>

    {{--<!-- The form recreation -->--}}
    <input type="file" id="design-upload" style="display: none;" />

</div>
</body>
</html>