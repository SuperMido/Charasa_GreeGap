<div class="row">
    <div class="col-md-12">
        <div class="card">
            <script>
                window.console = window.console || function(t) {};
            </script>
            <script>
                if (document.location.search.match(/type=embed/gi)) {
                    window.parent.postMessage("resize", "*");
                }
            </script>
            <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
            <script src="https://dmla.github.io/jsqrcode/src/qr_packed.js"></script>
            <script id="rendered-js">
                function openQRCamera(node) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        node.value = "";
                        qrcode.callback = function(res) {
                            if (res instanceof Error) {
                                alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                            } else {
                                //document.getElementById("hash").value = res;
                                $.ajax({
                                    url:'./?controller=pages&action=product',
                                    type: 'GET',
                                    data: {hash: res},
                                    success:function(data) {
                                        $('#result').html(data);
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        //case error
                                    }
                                });
                            }
                        };
                        qrcode.decode(reader.result);
                    };
                    reader.readAsDataURL(node.files[0]);
                }
            </script>
            <div class="card-header">Welcome to GreeGAP Management System!</div>
            <div class="card-body text-center">
                <td class="text-center align-middle" style="">
                    <button class="btn btn-lg btn-pill btn-success" type="button">
                        <label class="qrcode-text-btn">
                            <input type="file" accept="image/*" capture="environment" onchange="openQRCamera(this);" tabindex="-1">
                        </label> Scan now!
                    </button>
                    <style>
                        input,
                        label {
                            vertical-align: middle
                        }

                        .qrcode-text {
                            padding-right: 1.7em;
                            margin-right: 0
                        }

                        .qrcode-text-btn {
                            display: inline-block;
                            background: url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat;
                            height: 1em;
                            width: 1.7em;

                            cursor: pointer
                        }

                        .qrcode-text-btn>input[type=file] {
                            position: absolute;
                            overflow: hidden;
                            opacity: 0;
                        }
                    </style>
                </td>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="result"></div>
</div>