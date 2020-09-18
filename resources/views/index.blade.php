<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Index Interview Challenge</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .thumbnail {
            margin-bottom: 10px;
            padding: 5px;
        }

        .meme-name {
            height: 50px;
            text-overflow: ellipsis;
        }

        .pagination {
            text-align: center;
        }

        .block {
            display: block;
            width: 100%;
            border: none;
            background-color: #4CAF50;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            color: #fff !important;
            margin: 10px 0px;
        }

        @media (max-width: 380px) {
            .meme-frame {
                height: 100px;
            }

            .meme-img {
                object-fit: contain;
                height: 90px !important;
                width: 90px !important;
            }
        }

        @media (min-width: 381px) {
            .meme-frame {
                height: 125px;
            }

            .meme-img {
                object-fit: contain;
                height: 115px !important;
                width: 115px !important;
            }
        }


        @media (min-width: 767px) {
            .meme-frame {
                height: 175px;
            }

            .meme-img {
                object-fit: contain;
                height: 165px !important;
                width: 165px !important;
            }
        }

        @media (min-width: 992px) {
            .meme-frame {
                height: 200px;
            }

            .meme-img {
                object-fit: contain;
                height: 190px !important;
                width: 190px !important;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <a type="button" class="block" href="{{route('create')}}">Create</a>
    <div class="well">
        <div class="row">
            @foreach ($memes as $meme)
            <div class="col-xs-6 col-sm-4">
                <div class="thumbnail meme-frame" style="display:flex">
                    <img class="meme-img center-block" style="align-self: center" src="{{$meme->url}}">
                </div>
                <div class="meme-name">
                    <h6 class="text-center">{{$meme->name}}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="text-center">
        {{ $memes->render() }}
    </div>
</body>
</html>