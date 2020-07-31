<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .padding-left {
            padding-left: 5rem;
        }
        .name-background {
            padding: 1rem;
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            border-radius: 0.4rem;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('tweets.index') }}" class="navbar-brand">HOME</a>
            </div>
            @if (Auth::check())
            <div class="navbar-header">
                <a href="{{ route('user_profile.show', ['id' => Auth::user()->id ]) }}" class="navbar-brand padding-left">Profile</a>
            </div>
            <div class="navbar-header">
                <span class="navbar-brand padding-left">
                    <span class="name-background">{{ Auth::user()->name }}</span>
                </span>
            </div>
            @else
            <div class="navbar-header">
                <span class="navbar-brand padding-left">
                    <span class="name-background">You're Guest User</span>
                </span>
            </div>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('register') }}">ユーザ新規登録</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">ログイン</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="page-header">
        <h1>@yield('page-title')</h1>
    </div>
    @yield('content')
</div>
</body>
</html>
