@extends('layouts.app')

@section('title', 'Mcq')


@section('content')


<form role="form" name="mcqForm" method="POST" action="{{ route('mcq.store')}}">
    @csrf
<ol style="list-style-type: decimal;">
@foreach ($questions as $question) 
    <li>{{$question->question}}
        <ul>     
            <input type="hidden"  name="questionId[]" value="{{$question->id}}">
            @foreach ($question->option as $item)
                <p><input type="radio" id="{{$item->id}}" name="option_{{$question->id}}" value="{{$item->id}}"> {{$item->option}} </p>
            @endforeach
        </ul>
    </li>
@endforeach
</ol>
<button type="submit" class="btn btn-primary" name="Submit" >Submit</button>
</form>


@endsection
