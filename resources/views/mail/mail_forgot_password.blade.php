{{-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Eliteadmin Responsive web app kit</title>
</head>

<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top;" align="center">
                            <a href="ketikaku.com" target="_blank"><img width="200px" src="https://i.ibb.co/kxjHKKx/logo-text.png" alt="KETIKAKU" style="border:none"><br/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="border-bottom:1px solid #f6f6f6;">
                                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear {{ $username }},</h1>
                                <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0 30px 0;">
                                <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
                                <center>
                                    <a href="{{ route('forgot_password_page_reset_password',['token'=>$token,'id'=>$code]) }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>
                                </center>
                                <b>- Team Ketikaku</b> </td>
                        </tr>
                        <tr>
                            <td style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at admin@ketiaku.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <style type="text/css">
    body {
        Margin: 0!important;
        padding: 15px;
        background-color: #FFF;
    }
    .wrapper {
        width: 100%;
        table-layout: fixed;
    }
    .wrapper-inner {
        width: 100%;
        background-color: #eee;
        max-width: 670px;
        Margin: 0 auto;
    }
    table {
        border-spacing: 0;
        font-family: sans-serif;
        color: #727f80;
    }
    .outer-table {
        width: 100%;
        max-width: 670px;
        margin: 0 auto;
        background-color: #FFF;
    }
    td {
        padding: 0;
    }
    .header {
        background-color: #22436c;
        border-bottom: 3px solid #81B9C3;
    }
    p {
        Margin:0;
    }
    .header p {
        text-align: center;
        /*padding: 5%;*/
        font-weight: 500;
        font-family: georgia;
        font-size: 11px;
        text-transform: uppercase;
    }
    a {
        color: #F1F1F1;
        text-decoration: none;
    }
    /*--- End Outer Table 1 --*/
    .main-table-first {
        width: 100%;
        max-width: 610px;
        Margin: 0 auto;
        background-color: #e1e1e1;
        border-radius: 6px;
        margin-top: 25px;
    }
    /*--- Start Two Column Sections --*/
    .two-column {
        text-align: center;
        font-size: 0;
        padding: 5px 0 10px 0;
    }
    .two-column .section {
        width: 100%;
        max-width: 300px;
        display: inline-block;
        vertical-align: top;
    }
    .two-column .content {
        font-size: 16px;
        line-height: 20px;
        text-align: justify;
    }
    .content {
        width: 100%;
        padding-top: 20px;
    }
    .center {
        display: table;
        Margin: 0 auto;
    }
    img {
        border: 0;
    }
    img.logo {
        /*float: left;*/
        /*Margin-left: 5%;*/
        max-width: 100px!important;
    }
    #callout {
        float: right;
        Margin: 4% 5% 2% 0;
        height: auto;
        overflow: hidden;
    }
    #callout img {
        max-width: 20px;
    }
    .social {
        list-style-type: none;
        Margin-top: 1%;
        padding: 0;
    }
    .social li {
        display: inline-block;
    }
    .social li img {
        max-width: 15px;
        Margin-bottom: 0;
        padding-bottom: 0;
    }
    /*--- Start Outer Table Banner Image, Text & Button --*/
    .image img {
        width: 100%;
        max-width: 670px;
        height: auto;
    }
    .main-table {
        width: 100%;
        max-width: 610px;
        margin: 0 auto;
        background-color: #FFF;
        border-radius: 6px;
    }
    .one-column .inner-td {
        font-size: 16px;
        line-height: 20px;
        text-align: justify;
    }
    .inner-td {
        padding: 10px;
    }
    .h2 {
        text-align: center;
        font-size: 23px;
        font-weight: 600;
        line-height: 45px;
        Margin: 12px;
        color: #4A4A4A;
    }
    p.center {
        text-align: center;
        max-width: 580px;
        line-height: 24px;
    }
    .button-holder-center {
        text-align: center;
        Margin: 5% 2% 3% 0;
    }
    .button-holder {
        float: right;
        Margin: 5% 0 3% 0;
    }
    .btn {
        font-size: 15px;
        font-weight: 600;
        background: #81BAC6;
        color: #FFF;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 28px;
    }
    /*--- Start Two Column Image & Text Sections --*/
    .two-column img {
        width: 100%;
        max-width: 280px;
        height: auto;
    }
    .two-column .text {
        padding: 10px 0;
    }
    /*--- Start 3 Column Image & Text Section --*/
    .outer-table-2 {
        width: 100%;
        max-width: 670px;
        margin: 22px auto;
        background-color: #22436c;
        border-bottom: 3px solid #81B9C3;
        border-top: 3px solid #81B9C3;
    }
    .three-column {
        text-align: center;
        font-size: 0;
        padding: 10px 0 30px 0;
    }
    .three-column .section {
        width: 100%;
        max-width: 200px;
        display: inline-block;
        vertical-align: top;
    }
    .three-column .content {
        font-size: 16px;
        line-height: 20px;
    }
    .three-column img {
        width: 100%;
        max-width: 125px;
        height: auto;
    }
    .outer-table-2 p {
        margin-top: 6px;
        color: #ffffff;
        font-size: 18px;
        font-weight: 500;
        line-height: 23px;
    }

    /*--- Start Two Column Article Section --*/
    .outer-table-3 {
        width: 100%;
        max-width: 670px;
        margin: 22px auto;
        background-color: #C2C1C1;
        border-top: 3px solid #81B9C3;
    }
    .h3 {
        text-align: center;
        font-size: 21px;
        font-weight: 600;
        Margin-bottom: 8px;
        color: #4A4A4A;
    }
    /*--- Start Bottom One Column Section --*/
    .inner-bottom {
        padding: 22px;
    }
    .h1 {
        text-align: center!important;
        font-size: 25px!important;
        font-weight: 600;
        line-height: 45px;
        Margin: 12px 0 20px 0;
        color: #4A4A4A;
    }
    .inner-bottom p {
        font-size: 16px;
        line-height: 24px;
        text-align: justify;
    }
    /*--- Start Footer Section --*/
    .footer {
        width: 100%;
        background-color: #22436c;
        Margin: 0 auto;
        color: #FFF;
    }
    .footer  img {
        max-width: 135px;
        Margin: 0 auto;
        display: block;
        padding: 4% 0 1% 0;
    }
    p.footer {
        text-align: center;
        color: #FFF!important;
        line-height: 30px;
        padding-bottom: 1%;
        text-transform: uppercase;
    }
    /*--- Media Queries --*/
    @media screen and (max-width: 400px) {
        .h1 {
            font-size: 22px;
        }
        .two-column .column, .three-column .column {
            max-width: 100%!important;
        }
        .two-column img {
            width: 100%!important;
        }
        .three-column img {
            max-width: 60%!important;
        }
    }
    @media screen and (min-width: 401px) and (max-width: 400px) {

        .two-column .column {
            max-width: 50%!important;
        }
        .three-column .column {
            max-width: 33%!important;
        }
    }
    @media screen and (max-width:768px) {
        img.logo {
            float:none !important;
            margin-left:0% !important;
            max-width: 200px!important;
        }

        #callout {
            float:none !important;
            margin: 0% 0% 0% 0;
            height: auto;
            text-align:center;
            overflow: hidden;
        }
        #callout img {
            max-width:26px !important; 
        }
        .two-column .section {
            width: 100% !important;
            max-width: 100% !important;
            display: inline-block;
            vertical-align: top;
        }

        .two-column img {
            width: 100% !important;
            height: auto !important;
        }
        img.img-responsive {
            width:100% !important;
            height:auto !important;
            max-width:100% !important;
        }
        .content {
            width: 100%;
            padding-top:0px !important;
        }
        
    }
    .data {
            width: 70%;
            margin: auto;
            padding-top:0px !important;
        }
