<!DOCTYPE html>
<html>
<head>
    <title>Student Management System - Password Reset</title>
</head>
<body style="font-family: 'Inter', Arial, sans-serif; background-color: #fcfcfc; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
        <!-- Header with logo -->
        <!-- <div style="padding: 20px; text-align: center; border-bottom: 1px solid #f0f0f0;"> -->
            
        <!-- </div> -->
        
        <!-- Red accent bar -->
        <div style="height: 6px; background-color: #ca2125;"></div>
        
        <!-- Email content -->
        <div style="padding: 25px;">
            <h2 style="font-family: 'IBM Plex Sans', sans-serif; color: #000000; font-size: 20px; margin-top: 0;">Hello, {{ $name }}</h2>
            
            <p style="color: #777777; line-height: 1.5; margin-bottom: 20px;">Your Student Management System account password has been successfully reset. Here are your new login credentials:</p>
            
            <div style="background-color: #fcfcfc; border-left: 4px solid #ef6a57; padding: 15px; margin-bottom: 25px;">
                <p style="margin: 0 0 10px 0;"><strong style="color: #000000;">Email:</strong> <span style="color: #ca2125;">{{ $email }}</span></p>
                <p style="margin: 0;"><strong style="color: #000000;">New Password:</strong> <span style="color: #ca2125;">{{ $password }}</span></p>
            </div>
            
            <a href="" style="display: inline-block; background-color: #ca2125; color: #ffffff; text-decoration: none; padding: 12px 30px; border-radius: 4px; font-weight: 500; margin-bottom: 15px;">Login to Your Account</a>
            
        </div>
        
        <!-- Footer -->
        <div style="background-color: #f8f8f8; padding: 15px; text-align: center; border-top: 1px solid #f0f0f0; color: #777777; font-size: 12px;">
            <p style="margin: 4px 0;">| Built by Team 818 |
            <a href="mailto:jlathigara903@rku.ac.in, nvekariya347@rku.ac.in, vbhesaniya809@rku.ac.in">Contact Us</a></p>
            <p style="margin: 0 0 5px 0;">If you didn't request this password reset, please contact Admin immediately.</p>
        </div>
    </div>
</body>
</html>