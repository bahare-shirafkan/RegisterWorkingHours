<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <img class="profile" src="{{asset('/img/personal-defult.png')}}" alt="">
            </div>
            <div class="col-7">
                <h3 class="mt-3">Bahare Shirafkan</h3>
            </div>
        </div>
            @if ($message=null)) 
            <table class="table-striped" id="table">
                <thead>
                <td class="form-label">date</td>
                <td class="form-label">from time</td>
                <td class="form-label">to time</td>
                <td class="form-label">value hours</td>
            </thead>
            <tbody">
            @foreach ($res as $item)
            <tr id="row">
                <td>{{date('Y-m-d',strtotime($item['date']))}}</td>
                <td>{{$item['from_time']}}</td>
                <td>{{$item['to_time']}}</td>
                <td>{{$item['diff_time']}}</td>
                <td>{{$item['diff_time']*70000}}</td>
                </tr>
                @endforeach
                <tr>
                    <td><h4>sum total :</h4></td>
                    <td><h5>{{number_format($sum)}}</h5></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @else 
            <h5>first must complete setting</h5>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>