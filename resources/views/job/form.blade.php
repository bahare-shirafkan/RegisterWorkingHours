@extends('app')
@section('content')
<form  class="form-horizontal" action="{{route('job-create')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="totle">عنوان</label>
                <input type="text" class="form-control" name="title" id="title">
                <!-- <input type="text" hidden  name="user_id" value="1"> -->
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="desc">توضیحات</label>
                <input type="text" class="form-control" id="desc" name="desc">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="hour_salary">ساعتی چقدر</label>
                <input type="text" class="form-control" id="hour_salary" name="hour_salary">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="currency">واحد پول</label>
                <input type="text" class="form-control" id="currency" name="currency">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">تلفن</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">آدرس</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="start_timr">شروع کار</label>
                <input type="text" class="initial-value-example form-control" require name="start_time" id="start_timr" />
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-2" for="end_time">پایان کار</label>
                <input type="text" class="initial-value-example form-control" require name="end_time" id="end_time" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary mt-4">ذخیره</button>
            </div>
        </div>
    </div>
</form>
@endsection
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('js/persian-date.min.js')}}"></script>
<script src="{{asset('js/persian-datepicker.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.initial-value-example').persianDatepicker({
            initialValue: false,
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });
    });
</script>