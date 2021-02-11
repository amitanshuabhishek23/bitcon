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
                    <td style=" font-size:13px; padding-top:10px;color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">Do you want to leave us? Please give us a chance to communicate and make things better for you.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">We just noticed that you've uninstalled our <?php echo isset($data['user_detail']['app_name'])?(ucwords($data['user_detail']['app_name'])):'NA';?> App from your store <?php echo isset($data['user_detail']['shop'])?(ucwords($data['user_detail']['shop'])):'NA';?></td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">We want to know your requirements that we could not provide you and feedback on our App so it would be helpful for us to work on and assist you accordingly.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">Please give us a chance and feel free to reach our support team OR you can directly reply in this email also, we will help you with any queries like App installation, theme integration, customization, and troubleshooting any issues.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">Your feedback will help us in improving our services.</td>
                </tr>
            </table>
        </td>
        
    </tr>
@endsection
