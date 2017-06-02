@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="https://dimg.voot.com/include/user-images/blank-user.jpg"
                             alt="User Image">
                        <span class="username"><strong>{{$petition->user->name}}</strong></span>
                        <span class="description">7:30 PM Today</span>
                    </div>
                </div>
                <div class="box-body">
                    <h4><strong>{{$petition->title}}</strong></h4>
                    <p>{{$petition->body}}</p>
                </div>

                @foreach($petition->comments as $comment)
                    <div class="box-footer box-comments">

                        <div class="box-comment">

                            <img class="img-circle img-sm"
                                 src="https://dimg.voot.com/include/user-images/blank-user.jpg"
                                 alt="User Image">

                            <div class="comment-text">
                      <span class="username"> {{$comment->user->name}}
                        <span class="text-muted pull-right">{{$comment->created_at->diffForHumans()}}</span>
                      </span>
                                {{$comment->body}}
                            </div>

                        </div>

                    </div>
                @endforeach

                <div class="box-footer">
                    <form action="{{url('petitions/'.$petition->id.'/comment')}}" method="post">
                        {{csrf_field()}}
                        <div class="img-push">
                            <input type="text" class="form-control input-sm" placeholder="Press enter to post comment"
                                   name="body">
                        </div>
                    </form>
                </div>

            </div>

            @if(\Illuminate\Support\Facades\Auth::user()->id == $petition->id)
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="{{url('petitions/'.$petition->id.'/edit')}}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('delete-petition').submit()">
                            Delete
                        </button>
                    </div>
                </div>
            @endif

            <form id="delete-petition" method="post" action="{{url('petitions/'.$petition->id)}}">
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>

            <a class="btn btn-default" href="{{url('petitions')}}">Back</a>
        </div>
    </div>
@endsection