</style>
 </head>
<body>
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="wrapper">
        <div class="wrapper-inner">
            <table class="outer-table">
                <tr>
                    <td class="header">
                        <p><a href="index.html#"><img src="https://ketikaku.com/assets_backend/images/Logo_Putih.png" alt="icon" border="0" class="logo">{{-- BRILLIANT ENGLISH COURSE --}}</a></p>
                    </td>
                </tr> <!--- End Header -->
            </table> <!--- End Outer Table -->
            <br>
            <table class="main-table">
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="inner-td">
                                     <p class="h2">KETIKAKU</p>
                                     <p class="center">Hei {{ $username }}, A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
                                    <p class="button-holder-center">
                                        <a class="btn" href="{{ route('forgot_password_page_reset_password',['token'=>$token,'id'=>$code]) }}">Reset</a>
                                    </p>
                                    <p>If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at admin@ketiaku.com</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> <!--- End Heading, Paragraph & Button Section -->
                
            </table> <!--- End Main Table -->
            {{-- <table class="outer-table-2">
                <tr>
                    <td class="text">
                        <p class="center note">Pendaftaran online ke lembaga Brilliant  tidak dipungut biaya alias Gratis.  Tidak ada perbedaan biaya antara kamu mendaftar secara online atau mendaftar dengan datang langsung ke kampung inggris.</p>
                    </td>
                </tr> <!-End Three Column Section ->
            </table> --}} <!-- End Outer Table 2 -->
      
            <table class="outer-table-3">
                <tr>
                    <td class="one-column">
                        <table width="100%">
                            <tr>
                                <td class="footer">
                                    <p class="footer">&copy; KETIKAKU. All right reserved.<br><br></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> <!--- End Main Table -->
        </div> <!--- End Wrapper Inner -->
    </div> <!--- End Wrapper -->
    <br>
</body>
</html>