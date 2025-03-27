<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table, th, td{
            border: 1px solid black;
        }
        table{
            border-collapse: collapse;
            width: 30%;
            color: black;
            font-family: monospace;
            font-size: 17px;
            text-align: left;
            border: 3px solid black;
            margin: 20px 0;
        }
        table td, table th{
            padding-left: 10px;
            padding-right: 10px;
        }
        table tr:nth-child(odd) td {
            background-color:rgb(192, 191, 191);
        }
        header{
            text-align: center;
            font-size: 1.3rem;
        }
        .container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 10vh;
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: lightgrey;
            border: 5px solid black;
        }
        .vehiclel_container header h1{
            text-align: center;
            margin-bottom: 20px;
        }
        .order_buttons{
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .order_buttons button{
            padding: 15px 30px;
            font-weight: bold;
            font-size: 1.2rem;
            border-radius: 5px;
        }
        .input_area{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid black;
            background-color:lightgray;
        }
        .input_area label{
            font-size: 1.1rem;
        }
        .input_row{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .input_row label, .filter_row select{
            margin: 5px;
        }
        .submit_button{
            padding: 3px 5px;
            font-size: 1.1rem;
            border-radius: 3px;
        }
        .submit_button_container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        }
        .hyperlinks{
            position: absolute;
            bottom: 10px;
            left: 16px;
            display: flex;
            flex-direction: column;
            justify-content: left;
            align-items: left;
        }
        .hyperlinks p{
            height: 2px;
            font-size: 1.1rem;
        }
        </style>
</head>
<body>
    <main>
        <header>
            <h1>Zippy Used Autos</h1>
        </header>