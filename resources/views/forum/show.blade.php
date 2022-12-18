<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Thread</h1>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    @if(auth()->check() && $thread->user->id == auth()->id())
                        <button class="transparent" onclick="window.location='{{ url("/forum/edit/$thread->id") }}'"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                        <button class="transparent" onclick="window.location='{{ url("/forum/delete/$thread->id") }}'"><i class="fa-sharp fa-solid fa-trash-can"></i></button>
                    @endif
                </div>
                <div class="subforum-description subforum-column">
                    <h4>{{ $thread->title }}</h4>
                    <p>{{ $thread->content }}</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    {{ count($thread->likes) }} likes
                </div>
                <div class="subforum-info subforum-column">
                    By <a href="">{{ $thread->user->nickname }}</a>
                    <br>on <small>{{ $thread->created_at }}</small>
                </div>
            </div>
        </div>
        <div class="subforum">
            <div class="subforum-title">
                <h1>Comments</h1>
            </div>
            @foreach($comments as $comment)
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        @if(auth()->check() && $comment->user->id == auth()->id())
                            <button class="transparent" onclick="window.location='{{ url("/comment/edit/$comment->id") }}'"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                            <button class="transparent" onclick="window.location='{{ url("/comment/delete/$comment->id") }}'"><i class="fa-sharp fa-solid fa-trash-can"></i></button>
                        @endif
                    </div>
                    <div class="subforum-description subforum-column">
                        <p>{{ $comment->content }}</p>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        {{ count($comment->likes) }} likes
                    </div>
                    <div class="subforum-info subforum-column">
                        @if($comment_author = $comment->user)
                            By <a href="/profile/{{ $comment_author->id }}">{{ $comment_author->nickname }}</a>
                        @else
                            By [Deleted]
                        @endif
                        <br>on <small>{{ $comment->created_at }}</small>
                    </div>
                </div>
            @endforeach
        </div>
        @if(auth()->check())
            <form method="POST" action="/comment/create">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" id="thread_id" name="thread_id" value="{{ $thread->id }}">
                <div class="forum-footer"> <strong>Content:</strong>
                    <input id="content" name="content" type="text" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Create" />
                </div>
            </form>
        @endif
    </div>
</x-layout>
