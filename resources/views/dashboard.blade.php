@extends('app')
@section('content')
<div class="row" dir="rtl">
    <div class="col-3">
        <input class="form-control" type="text" id="numberRow" style="float: left;">
    </div>
    <div class="col-3">
        <button id="btnAddRow" class="btn btn-warning" style="float: right;" type="button">Add to Row</button>
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

@endsection