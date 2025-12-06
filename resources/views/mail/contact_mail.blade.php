<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Enquiry Notification</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: 30px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #eaeaea;
        }
        .header h2 {
            margin: 0;
            font-size: 22px;
            color: #1e3a8a;
        }
        .tag {
            display: inline-block;
            background: #1e3a8a;
            color: #fff;
            padding: 6px 14px;
            font-size: 12px;
            border-radius: 20px;
            margin-top: 8px;
        }
        .content {
            margin-top: 25px;
        }
        .row {
            margin-bottom: 15px;
        }
        .label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }
        .value {
            font-size: 15px;
            margin-top: 3px;
            color: #222;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #eaeaea;
            padding-top: 12px;
        }
        .property-box {
            background: #eef4ff;
            padding: 12px 15px;
            border-left: 4px solid #1e3a8a;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>New Enquiry Received</h2>
        <span class="tag">Vedata Realty</span>
    </div>

    <div class="content">

        {{-- NAME --}}
        <div class="row">
            <div class="label">Full Name</div>
            <div class="value">{{ $enquiry->name }}</div>
        </div>

        {{-- EMAIL --}}
        <div class="row">
            <div class="label">Email</div>
            <div class="value">{{ $enquiry->email }}</div>
        </div>

        {{-- PHONE --}}
        @if($enquiry->phone)
            <div class="row">
                <div class="label">Phone</div>
                <div class="value">{{ $enquiry->phone }}</div>
            </div>
        @endif

        {{-- SUBJECT --}}
        @if($enquiry->subject)
            <div class="row">
                <div class="label">Subject</div>
                <div class="value">{{ $enquiry->subject }}</div>
            </div>
        @endif

        {{-- PROPERTY --}}
        @if($enquiry->property_id)
            <div class="property-box">
                <strong>Property Enquiry</strong><br>
                Property ID: {{ $enquiry->property_id }}<br>
                User enquired about a specific property listing.
            </div>
        @endif

        {{-- MESSAGE --}}
        @if($enquiry->message)
            <div class="row">
                <div class="label">Message</div>
                <div class="value">{{ $enquiry->message }}</div>
            </div>
        @endif

    </div>

    <div class="footer">
        This email was generated automatically by Vedata Realty enquiry system.<br>
        Please respond to customer as soon as possible.
    </div>
</div>

</body>
</html>
