@extends('master')
@section('content')
    <div class="container align-middle categoryGrid">
        <div class="row justify-content-center">
            @if( (count($data)+2)%3 != 0)
                @foreach($data as $item)
                    <a class="col-sm-3 categoryCard btn">{{$item->name}}</a>
                @endforeach
            @else
                @foreach($data as $item)
                    <a class="col-sm-5 categoryCard btn">{{$item->name}}</a>
                @endforeach
            @endif
            </div>
    </div>
@endsection('content')
