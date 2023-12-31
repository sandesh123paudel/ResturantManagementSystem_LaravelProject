<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #e4e1e1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .message {
            border-left: 4px solid #3498db;
            padding-left: 10px;
            margin-bottom: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #996521;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://i.ibb.co/brXm8xW/logo.png" alt="logo" border="0">
        </div>

        <h1>New Message from a Customer</h1>

        <div class="message">
            <p><strong>Customer Name: {{$data['name']}}</strong></p>
            <p><strong>Email: {{$data['email']}}</strong></p>
            <p><strong>Phone: {{$data['phone']}}</strong></p>
            <p><strong>Contact Message</strong></p>
            <p>{{$data['message']}}</p>
        </div>

        <p>Please respond to the customer as soon as possible.</p>

        <p>Best regards,<br>Silver Point Restaurant Team</p>

        <p>
            <a href="http://127.0.0.1:8000/" class="button btn-secondary">Go to Vendor Portal</a>
        </p>
    </div>
</body>
</html>
