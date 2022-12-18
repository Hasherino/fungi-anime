<x-layout>
<div id="page_forms">
    <div id="userlogin">
      <div id="userlogin_header">
        <h2><span>User Login</span></h2>
      </div>
      @if(!auth()->check())
      <form method="POST" action="/api/auth/login">
        <div id="field_username"> <strong><span>Email:</span></strong>
          <input id="email" name="email" type="email" />
        </div>
        <div id="field_password"> <strong><span>Password:</span></strong>
          <input id="password" name="password" type="password" />
        </div>
        <div id="button_enter">
          <input type="submit" style="background-image: url(/images/userlogin_enter.gif)" alt="Enter" class="button" value="" />
        </div>
      </form>
      <div id="userlogin_links">
        <a href="/profile/register" id="notregister"><strong><span>Not Registered Yet?</span></strong></a> <br />
        <a href="/profile/register" id="register"><strong><span>Register >>></span></strong></a>
      </div>
      @else
        <div>
          <h2>You are logged in!</h2>
            <div class="forum-footer">
                <a class="btn" href='/api/auth/logout'>Logout</a>
            </div>
        </div>
      @endif
    </div>
    <div id="sitesearch_header">
      <h2><span>Site Search</span></h2>
    </div>
    <div id="sitesearch">
      <form method="POST" action="/profile/search">
      @csrf
        <div>
          <input id="query" name="query" type="text" />
          <input type="submit" style="background-image: url(/images/sitesearch_button.gif)" alt="Go" class="button" value="" />
        </div>
        <div class="clearthis">&nbsp;</div>
      </form>
    </div>
  </div>
  <div id="content_body">
    <div id="t_left_box">
      <div id="t_left">
        <div>
          <h2>Popular anime</h2>
        </div>
        <div class="content_entry">
          <div class="thumbnail"><img src="{{ $anime[0]['attributes']['posterImage']['small'] }}" width="121" height="90" alt="Image Caption" /></div>
          <div class="entry_text">
            <strong>{{ $anime[0]['attributes']['canonicalTitle'] }}</strong>
            <p>Release date: {{ $anime[0]['attributes']['startDate'] }}</p>
            <p>Score: {{ $anime[0]['attributes']['averageRating'] }}</p>
            <p>{{ $anime[0]['attributes']['episodeCount'] }} episodes</p>
          </div>
          <div class="clearthis">&nbsp;</div>
        </div>
        <div class="content_entry">
          <div class="thumbnail"><img src="{{ $anime[1]['attributes']['posterImage']['small'] }}" width="118" height="88" alt="Image Caption" /></div>
          <div class="entry_text">
              <strong>{{ $anime[1]['attributes']['canonicalTitle'] }}</strong>
              <p>Release date: {{ $anime[1]['attributes']['startDate'] }}</p>
              <p>Score: {{ $anime[1]['attributes']['averageRating'] }}</p>
              <p>{{ $anime[1]['attributes']['episodeCount'] }} episodes</p>
          </div>
          <div class="clearthis">&nbsp;</div>
        </div>
      </div>
    </div>
    <div id="t_right_box">
      <div id="t_right">
        <div>
          <h2>​</h2>
        </div>
        <div class="content_entry">
          <div class="thumbnail"><img src="{{ $anime[2]['attributes']['posterImage']['small'] }}" width="118" height="88" alt="Image Caption" /></div>
          <div class="entry_text">
              <strong>{{ $anime[2]['attributes']['canonicalTitle'] }}</strong>
              <p>Release date: {{ $anime[2]['attributes']['startDate'] }}</p>
              <p>Score: {{ $anime[2]['attributes']['averageRating'] }}</p>
              <p>{{ $anime[2]['attributes']['episodeCount'] }} episodes</p>
          </div>
          <div class="clearthis">&nbsp;</div>
        </div>
        <div class="content_entry">
          <div class="thumbnail"><img src="{{ $anime[3]['attributes']['posterImage']['small'] }}" width="118" height="88" alt="Image Caption" /></div>
          <div class="entry_text">
              <strong>{{ $anime[3]['attributes']['canonicalTitle'] }}</strong>
              <p>Release date: {{ $anime[3]['attributes']['startDate'] }}</p>
              <p>Score: {{ $anime[3]['attributes']['averageRating'] }}</p>
              <p>{{ $anime[3]['attributes']['episodeCount'] }} episodes</p>
          </div>
          <div class="clearthis">&nbsp;</div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
