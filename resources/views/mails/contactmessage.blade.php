<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #c70017;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .header img {
            height: 50px;
            margin-right: 20px;
        }
        .content {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            padding: 20px;
        }
        h2 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        .total {
            text-align: right;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #c70017;
            color: #fff;
            text-decoration: none;
            border: none;
        }
        .button:hover {
          background-color:#000000;
          border-color:#ffffff;
          color:#ffffff;
          border-style:solid;
          border-width:1px
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contact Message</h1>
        </div>
        <div class="content">
            <div align="center">
                <img src="{{asset("assets/uploads/logos/".$config->logo)}}" alt="Logo">
            </div>

            <p>You have received a contact message, these are the data received:</p>
            <h2>Contact Message:</h2>
            <table>
                <tr>
                    <th>Contact Name:</th>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <th>Subject:</th>
                    <td>{{ $subject }}</td>
                </tr>
                <tr>
                    <th>Message:</th>
                    <td>{{ $contact_message }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
