@extends('email_template.layout.email_layout')

@section('content')
    <tr>
        <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important;
        color:#000000; font-size:15px; line-height:24px; font-weight: 600; text-transform: capitalize;">
            Hello Admin,
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" style="border-collapse:collapse; font-size:13px; text-align:left; background-color: #ffffff; margin-top:15px; margin-bottom:15px">
                <tbody>
                    <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> Name </td><td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['user_name'])?(ucwords($data['user_detail']['user_name'])):'NA';?></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> Email </td>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['user_email'])?(ucwords($data['user_detail']['user_email'])):'NA';?></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> Subject </td>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['user_subject'])?(ucwords($data['user_detail']['user_subject'])):'NA';?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> Message </td>
                        <td style="border:1px solid #ededed;text-align:left;padding:10px"> <?php echo isset($data['user_detail']['user_message'])?(ucwords($data['user_detail']['user_message'])):'NA';?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
