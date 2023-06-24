@extends('app')
@section('content')
<link rel="stylesheet" href="{{asset('css/job-style.css')}}">
<div class="container mx-auto mt-4">
    <div class="row" dir="rtl">
        <div class="col-3">
            <a href="{{route('job-form')}}" class="btn btn-warning" style="float: right;" type="button"> create +</a>
        </div>
    </div>
    <div class="row">
        @foreach ($res as $item)
        <div class="col-md-4">
            <div class="card-custome" style="width: 18rem;">
                <img src="https://i.imgur.com/ZTkt4I5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">{{$item['desc']}}</p>
                    <a href="{{route('hour-list',$item['id'])}}" class="btn-custome mr-2">ساعات کاری</a>
                    <a href="#" class="btn-custome ">ویرایش</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection