@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                <button type="button" class="btn btn-info btn-lg"><a href="{{route('home')}}"> {{ __('view posts') }}</a></button>
                            
                    <form method="POST" action="{{ route('updatePost') }}">
                        @csrf             
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{$post[0]['id']}}">
                            <textarea class="form-control rounded-0" rows="5" type="text" name="post"
                             required>{{$post[0]['blogpost']}}</textarea>
                        </div>         
                        <input type="submit" value="update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection