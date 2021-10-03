<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
        @page {

            margin-top: 5mm;
            margin-bottom: 0mm;
            /*margin: 0px 0px 0px 0px !important;*/
            /*padding: 0px 0px 0px 0px !important;*/
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 105mm;
            padding: 0px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0px;
            height: 42.3mm;
            max-height: 42.3mm;
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
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
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
@for($row = 1; $row < 7; $row++)
    <div class="row">
        <div class="column">
            <div class="card">
                <table>
                    <tr>
                        <th></th>
                        <th>
                            <h2>
                                {{$post->title}}
                            </h2>
                        </th>
                        <th>

                        </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ url($qr_file) }}" class="left" style="max-width: 25%;">
                        </td>
                        <td class="centre">
                            {{$post->subtitle}}
                            <i style="font-size: 10px">
                                @isset($startSgField)
                                    {{$startSgField->label}}: {{$post->post->fieldValue($startSgField->id)}}
                                @endisset
                                @isset($eindSgField)
                                    {{$eindSgField->label}}: {{$post->post->fieldValue($eindSgField->id)}}
                                @endisset
                            </i>
                        </td>
                        <td>
                            <img src="{{ url('images/logo.jpg') }}" class="right" style="max-width: 25%">
                            @isset($alcoholField)
                                <i>
                                    {{$alcoholField->label}}: {{$post->post->fieldValue($alcoholField->id)}} %
                                </i>
                            @endisset
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <table>
                    <tr>
                        <th></th>
                        <th>
                            <h2>
                                {{$post->title}}
                            </h2>
                        </th>
                        <th>

                        </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ url($qr_file) }}" class="left" style="max-width: 25%;">
                        </td>
                        <td class="centre">
                            {{$post->subtitle}}
                            <i style="font-size: 10px">
                                @isset($startSgField)
                                    {{$startSgField->label}}: {{$post->post->fieldValue($startSgField->id)}}
                                @endisset
                                @isset($eindSgField)
                                    {{$eindSgField->label}}: {{$post->post->fieldValue($eindSgField->id)}}
                                @endisset
                            </i>
                        </td>
                        <td>
                            <img src="{{ url('images/logo.jpg') }}" class="right" style="max-width: 25%">
                            @isset($alcoholField)
                                <i>
                                    {{$alcoholField->label}}: {{$post->post->fieldValue($alcoholField->id)}} %
                                </i>
                            @endisset
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endfor
</div>


</html>
