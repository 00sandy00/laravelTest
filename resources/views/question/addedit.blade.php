@extends('layouts.app')

@section('title', 'Set Question')
@push('custom-style')
<style>
    .top10px{
        margin-top: 10px !important;
    }
    .row{
        margin-bottom: 10px !important;
    }
    .text-center{
        text-align: center !important;
    }
</style>
@endpush
@push('custom-script')
<script>
    $(document).ready(function(){


        $("form input:radio").change(function () {
            var option=$(this).attr('data-option');
            var value=$('#'+option).val();
            $(this).val(value);
               
        });



    }); //end of document ready
</script>
@endpush

@section('content')
<p><a href="{{route('question.index')}}"> << List</a></p>
<br>

{{--Question From Start --}}
<form class="top10px" method="POST" action="{{isset($questions) ?  route('question.update',$questionId) : route('question.store')}}">
    {{ isset($questions) ? method_field('PUT') : "" }}
    @csrf
    
   
    
    @if (isset($questions))
        @foreach ($questions as $question) 
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="question" id="question" placeholder="Question" value="{{$question->question}}">
                </div>
            </div>
            @php
                $i=1;
            @endphp
            @foreach ($question->option as  $item)
                <div class="form-group row">
                    <label for="option{{$i}}" class="col-sm-2 col-form-label">Option {{$i}}</label>
                    <div class="col-sm-2">
                        <input {{$item->is_correct=='Y' ?  'checked' : ''}} type="radio" data-option="option{{$i}}" id="is_correct{{$i}}" name="is_correct" value="{{$item->option}}">            
                    </div>
                    <div class="col-sm-8">
                        <input required type="text" class="form-control" name="option[]" id="option{{$i}}" placeholder="Option {{$i}}" value="{{$item->option}}">
                    </div>
                </div>
                
                @php
                    $i++;
                @endphp
            @endforeach
        @endforeach
    @else
        <div class="form-group row">
            <label for="question" class="col-sm-2 col-form-label">Question</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" name="question" id="question" placeholder="Question">
            </div>
        </div>
        @for ($i = 1; $i <= 4; $i++) 
            <div class="form-group row">
                <label for="option{{$i}}" class="col-sm-2 col-form-label">Option {{$i}}</label>
                <div class="col-sm-2">
                    <input type="radio" data-option="option{{$i}}" id="is_correct{{$i}}" name="is_correct" value="">            
                </div>
                <div class="col-sm-8">
                    <input required type="text" class="form-control" name="option[]" id="option{{$i}}" placeholder="Option {{$i}}">
                </div>
            </div>
        @endfor
    @endif
    
    
   
   
    @error('email', 'option')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    
</form>
{{--Question From End --}}

@endsection