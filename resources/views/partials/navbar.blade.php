<nav ng-controller="navController as nav">
    <div class="nav-wrapper">
        <a class="brand-logo" href="{{ url('/') }}">
            <i class="fa fa-lemon-o" aria-hidden="true"></i>
            {{ config('app.name', 'Laravel') }}
        </a>
        <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                @if(getPlayer())
                <li><a href="{{ route('player.character') }}"><i class="fa fa-user" aria-hidden="true"></i> {{ getPlayer()->character->name }}</a></li>
                <li class="player-quick-info">

                    <span>Level {{ getPlayer()->character->level }}</span>
                    <div class="progress">
                        <div class="determinate" style="width: {{ (getPlayer()->experience_points * 100) / getPlayer()->required_experience_points }}%"></div>
                    </div>

                </li>
                <li>
                    <i class="fa fa-database"></i> //nav.gold// gold
                </li>
                @endif
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
    </div>
</nav>