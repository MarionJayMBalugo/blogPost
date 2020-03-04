@extends('layouts.app')
@section('script')
<script src="{{asset('js/myPostController.js')}}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> {{ __('create post') }}</button>
                <button type="button" class="btn btn-info btn-lg" id="viewMyPosts">{{ __('my post') }}</button>
    
                <div class="card-header">POSTS


                </div>

                <div class="card-body">
                    @foreach($post as $pst)

                    @foreach($pst['posts'] as $detail)
                    <h2>post</h2>
                    <div style="text-align:center">
                        <h4>{{$detail['blogpost']}}</h4>
                        <p>by:{{$pst['name']}}</p>
                    </div>
                    <h3>comments</h3>
                    @foreach($detail['comments'] as $comment)
                    <div style="width:60%;">
                        <h4 id="comment">{{$comment['comment']}}</h4>
                        @if($comment['users']['id']== auth()->user()->id)
                        <h6 style="color:green;">by:<B>YOU</B></h6>
                        <form action="{{route('deleteComment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment['id']}}">
                            <button type="submit">delete</button>
                        </form>
                        <form action="{{route('updateComment',$comment['id'])}}" method="get">
                            @csrf
                            <input type="hidden" name="comment_id" id="" value="{{$comment['id']}}">
                            <input type="submit" id="updateCommentBtn" value="update">
                        </form>


                        <!-- <input type="reset" id="btns"class="btn btn-info btn-lg" data-id="{{$comment['id']}}" data-comment="{{$comment['comment']}}" data-toggle="modal" data-target="#editCommentModal" value="update"> -->
                        @else
                        <h6 style="color:grey;">by:<b><?php print_r($comment['users']['name']);?></b></h6>

                        @endif
                        <hr style="margin-right:10%;">
                    </div>

                    @endforeach
                    <form action="{{route('createComment')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control rounded-0" rows="5" type="text" name="comment"
                                required></textarea>
                        </div>
                        <input type="hidden" name="id" value="{{$detail['id']}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-primary">Add comment</button>

                    </form>
                    <hr>

                    @endforeach

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    @extends('modals.create_post_modal')
</div>
@endsection