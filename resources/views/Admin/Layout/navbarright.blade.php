<div class="navbar-right">
    <ul class="navbar-nav">

        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="zmdi zmdi-power">
                </button>
            </form>
            </li>
    </ul>
</div>
