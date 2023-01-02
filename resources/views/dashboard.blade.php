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
        </div>
        <form action="{{route('hour-store')}}" method="post" name="myform" id="myform">
            @csrf
            <table class="table-striped" id="table">

                <thead>
                    <td class="form-label">date</td>
                    <td class="form-label">from time</td>
                    <td class="form-label">to time</td>
                </thead>
                <tbody id="tableBody">
                    <tr id="row">
                        <td><input class="form-control" require name="items[0][date]" id="date" type="date"></td>
                        <td><input class="form-control" require name="items[0][from_time]" type="time"></td>
                        <td><input class="form-control" require name="items[0][to_time]" type="time"></td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" class="btn btn-primary mt-3" value="save" />
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        var rowIndex = 1;
        $('#btnAddRow').click(function() {
            function getOneTableRaw(index) {
                return `<tr id="row">
                <td><input class="form-control" require name="items[${index}][date]" type="date"></td>
                <td><input class="form-control" require name="items[${index}][from_time]" type="time"></td>
                <td><input class="form-control" require name="items[${index}][to_time]" type="time"></td>
                </tr>`;
            }
            var count = $("#numberRow").val() ? $("#numberRow").val() : 1;
            while (count-- > 0) {
                $("#table").append(getOneTableRaw(rowIndex));
                rowIndex += 1;
            }
        });
    });
</script>

</html>