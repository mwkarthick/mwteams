        <?php $user_type = session()->get('user_type'); ?>
        <ul class="main-menu">
            <li class="@yield('page_home_li_cls')">
                <a href="{{ route('home.index') }}"><i class="zmdi zmdi-home"></i> Home</a>
            </li>
        </ul>

