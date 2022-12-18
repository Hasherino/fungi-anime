<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Users</h1>
            </div>
            @foreach($users as $user)
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
                    </div>
                    <div class="subforum-description subforum-column">
                        <h4>{{ $user->first_name." ".$user->last_name }}</a></h4>
                    </div>
                    <div class="subforum-stats subforum-column center">
                    </div>
                    <div class="subforum-info subforum-column">
                        <a href="/profile/{{ $user->id }}">{{ $user->nickname }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="subforum">
            <div class="subforum-title">
                <h1>Threads</h1>
            </div>
            @foreach($threads as $thread)
                <div class="subforum-row">
                    <div class="subforum-icon subforum-column center">
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
    </div>
</x-layout>
