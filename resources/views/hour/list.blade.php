@extends('app')
@section('content')
<div class="row" dir="rtl">
    <div class="col-3">
        <a href="{{route('hour-form',$job['id'])}}" class="btn btn-warning" style="float: right;" type="button"> create +</a>
    </div>
</div>
<table class="table" id="table">
    <thead>
        <td scope="col" class="form-label">date</td>
        <td scope="col" class="form-label">from time</td>
        <td scope="col" class="form-label">to time</td>
        <td scope="col" class="form-label">diff hour(min)</td>
        <td scope="col" class="form-label">value hours ({{$job['currency']}})</td>
    </thead>
    <tbody">
        @php($sum=0)
        @foreach ($res as $item)
        <tr id="row">
            <td>{{jdate($item['date'])->format('Y-m-d')}}</td>
            <td>{{$item['from_time']}}</td>
            <td>{{$item['to_time']}}</td>
            <td>{{$item['diff_time']}}</td>
            <td>{{number_format((float)$item['diff_time']*$job['hour_salary']/60)}}</td>
        </tr>
        @php($sum+=($item['diff_time']*$job['hour_salary'])/60)
        @endforeach
        <tr>
            <td>
                <h4>sum total :</h4>
            </td>
            <td>
                <h5>{{number_format($sum)}}</h5>
            </td>
            <td></td>
        </tr>
        </tbody>
</table>
@endsection