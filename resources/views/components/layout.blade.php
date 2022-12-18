<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Fungi Anime</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>
<body>
<div id="container">
  @if(\Request::is('/'))
    <div id="body_image">&nbsp;</div>
  @endif
  <div id="page_header">
    <h1><span>Fungi Anime</span></h1>
    <div class="clearthis">&nbsp;</div>
  </div>
  <div id="page_menu">
    <ul>
      <li class="login"><a href="/"><span>Login</span></a><span></span></li>
      <li class="forum"><a href="/forum"><span>Forum</span></a><span></span></li>
      @if(auth()->check())
        <li class="profile"><a href="/profile/{{ auth()->id() }}"><span>Profile</span></a><span></span></li>
      @endif
    </ul>
  </div>
  {{ $slot }}
  <div id="clearthis_contentbody">&nbsp;</div>
</div>
<div id="page_footer">
  {{ config('phrase.value') }}
</div>
@if(auth()->check() && auth()->user()->admin == 1)
    <form method="POST" action="/phrase">
        @csrf
        <div class="forum-footer"> <strong>Content:</strong>
            <input id="content" name="content" type="text" />
        </div>
        <div class="forum-footer" style="margin-bottom: 30px">
            <input type="submit" class="btn" alt="Enter" value="Edit" />
        </div>
    </form>
@endif
</body>
</html>
