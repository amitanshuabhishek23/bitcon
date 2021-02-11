<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"/>
    <title>Welcome to {{ env('APP_NAME','') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <style>
        
        @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,100%,700&display=swap");

        @media only screen and (max-width: 600px) {
            td[class=head-title] {
                font-size: 24px !important;
                padding-bottom: 10px !important;
                line-height: 32px !important;
            }

            div[class=mb_View] {
                width: 96% !important;
                padding-left: 2%;
                padding-right: 2%;
            }
        }

        @media only screen and (max-width: 480px) {
            td[class=head-title] {
                font-size: 18px !important;
            }

            img[class=logo_img] {
                width: 200px !important;
            }
        }
    </style>
</head>
<body style="margin:0; padding:0; font-family: 'Montserrat', sans-serif !important; color:#333;" bgcolor="#fff">
<table align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 21px; margin-bottom: 20px;">
    <tr>
        <td>
            <div class="mb_View" style="background-color: #f4f4f4 !important; min-width:500px; margin: 0 auto;">
                <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="logo_block" bgcolor="#f4f4f4"
                                        style="padding-top:10px; padding-bottom:15px; text-align: center; background-color: #1A202E;">
                                        <a href="{{ URL::to('/') }}"
                                           target="_blank" target="_blank"
                                           style="font-size:22px;color:#fff;text-decoration:none;">
                                           <img style="margin-top: 12px;" src="{{ URL::to('/public/app/images/icons/logo-white.png') }}" alt="Hubifyapps" class="dark_themes_logo img-fluid">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" align="center" bgcolor="#f4f4f4">
                                <tr>
                                    <td style="padding-left:20px; padding-right:20px; padding-top:20px; padding-bottom:5px; border-radius: 5px 5px 0 0;"
                                        bgcolor="#f4f4f4">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                                           align="center">
                                                        <tbody>

                                                        @yield('content')

                                                        <tr>
                                                            <td style="padding-top:0; padding-bottom:0; font-family: 'Montserrat', sans-serif !important;
                                                            color:#000000; font-size:14px; line-height:24px; font-weight: 600;">
                                                                Thanks & Regards,
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:0; padding-bottom:0; font-family: 'Montserrat', sans-serif !important;
                                                            color:#000000; font-size:14px; line-height:24px;">
                                                                {{ env('APP_NAME','') }}
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:10px; padding-bottom:10px;">
                                        <div class="cstm-seprator"
                                             style="margin: 5px 0; border-bottom: 1px solid #E7E7E7;"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#232B3E"
                            style="padding-left:11px; padding-right:10px; padding-top:15px; padding-bottom:15px; border-radius: 0 0 5px 5px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="text-align:center; font-size:13px; font-family: 'Montserrat', sans-serif !important; color:#fff;
                                    line-height:23px; font-weight: 500;">
                                        Copyright @ {{ env('APP_NAME','') }} , All rights reserved
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
    </tr>
    </td>
</table>
</body>
</html>


