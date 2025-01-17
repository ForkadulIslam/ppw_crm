<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{!! Auth::user()->full_name !!}</div>
                <div class="email">
                    {!! Auth::user()->email !!}
                </div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{!! URL::to('logout') !!}"><i class="material-icons">input</i>Sign Out</a></li>
                        <li role="seperator" class="divider"></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="{!! url('/') !!}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                @foreach(menu_array() as $i=>$item)

                    @if($item['role_id'] == Auth::user()->role_id)
                        @if(isset($item['sub']))
                            <li class="">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">{!! $item['icon'] !!}</i>
                                    <span>{!! $item['label'] !!}</span>
                                </a>
                                <ul class="ml-menu">
                                    @foreach($item['sub'] as $sub_item)
                                        <li class="">
                                            <a href="{!! $sub_item['link'] !!}">{!! $sub_item['label'] !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="">
                                <a href="{!! $item['link'] !!}">
                                    <i class="material-icons">{!! $item['icon'] !!}</i>
                                    <span>{!! $item['label'] !!}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2024 <a href="#">PPW CRM</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
