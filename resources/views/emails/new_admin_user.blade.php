<!DOCTYPE html>
<html>

<head>
    <title>Student Management System - New Admin Account</title>
    <meta charset="UTF-8">
</head>

<body style="margin: 0; padding: 0; background-color: #fcfcfc; font-family: Inter, sans-serif; font-size: 15px; line-height: 1.5;">

    <div style="max-width: 600px; margin: 32px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid #f0f0f0; overflow: hidden;">

        <!-- Header -->
        <div style="background-color: #ffffff; padding: 16px 24px; border-bottom: 1px solid #f0f0f0;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="background-color: #ca2125; color: #ffffff; padding: 8px 16px; border-radius: 6px; font-size: 14px; font-weight: 500;">
                    Student Management System
                </div>
            </div>
        </div>

        <!-- Red accent bar -->
        <div style="height: 8px; background-color: #ca2125;"></div>

        <!-- Content -->
        <div style="padding: 24px;">

            <h2 style="font-size: 20px; font-weight: 600; color: #000000; margin-bottom: 16px; font-family: 'IBM Plex Sans', sans-serif;">
                Hello {{ $name }},
            </h2>

            <p style="color: #777777; margin-bottom: 16px;">
                Your  Student Management System account has been successfully created. Here are your login details:
            </p>

            <div style="background-color: #fcfcfc; border-left: 4px solid #ef6a57; padding: 16px; margin-bottom: 24px; border-radius: 4px;">
                <p style="margin-bottom: 8px;"><strong style="color: #000000;">Email:</strong> <span style="color: #ca2125;">{{ $email }}</span></p>
                <p><strong style="color: #000000;">Temporary Password:</strong> <span style="color: #ca2125;">{{ $defaultPassword }}</span></p>
            </div>

            <div style="background-color: #fcfcfc; border: 1px solid #f0f0f0; padding: 16px; margin-bottom: 24px; border-radius: 4px;">
                <h3 style="font-size: 16px; font-weight: 600; color: #000000; margin-bottom: 8px;">Important:</h3>
                <p style="color: #777777;">For security reasons, please change your password immediately after first login.</p>
            </div>

            <div style="text-align: center;">
                <a href="#" style="display: inline-block; background-color: #ca2125; color: #ffffff; font-weight: 500; padding: 12px 32px; border-radius: 6px; text-decoration: none; font-size: 15px; margin-bottom: 12px;">
                    Access Student Management System
                </a>
                <p style="font-size: 12px; color: #777777;">This link will expire in 72 hours</p>
            </div>

        </div>

        <!-- Footer -->
        <div style="background-color: #f8f8f8; border-top: 1px solid #f0f0f0; padding: 16px 24px; text-align: center; font-size: 13px; color: #777777;">
            <p style="margin: 4px 0;">| Built by Team 818 |
            <a href="mailto:jlathigara903@rku.ac.in, nvekariya347@rku.ac.in, vbhesaniya809@rku.ac.in" >Contact Us</a></p>
            <p style="margin: 4px 0; font-size: 12px;">
                If you didn't request this account, please contact admin
            </p>
        </div>

    </div>
</body>

</html>