<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
        @page {
            margin-top: 6mm;
            /*margin-bottom: -2mm;*/
            /*margin: 0px 0px 0px 0px !important;*/
            /*padding: 0px 0px 0px 0px !important;*/
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            margin-left: 5mm;
            margin-right: 3mm;
            float: left;
            width: 99mm;
            padding: 0px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            /*margin: 0px;*/
            height: 41.3mm;
            max-height: 41.3mm;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);*/
            padding: 1px;
            text-align: center;
        }
        th {
            width: 100%;
        }

        .right {
            float: right;
            margin-left: 50px;
        }
        .left {
            float: right;
            margin-right: 50px;
        }
        .centre {
            margin-right: 0px;
            margin-left: 0px;
        }
        table {
            border-spacing: 0px;
            padding: 0px;
            /*border-collapse: collapse;*/
        }

        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<div>
@for($row = 1; $row < 8; $row++)
    <div class="row">
        <div class="column">
            <div class="card">
                <b>
                    {{$post->title}}
                </b>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ url($qr_file) }}" class="left" style="max-width: 60%;">
                        </td>
                        <td class="centre">
                            {{$post->subtitle}}
                            @isset($alcoholField)
                                <br>
                                <i>
                                    {{$alcoholField->label}}: {{$post->post->fieldValue($alcoholField->id)}} %
                                </i>
                            @endisset
                            <br>
                            <br>
                            {{url('/')}}
                        </td>
                        <td>
                            <img src="{{ url('images/logo.jpg') }}" class="right" style="max-width: 40%">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <b>
                    {{$post->title}}
                </b>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ url($qr_file) }}" class="left" style="max-width: 60%;">
                        </td>
                        <td class="centre">
                            {{$post->subtitle}}
                            @isset($alcoholField)
                                <br>
                                <i>
                                    {{$alcoholField->label}}: {{$post->post->fieldValue($alcoholField->id)}} %
                                </i>
                            @endisset
                            <br>
                            <br>
                            {{url('/')}}
                        </td>
                        <td>
                            <img src="{{ url('images/logo.jpg') }}" class="right" style="max-width: 40%">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endfor
</div>


</html>
