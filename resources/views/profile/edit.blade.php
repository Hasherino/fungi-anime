<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Edit profile</h1>
            </div>
            <form method="POST" action="/profile/update">
                @csrf
                <div class="forum-footer"> <strong>First name:</strong>
                    <input id="first_name" name="first_name" type="text" value="{{ auth()->user()->first_name }}" />
                </div>
                <div class="forum-footer"> <strong>Last name:</strong>
                    <input id="last_name" name="last_name" type="text" value="{{ auth()->user()->last_name }}" />
                </div>
                <div class="forum-footer"> <strong>Birth date:</strong>
                    <input id="birthday" name="birthday" type="date" value="{{ auth()->user()->birthday }}" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Update" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
