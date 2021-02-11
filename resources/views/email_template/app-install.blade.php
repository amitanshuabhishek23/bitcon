@extends('email_template.layout.email_layout')

@section('content')
    <tr>
        <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important;
        color:#000000; font-size:15px; line-height:24px; font-weight: 600; text-transform: capitalize;">
            Hello <?php echo isset($data['user_detail']['name'])?(ucwords($data['user_detail']['name'])):' There';?>,
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" style="font-family: 'Montserrat', sans-serif !important; background-color: #ffffff; margin-bottom: 15px;">
                <tr>
                    <td style=" font-size:13px; padding-top:10px;color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">We Are Happy That You Have Selected <?php echo isset($data['user_detail']['app_name'])?(ucwords($data['user_detail']['app_name'])):'';?> For Your Store.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">Our app is very easy to use and manage, but in case if you need any assistance, please feel free to reach our support team. They will help you with any queries like App installation, theme integration, customization, and troubleshooting any issues.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">Please check the video for installing and integration of the <?php echo isset($data['user_detail']['app_name'])?(ucwords($data['user_detail']['app_name'])):'';?> app if you find difficulties in integration.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">Please let us know your feedback by replying to this <?php echo isset($data['user_detail']['support_email'])?(ucwords($data['user_detail']['support_email'])):'';?> email and we will respond to you asap.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">Hope you enjoy using our app!</td>
                </tr>
            </table>
        </td>
        
    </tr>
@endsection
