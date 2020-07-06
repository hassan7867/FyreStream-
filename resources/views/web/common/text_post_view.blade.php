<div class="box2">
    <style type="text/css">
        .reply-comment-class{
            margin-top: 12px!important;font-size: 12px!important;
            cursor: pointer!important;
            margin-left: 10px!important;
        }
        .reply-comment-class:hover{
            text-decoration: underline;
        }
    </style>
    <link href="{{asset('web/css/emojionearea.min.css')}}" type="text/css" rel="stylesheet">
    <div class="box2-left">
        <a href="{{route('profile',$row->user->id)}}">
            <img src="/image/profileImages/{{$row->user->profile_pic}}" class="tanya img-responsive img-circle" style="width: 46px;
    height: 44px;">
        </a>
    </div>

    <div class="box2-right" style="width: 91%!important">
        <h4>
            <div class="row">
                <div class="col-lg-3">
                    {{$row->user->first_name}} {{$row->user->last_name}}
                    <span>1h</span></div>
                <div class="col-lg-9">
                    <img src="/web/timeline/images/share.png" class="world img-responsive"
                         style="float: right!important">
                </div>
            </div>
            <ul>
                <li>
                    <a href="#">
                <img src="/web/timeline/images/world.png" style="padding-top: 10px;padding-right: 2px;"
                     class="world img-responsive">
                    </a>
                </li>
{{--                <li class="last">--}}
{{--                    <a href="#">--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </h4>
        @if(filter_var($row->post_title, FILTER_VALIDATE_URL))
            <p class="b-bottom" id="append_result_{{$row->id}}"><a href="{{$row->post_title}}"
                                                                   target="_blank">{{$row->post_title}}</a></p>
        @else
            @if(strlen($row->post_title)<=10)
                <p class="b-bottom" id="append_result_{{$row->id}}"
                   style="font-size: 20px!important;">{{$row->post_title}}</p>
            @else
                <p class="b-bottom" id="append_result_{{$row->id}}">{{$row->post_title}}</p>
            @endif
        @endif
        <p class="b-bottom" id="append_result_{{$row->id}}">
            @if(!empty($row->image_name))
            <img src="/image/postImages/{{$row->image_name}}" class="tnya-vid img-responsive">
                @endif
        </p>
        <div class="row t-b-space">
            <div class="col-lg-4 col-sm-4 col-12">
                <div class="sandy-react emoji-react-outer" style="border:none;">
                    <ul class="comment-li guest-suggeston">
                        <li class="">
                            <div class="emoji-option-li">
                                <?php if(!empty($row->myreact)){

                                $type = $row->myreact->react_type;

                                if ($type == 0) {
                                    $image = 'hugging_face.gif';
                                } elseif ($type == 1) {
                                    $image = 'pouting_face.gif';
                                } elseif ($type == 2) {
                                    $image = 'crying_face.gif';
                                } else {
                                    $image = 'face_with_tears_of_joy.gif';
                                }  ?>

                                <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)"
                                   post_id="{{$row->id}}"><img style="height: 22px;margin: 0 !important;"
                                                               src="/image/{{$image}}" alt=""/>

                                </a>


                                <?php }else{?>
                                <a class="emoji-option-li myreact_{{$row->id}}" href="javascript:void(0)"
                                   post_id="{{$row->id}}"><img src="/image/like.png"
                                                               style="height: 22px;width:22px!important;margin: 0 !important;">
                                    {{--<img style="height: 22px;margin: 0 !important;"--}}
                                    {{--src="/image/like.png" alt=""/>--}}

                                </a>


                                <?php }?>


                                <div class="hover-emoji-option">
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="0"><img
                                                src="/image/hugging_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="1"><img
                                                src="/image/pouting_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="2"><img
                                                src="/image/crying_face.gif" alt=""/></a>
                                    <a class="react" href="javascript:void(0)" post_id="{{$row->id}}" type="3"><img
                                                src="/image/face_with_tears_of_joy.gif" alt=""/></a>
                                </div>

                            </div>

                            <?php if(!empty($row->myreact)){



                            $type = $row->myreact->react_type;

                            if ($type == 0) {
                                $image = 'hugging_face.gif';
                            } elseif ($type == 1) {
                                $image = 'pouting_face.gif';
                            } elseif ($type == 2) {
                                $image = 'crying_face.gif';
                            } else {
                                $image = 'face_with_tears_of_joy.gif';
                            }  ?>

                            <span class="ml-2 liketooltip">{{count($row->reacts)}}

                                @if(count($row->reacts)>0)
                                    <ul class="liketooltiptext">
                               <?php foreach ($row->reacts as $k => $rct) {?>
                                  <li>{{@$rct->user->first_name}} {{@$rct->user->last_name}}</li>
                                  <?php }?>
                                </ul>
                                @else
                                    <ul class="liketooltiptext">
                                  <li>No reaction yet</li>

                                </ul>

                                @endif
                        </span>
                            <?php }else{?>
                            <span class="ml-2 liketooltip">{{count($row->reacts)}}

                                @if(count($row->reacts)>0)
                                    <ul class="liketooltiptext">
                               <?php foreach ($row->reacts as $k => $rct) {?>
                                  <li>{{@$rct->user->first_name}} {{@$rct->user->last_name}}</li>
                                  <?php }?>
                                </ul>
                                @else
                                    <ul class="liketooltiptext">
                                  <li>No reaction yet</li>

                                </ul>

                                @endif
                        </span>

                            <?php }?>

                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-comment-alt" aria-hidden="true"
                                   style="padding-top: 8px;padding-right: 5px;"></i>{{count($row->comments)}}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="sharepopup" post_id="{{$row->id}}">
                                <i class="fas fa-share" aria-hidden="true"
                                   style="padding-top: 7px;padding-right: 5px;"></i>{{count($row->share)}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  <div class="col-lg-8 text-right col-sm-8 col-12">
               <p class="robin_img_new">
                 <img src="/web/timeline/images/reaction2.png" class=""> You,
                 <a href="#">Robin Holt </a>,
                 <a href="#">Roger Graham</a>, and
                 <a href="#">2 ohters.</a>
               </p>
             </div> -->
        </div>

        <div class="feedback2 new react_{{$row->id}}">
            @foreach($row->comments as $comment)
                <div class="comnt1" style="padding-bottom:20px;">
                    <a href="{{route('profile',$comment->user->id)}}"><img
                                src="/image/profileImages/{{$comment->user->profile_pic}}"
                                class="cmnt-pic img-responsive img-circle" style="width: 46px;height: 44px;"></a>
                    <div class="comnt-right" style="width: 90%">
                        <div class="comnt1-text">
                            <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}
                                <span>{{$comment->comment}}</span>
                                @if(!empty($comment->image))
                                    <div style="margin-top: 10px!important;">
                                        <img style="width: 150px!important;;height: 150px!important;"
                                             src="/image/{{$comment->image}}">
                                    </div>
                                @endif
                                <div onclick="replyComment('{{$comment->id}}')" class="reply-comment-class">- Reply
                                </div>
                                <br>

                                <div id="reply-div-{{$comment->id}}">
                                    @foreach(\App\ReplyCommentTable::where('id_comment',$comment->id)->get() as $replyItem)
                                        <div style="border-left: 1px solid black;color: grey;margin-top: 17px!important;margin-left: 2px!important;padding-left: 12px;height: 26px">
                                            <span style="color: #004080;font-weight: bold;font-size: 15px">{{\App\User::where('id',$replyItem->id_user)->first()['first_name']}}</span>
                                            <span style="margin-right: 10px!important;color: #004080;font-weight: bold;font-size: 15px">{{\App\User::where('id',$replyItem->id_user)->first()['last_name']}}</span>
                                            <span>{{$replyItem->message}}</span>
                                        </div>
                                        <div onclick="replyComment('{{$comment->id}}')" class="reply-comment-class">- Reply
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <div style="display: none; align-items: flex-end;" id="reply-section{{$comment->id}}">
                                    <input type="hidden" id="comment-id{{$comment->id}}">
                                    <input name="comment" class="form-control" id="reply-message-{{$comment->id}}"
                                           placeholder="Write a Comment..">
                                    <br>
                                    <a href="javascript:void(0)">
                                        <button type="button" id="hide-button-{{$comment->id}}" class="btn btn-primary btn-sm"
                                                onclick="replying({{$comment->id}})" style="font-size: 11px!important;">
                                            Reply
                                        </button>
                                    </a>

                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


        <div class="write-comment" style="width: 100%!important;margin-top: 23px!important;">
            <form style="width: 100%;padding-top: 2%;" name="postComment" id="postComment_{{$row->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$row->id}}">
                <div style="display: flex; align-items: flex-end;width: 100%;padding-left: 3%;">

                    <img class="img-circle img-responsive commentProfileImage"
                         src="/image/profileImages/{{Auth::user()->profile_pic}}">
                    <div style="  display:inline-block;position:relative;padding-left: 2%;">
                        <textarea name="comment" id="post-comment-{{$row->id}}" placeholder="Write a Comment.."
                                  style="display:block;width: 400px;margin-left: 10px"></textarea>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#post-comment-' + '{{$row->id}}').emojioneArea({
                                    pickerPosition: "bottom"
                                });
                            })
                        </script>
                        <i class="fas fa-camera"
                           style="position:absolute;bottom:10px;right:33px;cursor: pointer!important;" title="Add image"
                           onclick="uploadCommentImage('{{$row->id}}')" accept="image/*"></i>
                        <input type="file" name="image" id="comment-photo-{{$row->id}}" onchange="readPicURL(this)"
                               style="display: none">
                    </div>
                    <a href="javascript:void(0)" style="padding-left: 2%;">
                        <button type="button" post_id="{{$row->id}}" class="post_comment" onclick="commentFunction({{$row->id}})">Send</button>
                    </a>
                </div>
                <img id="pic-preview{{$row->id}}" style="width: 100px!important;margin-top: 5px;margin-left: 45px">
                <input type="hidden" value="{{csrf_token()}}" id="csrf-token">

            </form>
        </div>
    </div>
