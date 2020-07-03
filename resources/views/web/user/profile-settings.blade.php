@extends('layout.web.profile')

@section('content')
    <section id="post" class="post-page-content inner-page-mid-content profile-page-outer">
        <div class="container" style="margin: 0 auto !important;">
            <div class="row">
                @include('web.common.leftsidebar')
                <div class="col-lg-10 col-sm-8 col-md-10 col-xs-12">
                    <div class="suggestion-box" style="padding: 4%;background-color: #d3d3d314">
                        <div class="row">
                            <h4 style="text-decoration: underline">Profile Settings</h4>
                            <div style="padding-top: 5px">
                                <h5>Keep Profile:</h5>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" id="csrf-token">
                            <div class="row" style="margin-left: 0.1%">
                                <label>Public</label>
                                <input style="margin-left: 7px;margin-top: 5px" name="privacy" type="radio" id="public"
                                       value="public" {{ ($privacy=="0")? "checked" : "" }}
                                       onchange="valueChanged()" checked>
                                <label style="margin-left: 15px">Private</label>
                                <input style="margin-left: 7px;margin-top: 5px" name="privacy" type="radio" id="private"
                                       value="private" {{ ($privacy=="1")? "checked" : "" }}
                                       onchange="valueChanged()">
                            </div>

                        </div>
                    </div>

                </div>

                <!-- right side bar start from there..  -->

                <div class="col-lg-1 col-sm-2 col-md-1 col-xs-1 vd-post-pos-right-outer"
                     style="padding: 0px; margin: 0px;">
                    <div class="post-left vd-post-right">
                        <div id="mySidebar1" class="sidebar" style="left: -93px !important;">
                            <div class="fixed-part">
                                <div class="home">
                                    <div class="container">
                                        <div class="neew1">
                                            <div onclick="topFunction()" id="myBtn1" class="neew">
                                                <span style="float: right !important;margin-right: 35px !important;">Hide Community Affairs </span>
                                                <a href="javascript:void(0)" class="closebtn"
                                                   style="left: -30px !important;" onclick="closeNav1()">
                                                    <img src="/web/profile/images/list-arrow.png"
                                                         class="bk img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-list">
                                    <div class="faq-coll">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/one.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/two.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/three.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a class="collapsed" data-toggle="collapse"
                                                           data-parent="#accordion" href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/four.png"
                                                                 class="ab img-responsive">
                                                            <p style="font-size:11.5px; font-weight: 600;" class="ev">
                                                                Mike John reacted to your photo </p>
                                                            <p style="font-size:11.5px;" class="ev"> March 10 at
                                                                9:05PM </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 style="text-align: left; background-color: #cccccc;  margin-top: 10px;">
                                                &nbsp; &nbsp; &nbsp;Contacts</h4>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/five.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/six.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse1">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/seven.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse2">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/eight.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/nine.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/ten.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/11.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/12.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div id="panel-title">
                                                        <a style="padding: 1px 0px 10px 0px;" class="collapsed"
                                                           data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse3">
                                                            <img style="margin: 0px 7px !important;"
                                                                 src="/web/profile/images/13.png"
                                                                 class="ab img-responsive">
                                                            <span style="font-size:11.5px; font-weight: 600; padding-top: 19px;"
                                                                  class="ev">Katie Daviscourt </span>
                                                            <span style="float: right; padding-top: 24px; padding-right: 10px;">
                                <div class="online"></div>
                              </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="left-menu" onclick="openNav1()">
                            <ul class="one">
                                <li>
                                    <a class="first" href="#">
                                        <img src="/web/profile/images/back.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                            </ul>
                            <ul class="two">
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/one.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/two.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/three.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/four.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a style="color: #000;">&nbsp;&nbsp;&nbsp;
                                        <b>Contacts</b>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/five.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/six.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/seven.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/eight.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/nine.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/ten.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/11.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/12.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/web/profile/images/13.png" class="menu-pic img-responsive">
                                    </a>
                                </li>
                                <li class="setting_black">
                                    <a href="#">Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <link href="{{asset('web/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('web/plugins/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{asset('web/js/timeline.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">

        function valueChanged() {
            let privacy = 0;
            if (document.getElementById("public").checked === true) {
                document.getElementById("public").value = 1;
                document.getElementById("private").value = 0;
                privacy = 0
            } else {
                document.getElementById("public").value = 0;
                document.getElementById("private").value = 1;
                privacy = 1;
            }
            let data = new FormData();
            data.append('privacy', privacy);
            data.append("_token", document.getElementById('csrf-token').value);
            $.ajax({
                url: `/save-settings`,
                type: 'POST',
                dataType: "JSON",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if (result['status']) {
                        Swal.fire(
                            'Settings saved!',
                            'Privacy Changed Successfully!',
                            'success'
                        )
                    } else {
                        setTimeout(function () {
                            swal.fire({
                                "title": "",
                                "text": result['message'],
                                "type": "error",
                                "confirmButtonClass": "btn btn-secondary",
                                "onClose": function (e) {
                                    console.log('on close event fired!');
                                }
                            })
                        }, 2000);
                    }
                }
            });
        }

        myDropzone = new Dropzone('div#pimageUpload', {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            timeout: 40000,
            maxFiles: 1,
            paramName: 'file',
            clickable: true,
            url: "{{route('edit_profile')}}",
            init: function () {
                debugger;

                var myDropzone = this;
                // Update selector to match your button
                $("#editProfile").click(function (e) {
                    e.preventDefault();
                    debugger;

                    //var form = $(this).closest('#dropzone-form');

                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        myDropzone.uploadFiles([]);
                        //send empty
                        $("#profileForm").submit();
                    }

                    //myDropzone.processQueue();

                    return false;
                });

                this.on('sending', function (file, xhr, formData) {
                    debugger;
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $("#profileForm").serializeArray();
                    $.each(data, function (key, el) {

                        formData.append(el.name, el.value);

                    });
                    console.log(formData);

                });
            },
            error: function (file, response) {
                debugger;
                var error_msg = '';
                $.each(response.errors, function (key, el) {
                    debugger;
                    error_msg += el[0];

                });

                myDropzone.removeAllFiles(true);
                $("#pverificationUploadFormError").html(error_msg);
                $("#pverificationUploadFormError").show();
                return false
            },
            successmultiple: function (file, response) {
                debugger;
                console.log(file, response);
                if (response.success == true) {
                    window.location.reload();
                }

            },
            completemultiple: function (file, response) {
                console.log(file, response, "completemultiple");
                //$modal.modal("show");
            },
            reset: function () {
                console.log("resetFiles");
                this.removeAllFiles(true);
            }
        });


        myDropzonei = new Dropzone('div#imageUpload', {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            timeout: 40000,
            maxFiles: 1,
            paramName: 'file',
            clickable: true,
            url: "{{route('add_post_image')}}",
            init: function () {
                debugger;

                var myDropzonei = this;
                // Update selector to match your button
                $("#finishImages").click(function (e) {
                    e.preventDefault();
                    myDropzonei.processQueue();

                    return false;
                });

                this.on('sending', function (file, xhr, formData) {
                    debugger;
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $("#imageForm").serializeArray();
                    $.each(data, function (key, el) {

                        formData.append(el.name, el.value);

                    });
                    console.log(formData);

                });
            },
            error: function (file, response) {
                debugger;
                var error_msg = '';
                $.each(response.errors, function (key, el) {
                    debugger;
                    error_msg += el[0];

                });

                myDropzonei.removeAllFiles(true);
                $("#verificationUploadFormError").html(error_msg);
                $("#verificationUploadFormError").show();
                return false

            },
            successmultiple: function (file, response) {
                debugger;
                console.log(file, response);
                if (response.success == true) {
                    window.location = "{{route('timeline')}}";
                }
                //debugger;
                // /
            },
            completemultiple: function (file, response) {
                console.log(file, response, "completemultiple");
                //$modal.modal("show");
            },
            reset: function () {
                console.log("resetFiles");
                this.removeAllFiles(true);
            }
        });
    </script>
@endsection
