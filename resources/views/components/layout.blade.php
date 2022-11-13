<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Fungi Anime</title>
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
      <li class="profile"><a href="/profile"><span>Profile</span></a><span></span></li>
    </ul>
  </div>
  {{ $slot }}
  <div id="clearthis_contentbody">&nbsp;</div>
</div>
<div id="page_footer">Life is too short to not watch anime</br>-Wayne Gretzky</div>
</body>
</html>
