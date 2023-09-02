<!DOCTYPE html>
<html>
<head>
    <title>Devi Eye Clinic & Opticians</title>
    <style>
        table{
            border: 1px solid #e6e6e6;
            font-size: 12px;
        }
        thead{
            border-bottom: 1px solid #e6e6e6;
        }
        table thead th, table tbody td{
            padding: 5px;
        }
        .bordered td, .bordered th, .bordered tr{
            border: 1px solid #e6e6e6;
        }
        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }
        .col{
            width: 50%;
            float: left;
        }
    </style>
</head>
<body>
    {{ $patient->patient_name}}
    <button onclick="window.print()">Print</button>
</body>
</html>