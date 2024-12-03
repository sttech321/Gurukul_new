<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
            padding: 50px;
            padding-bottom: 30px;
            border-radius: 20px;
            background-color: #fbfbfb;
            box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
            text-decoration: none;
        }

        h1 {
            font-size: 28px;
            color: #0073e6;
            margin-bottom: 16px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        a {
            color: #fff !important;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            font-size: 14px;
            color: #777777;
            text-align: center;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            background-color: #00b78a !important;
            color: white !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .button:hover {
            background-color: #005bb5;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <h1>You're Invited!</h1>
        <p>Hello1, You have been invited to fill out a form. Click the link below to access the form:</p>
        <p><a href="http://localhost:8080/admin/gurukul_invite" class="button">Fill Out the Form</a></p>
        <p>Thank you!</p>

        <div class="footer">
            <p>If you have any questions, feel free to reach out to us.</p>
        </div>
    </div>

</body>
</html>