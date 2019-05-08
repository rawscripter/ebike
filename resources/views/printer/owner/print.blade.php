<html>
<head>
    <meta charset="UTF-8">
    <style type="text/css" media="all">

        body {
            background: url("http://rawscripters.com/img/bg.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        @font-face {
            font-family: 'Ubuntu';
            src: {{ resource_path('assets/fonts/bangla/Nikosh.ttf') }} format('truetype');
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: 'Ubuntu';
            src: {{ resource_path('assets/fonts/bangla/Nikosh.ttf') }} format('truetype');
            font-weight: bold;
            font-style: normal;

        }

        body {
            font-family: "nikosh", sans-serif;
            font-size: 14px;
        }

        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }


        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            padding: 0;
        }

        .sec-1 {
            padding-top: 156px;
            padding-left: 20px;
            padding-bottom: 0px;
            width: 30%;
        }

        /*.sec-1, .sec-2, .sec-3 {*/
            /*float: left;*/
            /*display: inline-table;*/
            /*overflow: hidden;*/
        /*}*/

        /*.sec-1 img {*/

        /*}*/

        /*.sec-2 {*/
        /*padding-top: 45px;*/
        /*padding-left: 35px;*/
        /*width: 38%;*/
        /*}*/

        /*.sec-3 {*/
        /*padding-top: 45px;*/
        /*}*/

        /*.licance_area {*/

        /*}*/

        /*dd {*/
        /*padding: 0;*/
        /*margin: 0;*/
        /*font-size: 40px;*/
        /*line-height: 65%*/
        /*}*/

        /*dt {*/
        /*color: red;*/
        /*font-size: 36px;*/
        /*padding: 0;*/
        /*margin: 0;*/

        /*}*/

        /*.qr_code {*/
        /*margin-top: 0px;*/
        /*}*/
    </style>
</head>
<body>


<div class="main-sec">
    <div class="sec-1">
        <img style="margin:0;padding:0;border:0px solid #fff; border-radius: 5px;" src="{{$owner->image}}"
             alt="owner images"/>
        <div style="licance_area">
            <h2 style="color:red;text-align:center;margin-top:15px !important;padding:0;line-height: 85%; font-weight:normal;font-size:38px; ">
                রেজিস্ট্রেশন নং </h2>
            <p style="text-align:center;padding:0;margin:0;line-height:80%;font-size:48px;">'.$v_no.'</p>
        </div>
    </div>


    {{--<div class="sec-2">--}}
    {{--<dl>--}}
    {{--<dt style="margin:0;padding:0;">মালিকের নামঃ</dt>--}}
    {{--<dd style="line-height:90%margin:0;padding:0"><span style="font-size:43px;">{{$owner->name}}</span></dd>--}}
    {{--<dt>পিতা/স্বামীর নামঃ</dt>--}}
    {{--<dd>{{$owner->father_name}}</dd>--}}
    {{--<dt>জন্ম তারিখঃ <span style="color:black">{{$owner->birth_date}}</span></dt>--}}
    {{--<dt style="line-height:85%;">জাতীয়তাঃ <span style="color:black">{{$owner->nationality}}</span></dt>--}}
    {{--<dt>জাতীয় পরিচয় পত্র নাম্বারঃ</dt>--}}
    {{--<dd>{{$owner->national_id}}</dd>--}}
    {{--<dt style="">স্থায়ী ঠিকানাঃ</dt>--}}
    {{--<dd style="line-height:80%;">{{$owner->permanent_address}}</span></dd>--}}
    {{--</dl>--}}
    {{--</div>--}}
    {{--<div class="sec-3">--}}
    {{--<div class="others_details">--}}
    {{--<dl>--}}
    {{--<dt>গাড়ির ধরন/শ্রেনীঃ</dt>--}}
    {{--<dd style="line-height:80%">{{$owner->vehicle_type}}</dd>--}}
    {{--<dt>মোবাইল নাম্বারঃ</dt>--}}
    {{--<dd>'.$mobile.'</dd>--}}
    {{--<dt>মেয়াদ কালঃ</dt>--}}
    {{--<dd style="line-height:10%;">{{$owner->validity_date}}</dd>--}}
    {{--</dl>--}}
    {{--</div>--}}
    {{--<div class="qr_code">--}}
    {{--<img style="margin:0;padding:0;width:90%;height:90%" src="qr_code/qr_o'.$regi.'.png" alt="qr_code" />--}}
    {{--</div>--}}
    {{--</div>--}}


</div>
</body>
</html>
