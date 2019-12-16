<h5>you are redirect to public page</h5>
<h1>{{Auth::user()->name}}
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out pull-right"></i> {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>