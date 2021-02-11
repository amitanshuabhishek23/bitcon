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
                    <td style=" font-size:13px; padding-top:10px;color:#000000; line-height:24px; padding-bottom:10px; padding-left: 10px; padding-right: 10px;" class="para1">App Information</td>
                </tr>
                  <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> shop </td><td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['shop'])?(ucwords($data['user_detail']['shop'])):'NA';?></td>
                  </tr>
                    <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> email </td><td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['email'])?(ucwords($data['user_detail']['email'])):'NA';?></td>
                  </tr>
         
            </table>
        </td>
        
    </tr>
@endsection