</div>
<script>
    let rowId = "";

    function uploadCommentImage(id) {
        rowId = id;
        document.getElementById("comment-photo-" + rowId).click();
    }

    function readPicURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('pic-preview' + rowId).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function replyComment(commentId) {

        document.getElementById("reply-section" + commentId).style.display = "block";
        document.getElementById("comment-id" + commentId).value = commentId;
    }

    function replying(commentId) {
        // let commentId = document.getElementById('comment-id' + commentId).value;
        let message = document.getElementById('reply-message-' + commentId).value;
        $.ajax({
            url: `{{env('APP_URL')}}/reply/comment`,
            type: 'POST',
            dataType: "JSON",
            data: {
                commentId: commentId,
                message: message,
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                var replyC = '<div onclick="replyComment('+commentId+')" class="reply-comment-class">- Reply\n' +
                    '                                        </div>'
                var comment_div = '<div style="    color: grey;' +
                    '    margin-top: 17px!important;' +
                    '    margin-left: 2px!important;' +
                    '    padding-left: 12px;' +
                    '    height: 26px;' +
                    '    border-left: 1px solid black;"><span style="color: #004080;font-weight: bold;font-size: 15px!important;">' + data.fname + '</span> <span style="margin-right: 10px!important;color: #004080;font-weight: bold;font-size: 15px">' + data.lname + '</span><span>' + data.comment + '</span></div>'+replyC+''
                console.log(document.getElementById("reply-div-" + commentId))
                $("#reply-div-" + commentId).append(comment_div);
                $("#reply-message-" + commentId).val('');
                // document.getElementById('hide-button-'+commentId).style.display="none";
                $("#hide-button-" + commentId).val('');
            },
        });
    }

    function commentFunction(postId){
        var post_id = postId;

        var url = '/save-comment';
        var method = "post";
        // var data = $("#postComment_"+post_id).serializeArray();
        let data = new FormData();
        data.append('image', document.getElementById('comment-photo-' + post_id).files[0]);
        data.append('post_id', post_id);
        data.append('comment', document.getElementById('post-comment-' + post_id).value);
        data.append("_token", document.getElementById('csrf-token').value);
        // call.send(data, url, method, function(data) {
        //
        // var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/'+data.user_image+'"  class="cmnt-pic img-responsive img-circle"><div class="comnt-right"><div class="comnt1-text"><h4>'+data.user_name+'<span>'+data.comment+'</span></h4></div></div></div>'
        // $(".react_"+post_id).append(comment_div);
        // $(".commentText").val('');
        //   // location.reload();
        // });
        $.ajax({
            url: `/save-comment`,
            type: 'POST',
            dataType: "JSON",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                console.log("commentId",data.commentId);
                let replySection = '<div style="display: none; align-items: flex-end;" id="reply-section'+data.commentId+'">\n' +
                    '                                    <input type="hidden" id="comment-id'+data.commentId+'">\n' +
                    '                                    <input name="comment" class="form-control" id="reply-message-'+data.commentId+'"\n' +
                    '                                           placeholder="Write a Comment..">\n' +
                    '                                    <br>\n' +
                    '                                    <a href="javascript:void(0)">\n' +
                    '                                        <button type="button" id="hide-button-'+data.commentId+'" class="btn btn-primary btn-sm"\n' +
                    '                                                onclick="replying('+data.commentId+')" style="font-size: 11px!important;">\n' +
                    '                                            Reply\n' +
                    '                                        </button>\n' +
                    '                                    </a>\n' +
                    '\n' +
                    '                                </div>'
                let replyDiv = '<div id="reply-div-'+data.commentId+'"></div><br>';
                if (data.image === ''){
                    var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/' + data.user_image + '"  class="cmnt-pic img-responsive img-circle">' +
                        '<div class="comnt-right" style="width: 90%"><div class="comnt1-text"><h4>' + data.user_name + '<span style="margin-left: 6px!important;">' + data.comment + '</span><br>' +'<div style="margin-top: 12px!important;font-size: 12px!important;" class="reply-comment-class" onclick="replyComment('+data.commentId+')">' + "- Reply" + '</div><br>'+
                        ''+replyDiv+''+replySection+'</h4></div></div></div>'
                } else {

                    var comment_div = '<div class="comnt1" style="padding-bottom:20px;"><img  style="width: 46px;height: 44px;" src="/image/profileImages/' + data.user_image + '"  class="cmnt-pic img-responsive img-circle">' +
                        '<div class="comnt-right" style="width: 90%"><div class="comnt1-text"><h4>' + data.user_name + '<span style="margin-left: 6px!important;">' + data.comment + '</span><br>' +
                        '<div style="margin-top: 12px!important;font-size: 12px!important;" class="reply-comment-class" onclick="replyComment('+data.commentId+')">' + "Reply" + '</div><br>'+
                        ''+replyDiv+''+replySection+'<img style="width: 150px!important;height: 150px!important;margin-top: 7px" src="/image/' + data.image + '"></h4></div></div></div>'
                }
                console.log(post_id);
                document.getElementById('post-comment-'+post_id).value="";
                $(".react_" + post_id).append(comment_div);
            },
        });
    }

    $("#send-comment-btn").click(function () {

    });
</script>
<script src="{{asset('web/js/emojionearea.min.js')}}"></script>
