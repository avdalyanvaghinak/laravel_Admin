@extends('news')

@section('title')
    My Posts
    @endsection

@section('content')
    @foreach($posts as $post)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-50">
                <div class="p-r-10 p-r-0-sr991">
                    <div class="p-b-40">
                        <!-- Item post -->
                        <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                            <a href="{{ route('post.show', $post->id) }}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                <img src="/images/{{$post->avatar}}" />
                            </a>

                            <div class="size-w-9 w-full-sr575 m-b-25">
                                <h5 class="p-b-12">
                                    <a href="{{ route('post.show', $post->id) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                        {{$post->sub_title}}
                                    </a>
                                </h5>

                                <div class="cl8 p-b-18">
                                    <a href="{{ route('post.show', $post->id) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{$post->title}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
											-
										</span>

                                    <span class="f1-s-3">
											{{$post->created_at}}
										</span>
                                </div>

                                <p class="f1-s-1 cl6 p-b-24">
                                    {{$post->description}}
                                </p>
                                <form action="{{url('/userpost-delete/'.$post->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

