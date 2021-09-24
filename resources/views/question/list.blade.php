
@extends('layouts.app')

@section('title', 'Question List')
@push('custom-script')
<script>
    $(document).ready(function(){


        $(".delete").on('click',function () {
            var url=$(this).attr('data-url');
            var _token=$(this).attr('data-token');
            $.ajax({                
                headers: {'X-CSRF-TOKEN': _token},  
                type: "DELETE",
                url:url,             
                success: function(result) {
                    window.location.href = "{{route('question.index')}}";
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    // alert(msg);  
                }
            }); /*end ajax call*/
               
        });



    }); //end of document ready
</script>
@endpush

@section('content')
<p><a href="{{route('question.create')}}"> Add New >></a></p>
<br>

@if (session()->has('msg'))

<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{session('msg')}}
  </div>
  
@endif


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Question</th>
                <th>Option</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question) 
                <tr>
                    <td>{{$question->question}}</td>
                    <td>
                        <ul>                                 
                            @foreach ($question->option as $item)
                                <li>{{$item->option}} </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="question/{{$question->id}}/edit"> Edit </a> 
                        &nbsp; 
                        <a href="javascript:;" data-token="{{csrf_token()}}" data-url="/question/{{$question->id}}" class="delete"> Delete </a>
                    </td>
                </tr>
            @endforeach
            
                
                
        </tbody>
    </table>
    @endsection