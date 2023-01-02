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
        <div class="row" dir="rtl">
            <div class="col-2">
                <input class="form-control" type="text" id="numberRow">
            </div>
            <div class="col-3">
                <button id="btnAddRow" class="btn btn-warning" type="button">Add to Row</button>
            </div>
            <div class="col-3">
                <a href="{{route('list-hour')}}" class="btn btn-warning">list hour</a>
            </div>
            <div class="col-2">
                <a href="{{route('setting-index')}}" class="btn btn-warning">Setting</a>
            </div>
        </div>
        <form action="{{route('setting')}}" method="post" name="myform" id="myform">
            @csrf
            <div class="row mt-5">
                <div class="col-3 form-group">
                    <label for="salary_hour">Salary Hour</label>
                    <input type="text" class="form-control" id="salary_hour" name="salary_hour" value="{{$data->salary_hour}}" require>
                </div>
                <div class="col-3 form-group">
                    <label for="unit">Unit</label>
                    <select class="form-control" name="unit" id="unit" require>
                        <option value="rial"{{$data->unit == 'rial'?'selected':''}}>ریال</option>
                        <option value="toman" {{$data->unit=='toman' ? 'selected' : ''}}>تومان</option>
                    </select>
                </div>
            </div>

            <input type="submit" class="btn btn-primary mt-3" value="save" />
        </form>
    </div>
</body>

</html>