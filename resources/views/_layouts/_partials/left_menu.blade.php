        <?php $user_type = session()->get('user_type'); ?>
        <ul class="main-menu">
            <li class="@yield('page_home_li_cls')">
                <a href="{{ route('home.index') }}"><i class="zmdi zmdi-home"></i> Home</a>
            </li>
            <li class="sub-menu @yield('page_master_li_cls')">
                <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-collection-item"></i> Master</a>
                <ul>
                    <li >
                        <a class="@yield('page_team_li_cls')" href="{{ route('teams.index') }}"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; Team </a>
                    </li>
                    <li >
                        <a class="@yield('page_supervisors_li_cls')" href="{{ route('supervisors.index') }}"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; SuperVisor </a>
                    </li> 
                    <li >
                        <a class="@yield('page_teamtarget_li_cls')" href="{{ route('teamtarget.index') }}"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; Team Target </a>
                    </li>
                    <li >
                        <a class="@yield('page_targetpurchase_li_cls')" href="{{ route('targetpurchase.index') }}"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; Target Purchase</a>
                    </li>
                    <li >
                        <a class="@yield('page_targetproduction_li_cls')" href="{{ route('targetproduction.index') }}"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; Target Production</a>
                    </li>
                </ul>
            </li>            
        </ul>

