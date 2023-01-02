@extends('app')
@section('content')
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
                <option value="rial" {{$data->unit == 'rial'?'selected':''}}>ریال</option>
                <option value="toman" {{$data->unit=='toman' ? 'selected' : ''}}>تومان</option>
            </select>
        </div>
    </div>

    <input type="submit" class="btn btn-primary mt-3" value="save" />
</form>
@endsection