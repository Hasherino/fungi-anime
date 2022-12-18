<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Forum</h1>
            </div>
            @foreach($threads as $thread)
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                        @if(auth()->check() && $thread->user->id == auth()->id())
                            <button class="transparent" onclick="window.location='{{ url("/forum/edit/$thread->id") }}'"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                            <button class="transparent" onclick="window.location='{{ url("/forum/delete/$thread->id") }}'"><i class="fa-sharp fa-solid fa-trash-can"></i></button>
                        @endif
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4><a href="/forum/{{ $thread->id }}">{{ $thread->title }}</a></h4>
                        <p>{{ $thread->content }}</p>
                    </div>
                    <div class="subforum-stats subforum-column center">
                        {{ count($thread->likes) }} likes
                    </div>
                    <div class="subforum-info subforum-column">
                        @if($thread_author = $thread->user)
                            By <a href="/profile/{{ $thread_author->id }}">{{ $thread_author->nickname }}</a>
                        @else
                            By [Deleted]
                        @endif
                        <br>on <small>{{ $thread->created_at }}</small>
                    </div>
                </div>
            @endforeach
        </div>
        @if(auth()->check())
            <div class="forum-footer">
                <a class="btn" href='/forum/create'>New thread</a>
            </div>
        @endif
    </div>
</x-layout>
