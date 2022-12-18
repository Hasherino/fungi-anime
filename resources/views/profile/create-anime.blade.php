<x-layout>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Add new custom anime</h1>
            </div>
            <form method="POST" action="/anime/create">
                @csrf
                <div class="forum-footer"> <strong>English name (required):</strong>
                    <input id="english_name" name="english_name" type="text" />
                </div>
                <div class="forum-footer"> <strong>Japanese name:</strong>
                    <input id="japanese_name" name="japanese_name" type="text" />
                </div>
                <div class="forum-footer"> <strong>Score:</strong>
                    <input id="score" name="score" type="number" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Add" />
                </div>
            </form>
        </div>

        <div class="subforum">
            <div class="subforum-title">
                <h1>Add new anime from Kitsu</h1>
            </div>
            <form method="POST" action="/anime/create/kitsu">
                @csrf
                <div class="forum-footer"> <strong>Kitsu ID:</strong>
                    <input id="kitsu_id" name="kitsu_id" type="text" />
                </div>
                <div class="forum-footer" style="margin-bottom: 30px">
                    <input type="submit" class="btn" alt="Enter" value="Add" />
                </div>
            </form>
        </div>
    </div>
</x-layout>
