<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry</title>
</head>

<body style="margin:0; padding:0; background-color:#f2f2f2; font-family:Arial, Helvetica, sans-serif; color:#333333;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
           style="background-color:#f2f2f2; padding:35px 12px;">
        <tr>
            <td align="center">

                <!-- Email Container -->
                <table role="presentation" width="520" cellpadding="0" cellspacing="0" border="0"
                       style="width:100%; max-width:420px; background-color:#f4f4f4;">

                    <!-- Orange Header -->
                    <tr>
                        <td height="90" align="center" valign="middle"
                            style="height:90px; background-color:#FFA536; border-radius:22px 22px 0 0;">

                            <div style="font-size:25px; font-weight:bold; color:#ffffff; letter-spacing:1px;">
                                Contact Us
                            </div>

                            <p style="margin:7px 0 0; font-size:12px; color:#ffffff;">
                                New Website Enquiry
                            </p>

                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td style="padding:0 28px 25px; background-color:#f4f4f4;">

                            <!-- White Card -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                   style="background-color:#ffffff;">

                                <!-- Card Title -->
                                <tr>
                                    <td align="center" style="padding:22px 15px 8px;">
                                        <h1 style="margin:0; font-size:23px; line-height:30px; font-weight:500; letter-spacing:1px; color:#222222;">
                                            New Enquiry!
                                        </h1>

                                        <p style="margin:8px 0 0; font-size:11px; line-height:18px; color:#666666;">
                                            You have received a new message through your website contact form.
                                        </p>
                                    </td>
                                </tr>

                                <!-- Orange Divider -->
                                <tr>
                                    <td style="padding:12px 18px 8px;">
                                        <div style="height:2px; background-color:#FFA536; font-size:0; line-height:0;">
                                            &nbsp;
                                        </div>
                                    </td>
                                </tr>

                                <!-- Form Details -->
                                <tr>
                                    <td style="padding:8px 18px 20px;">

                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">

                                            <!-- Name -->
                                            <tr>
                                                <td width="35%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; font-weight:bold; color:#444444;">
                                                    Name
                                                </td>
                                                <td width="65%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; line-height:18px; color:#555555; word-break:break-word;">
                                                    {{ $contactMessage->h_name }}
                                                </td>
                                            </tr>

                                            <!-- Email -->
                                            <tr>
                                                <td width="35%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; font-weight:bold; color:#444444;">
                                                    Email
                                                </td>
                                                <td width="65%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; line-height:18px; word-break:break-word;">
                                                    <a href="mailto:{{ $contactMessage->h_email }}"
                                                       style="color:#E99527; text-decoration:none;">
                                                        {{ $contactMessage->h_email }}
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Phone -->
                                            <tr>
                                                <td width="35%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; font-weight:bold; color:#444444;">
                                                    Phone
                                                </td>
                                                <td width="65%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; line-height:18px; color:#555555; word-break:break-word;">
                                                    {{ $contactMessage->h_phone }}
                                                </td>
                                            </tr>

                                            <!-- Subject -->
                                            <tr>
                                                <td width="35%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; font-weight:bold; color:#444444;">
                                                    Subject
                                                </td>
                                                <td width="65%" valign="top"
                                                    style="padding:11px 5px; border-bottom:1px solid #eeeeee; font-size:12px; line-height:18px; color:#555555; word-break:break-word;">
                                                    {{ $contactMessage->h_subject }}
                                                </td>
                                            </tr>

                                            <!-- Message -->
                                            <tr>
                                                <td colspan="2" style="padding:16px 5px 8px;">
                                                    <div style="font-size:12px; font-weight:bold; color:#444444;">
                                                        Your Message
                                                    </div>

                                                    <div style="margin-top:10px; padding:13px; background-color:#fff8ed; border-left:3px solid #FFA536; font-size:12px; line-height:21px; color:#555555; white-space:pre-line; word-break:break-word;">
                                                        {{ $contactMessage->form_message }}
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </td>
                                </tr>
                            </table>
                            <!-- End White Card -->

                            <!-- Support Section -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                                   style="margin-top:12px; background-color:#ffedcf;">
                                <tr>
                                    <td align="center" style="padding:15px 12px;">
                                        <p style="margin:0; font-size:12px; font-weight:bold; color:#444444;">
                                            Need more information?
                                        </p>

                                        <p style="margin:5px 0 0; font-size:11px; color:#D88920;">
                                            Reply directly to this email to contact the sender.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Footer -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center" style="padding:20px 5px 5px;">
                                        <p style="margin:0; font-size:10px; line-height:17px; color:#777777;">
                                            This email was generated automatically from your website contact form.
                                        </p>

                                        <p style="margin:10px 0 0; font-size:10px; color:#999999;">
                                            Thank you.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Bottom Rounded Corners -->
                    <tr>
                        <td height="12" style="height:12px; background-color:#f4f4f4; border-radius:0 0 22px 22px;">
                            &nbsp;
                        </td>
                    </tr>

                </table>
                <!-- End Email Container -->

            </td>
        </tr>
    </table>

</body>
</html>
