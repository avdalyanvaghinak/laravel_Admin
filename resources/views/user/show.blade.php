@extends('news')

@section('title')
    News
    @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <strong>Title</strong>
                        <p> {{ $posts->title }}</p>
                        <strong>Sub Title</strong>
                        <p>{{ $posts->sub_title }}</p>


                        <p>{{ $posts->description }}</p>

                       <img src="/images/{{$posts->avatar}}"/>


                        <hr/>
                        <span><strong>  Coments Count</strong>{{$posts->comments->count()}}
                        </span>
                        <h4>Display Comments</h4>
                        <hr>
                        @foreach($posts->comments as $comment)
                            <div class="display-comment">
                                <strong>{{ $comment->user->name }} {{$comment->created_at}}</strong>
                                <p>{{ $comment->body }}</p>
                            </div>
                        @endforeach
                        <hr/>
                        @if (Auth::check())
                            @include('includes.errors')
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea name="body" cols="40" rows="5"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="Add Comment"/>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
