@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                <button type="button" class="btn btn-info btn-lg"><a href="{{route('home')}}"> {{ __('view posts') }}</a></button>
                            
                    <form method="POST" action="{{ route('updatenowComment') }}">
                        @csrf             
                        <div class="form-group">
                            <input type="hidden" name="comment_id" value="{{$comment[0]['id']}}">
                            <textarea class="form-control rounded-0" rows="5" type="text" name="comment"
                             required>{{$comment[0]['comment']}}</textarea>
                        </div>         
                        <input type="submit" value="update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection