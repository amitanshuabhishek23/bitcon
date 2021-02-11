@extends('email_template.layout.email_layout')

@section('content')
    <tr>
        <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important;
        color:#000000; font-size:15px; line-height:24px; font-weight: 600; text-transform: capitalize;">
            Hello <?php echo isset($data['user_detail']['name'])?(ucwords($data['user_detail']['name'])):' User';?>,
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" style="font-family: 'Montserrat', sans-serif !important; background-color: #ffffff; margin-bottom: 15px;">
                <tr>
                    <td style=" font-size:13px; padding-top:10px;color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">Thank You For Getting In Touch With Us.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1">We have received your inquiry and you are on our priority list. One of our team members will be reaching out to you shortly.</td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-left: 10px; padding-right: 10px; padding-bottom:10px;" class="para1"><b>Your Query: </b><?php echo isset($data['user_detail']['message'])?(ucwords($data['user_detail']['message'])):'NA';?></td>
                </tr>
                <tr>
                    <td style=" font-size:13px; color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">We look forward to speaking with you soon.</td>
                </tr>
            </table>
        </td>
        
    </tr>
@endsection
