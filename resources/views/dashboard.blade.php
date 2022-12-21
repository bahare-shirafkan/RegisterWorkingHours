<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body dir="rtl">
    <h1>this is dashboard</h1>
    <form action="{{route('hour-store')}}" method="post" name="myform" id="myform">
        @csrf
        <table class="table" id="table">
            <thead>
                <td>تاریخ</td>
                <td>از ساعت</td>
                <td>تا ساعت</td>
            </thead>
            <input type="text" id="numberRow">
            <tbody id="tableBody">
                <tr id="row">
                    <td><input class="input-group" name="items[0][date]" type="text"></td>
                    <td><input class="input-group" name="items[0][from_time]" type="text"></td>
                    <td><input class="input-group" name="items[0][to_time]" type="text"></td>
                </tr>
            </tbody>
        </table>
        <button id="btnAddRow" type="button">Add to Row</button>

        <input type="submit" value="save" />
    </form>
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
                <td><input class="input-group" name="items[${index}][date]" type="text"></td>
                <td><input class="input-group" name="items[${index}][from_time]" type="text"></td>
                <td><input class="input-group" name="items[${index}][to_time]" type="text"></td>
                </tr>`;
            }
            var count = $("#numberRow").val();

            while (count-- > 0) {
                $("#table").append(getOneTableRaw(rowIndex));
                console.log(getOneTableRaw(rowIndex));
                rowIndex += 1;
            }
        });
    });
</script>

</html>