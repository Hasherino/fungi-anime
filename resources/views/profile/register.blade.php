<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Register</h1>
            </div>
            <form method="POST" action="/api/auth/register">
                @csrf
                <div class="forum-footer"> <strong>First name:</strong>
                    <input id="first_name" name="first_name" type="text" />
                </div>
                <div class="forum-footer"> <strong>Last name:</strong>
                    <input id="last_name" name="last_name" type="text" />
                </div>
                <div class="forum-footer"> <strong>Nickname (required):</strong>
                    <input id="nickname" name="nickname" type="text" />
                </div>
                <div class="forum-footer"> <strong>Birth date:</strong>
                    <input id="birthday" name="birthday" type="date" />
                </div>
                <div class="forum-footer"> <strong>Email (required):</strong>
                    <input id="email" name="email" type="email" />
                </div>
                <div class="forum-footer"> <strong>Password (required):</strong>
                    <input id="password" name="password" type="password" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Create" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
