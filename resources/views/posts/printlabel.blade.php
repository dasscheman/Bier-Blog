
@extends("layouts.app",['title'=>$title ?? ''])

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

            * {
                box-sizing: border-box;
            }

            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0px;
            }

            /* Float four columns side by side */
            .column {
                float: left;
                width: 105mm;
                padding: 0 0px;
                max-height: 42.3mm;
            }

            /* Remove extra left and right margins, due to padding */
            .row {
                margin: 0 0px;
                max-height: 42.3mm;
                height: 42.3mm;
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
                    width: 30%;
                    display: block;
                    margin-bottom: 20px;
                }
            }

            /* Style the counter cards */
            .card {
                padding: 1px;
                text-align: center;
                background-color: #f1f1f1;
            }
        </style>
        @for($row = 1; $row < 8 ; $row++ )
            <div class="row">
                <div class="column">
                    <div class="card-group">
                        <div class="card" style="border: none; max-width: 25%">
                            <div class="card-img">
                                <img style="max-width: 85%;" src="/images/logo.jpg" alt="">
                            </div>
                            @isset($alcoholField)
                                {{$alcoholField->label}}: {{$post->fieldValue($alcoholField->id)}} %
                            @endisset
                        </div>
                        <div class="card"  style="border: none; width: 15%">
                            <h3>{{$post->title}}</h3>
                            <p>{{$post->subtitle}}</p>

                            @isset($startSgField)
                                {{$startSgField->label}}: {{$post->post->fieldValue($startSgField->id)}}
                            @endisset
                            @isset($eindSgField)
                                {{$eindSgField->label}}: {{$post->fieldValue($eindSgField->id)}}
                            @endisset
                        </div>
                        <div class="card" style="border: none; max-width: 25%">
                            <div class="card-img">
                                @php echo QrCode::size(95)->generate($post->url('nl')) @endphp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card-group">
                        <div class="card" style="border: none; max-width: 25%">
                            <div class="card-img">
                                <img style="max-width: 85%;" src="/images/logo.jpg" alt="">
                            </div>
                            @isset($alcoholField)
                                {{$alcoholField->label}}: {{$post->fieldValue($alcoholField->id)}} %
                            @endisset
                        </div>
                        <div class="card"  style="border: none; width: 15%">
                            <h3>{{$post->title}}</h3>
                            <p>{{$post->subtitle}}</p>

                            @isset($startSgField)
                                {{$startSgField->label}}: {{$post->post->fieldValue($startSgField->id)}}
                            @endisset
                            @isset($eindSgField)
                                {{$eindSgField->label}}: {{$post->fieldValue($eindSgField->id)}}
                            @endisset
                        </div>
                        <div class="card" style="border: none; max-width: 25%">
                            <div class="card-img">
                                @php echo QrCode::size(95)->generate($post->url('nl')) @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </body>
</html>
