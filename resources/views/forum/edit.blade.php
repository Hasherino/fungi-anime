<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Edit thread</h1>
            </div>
            <form method="POST" action="/forum/update/{{ $thread->id }}">
                @csrf
                <div class="forum-footer"> <strong>Title:</strong>
                    <input id="title" name="title" type="text" value="{{ $thread->title }}" />
                </div>
                <div class="forum-footer"> <strong>Content:</strong>
                    <input id="content" name="content" type="text" value="{{ $thread->content }}" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Update" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
