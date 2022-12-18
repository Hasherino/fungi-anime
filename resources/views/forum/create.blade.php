<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Create new thread</h1>
            </div>
            <form method="POST" action="/forum/create">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                <div class="forum-footer"> <strong>Title:</strong>
                    <input id="title" name="title" type="text" />
                </div>
                <div class="forum-footer"> <strong>Content:</strong>
                    <input id="content" name="content" type="text" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Create" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
