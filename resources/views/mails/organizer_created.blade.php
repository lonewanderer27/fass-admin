@props([
    'name' => 'Adamson Computer Science Society',
    'link' => 'http://localhost/events/create',
    'support_email' => 'support@fass.com'
])

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .email-box {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }
        .email-box h1 {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 16px;
        }
        .email-box p {
            color: #555555;
            line-height: 1.6;
            margin-bottom: 16px;
        }
        .email-box .button {
            display: inline-block;
            width: 91%;
            background-color: #2563eb;
            color: #ffffff;
            text-align: center;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .email-box .button:hover {
            background-color: #1e40af;
        }
        .email-box .footer {
            font-size: 12px;
            color: #777777;
        }
        .email-box .footer a {
            color: #2563eb;
            text-decoration: none;
        }
        .email-box .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-box">
        <h1>🎉 Organization Created!</h1>
        <p>
            Your organization, <strong>{{ $name }}</strong>, has been successfully created. You can now start creating and managing events.
        </p>
        <a href="{{ $link }}" class="button">Create Events Now</a>
        <div class="footer">
            <p>This is an auto-generated email. Please do not reply to this email.</p>
            <p>
                For further concerns, contact us at:
                <a href="mailto:{{ $support_email }}">{{ $support_email }}</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
