<x-layout>
  <h1 class="center">
    {{ $user->first_name." ".$user->last_name }}
    @if($nickname = $user->nickname)
      {{ ' "'.$nickname.'"' }}
    @endif
  </h1>
  <div class="cont">
    <div class="left">
      <div class="bio">
        <h3 class="center">Birth date</h3>
        @if($birthday = $user->birthday)
          <p>{{ $birthday }}</p>
        @else
          <p>Not set</p>
        @endif
      </div>
      <div class="statistics">
        <h3 class="center">Statistics</h3>
        <ul>
          <li>Threads: {{ count($user->threads) }}</li>
          <li>Comments: {{ count($user->comments) }}</li>
          <li>Reputation: {{ $user->reputation }}</li>
        </ul>
      </div>
      @if($user->id == auth()->id())
        <div class="share">
          <h3 class="center">Share your anime list</h3>
            <div class="center" style="margin-bottom: 0; margin-top: 5px">
              <button class="transparent" onclick='location.href="https://www.facebook.com/sharer/sharer.php?u=localhost/profile/{{ $user->id }}&display=popup"'><i class="fab fa-facebook-f" style="font-size: 34px"></i></button>
            </div>
        </div>
        <div class="forum-footer">
            <a class="btn" href='/profile/edit'>Edit profile</a>
        </div>
        <div class="forum-footer">
          <a class="btn" onclick="return confirm('Are you sure?')" href='/profile/delete'>Delete account</a>
        </div>
      @endif
    </div>
    <div class="anime">
      <h3 class="center">Favorite anime</h3></br>
      @foreach($user->animes as $anime)
        <div class="subforum-row">
            <div class="subforum-icon subforum-column center">
                @if(auth()->check() && $user->id == auth()->id())
                    <button class="transparent" onclick="window.location='{{ url("/anime/delete/$anime->id") }}'"><i class="fa-sharp fa-solid fa-trash-can"></i></button>
                @endif
            </div>
            <div class="subforum-description subforum-column">
                <h4>{{ $anime->english_name }}</h4>
                <p>{{ $anime->japanese_name }}</p>
            </div>
            <div class="subforum-stats subforum-column center">
                Score: {{ $anime->score }}
            </div>
            <div class="subforum-info subforum-column">
                Created at <small>{{ $anime->pivot->created_at }}</small>
            </div>
        </div>
      @endforeach
        @if(auth()->check())
            <div class="forum-footer">
                <a class="btn" href='/anime/create'>New anime</a>
            </div>
        @endif
    </div>
  </div>
</x-layout>
