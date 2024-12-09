<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gurukul Form Submission Confirmation</title>
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

        ul {
            font-size: 16px;
            margin: 10px 0 20px 0;
        }

        ul li {
            margin-bottom: 8px;
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
<?php print_r($data);?>
    <div class="email-container">
        <h1>Thank you for submitting your form <br /> <?php echo $data['name']; ?>!</h1>
        <p>Your form has been successfully submitted.</p>
        <p>Here are some details:</p>
        <ul>
           <!-- <li><strong>Gurukul Id:</strong> <?php //echo $data['principal_id']; ?></li>-->
            <li><strong>Gurukul Name:</strong> <?php echo $data['name']; ?></li>
            <li><strong>Mobile Number:</strong> <?php echo $data['phone']; ?></li>
            <li><strong>Email:</strong> <?php echo $data['email']; ?></li>
            <li><strong>Address:</strong> <?php echo $data['address']; ?></li>
        </ul>
        <p>Thank you!</p>

        <div class="footer">
            <p>If you have any questions, feel free to reach out to us.</p>
        </div>
    </div>

</body>

</html>