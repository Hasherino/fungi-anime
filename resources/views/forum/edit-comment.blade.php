<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Edit comment</h1>
            </div>
            <form method="POST" action="/comment/update/{{ $comment->id }}">
                @csrf
                <div class="forum-footer"> <strong>Content:</strong>
                    <input id="content" name="content" type="text" value="{{ $comment->content }}" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Update" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
