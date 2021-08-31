@extends('master')
@section('content')
    <div class="container align-middle categoryGrid">
        <div class="row justify-content-center">
            @if( (count($data)+2)%3 != 0)
                @foreach($data as $item)
                    <a href="/categories/{{$item}}"  class="col-sm-3 categoryCard btn">{{$item}}</a>
                @endforeach
            @else
                @foreach($data as $item)
                    <a href="/categories/{{$item}}"  class="col-sm-5 categoryCard btn">{{$item}}</a>
                @endforeach
            @endif
            </div>
    </div>
@endsection('content')
