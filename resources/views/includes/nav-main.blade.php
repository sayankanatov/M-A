<header>
        <div class="header-top">
            <div class="nav__top">
                <div class="nav__socials">
                    <a href="https://www.instagram.com/jascongress.kz/" target="_blank">
                        <img src="{{asset('img/icons/instagram.png')}}">
                    </a>
                    <a href="mailto:jastar.sinergiiasy@list.ru">
                        <img src="{{asset('img/icons/email-icon.png')}}">
                    </a>
                </div>
            </div>
            <div class="logo">
                <a href="#">
                    <img src="{{asset('img/icons/logo-min.png')}}">
                    <img src="{{asset('img/icons/logo-min-mob.png')}}">
                </a>
                <a href="{{route('main')}}">
                    <img src="{{asset('img/icons/logo-synergy.png')}}">
                    <img src="{{asset('img/icons/logo-synergy-mob.png')}}">
                </a>
                <a href="#">
                    <img src="{{asset('img/icons/logo-cisc.png')}}">
                    <img src="{{asset('img/icons/logo-cisc-mob.png')}}">
                </a>
                <a href="#">
                    <img src="{{asset('img/icons/logo-ank.png')}}">
                    <img src="{{asset('img/icons/logo-ank.png')}}">
                </a>
            </div>
            <div class="nav__search">
                <input type="search" name="">
                <button type="submit">
                    <img src="{{asset('img/icons/search.png')}}">
                </button>
            </div>
        </div>

        <nav>
            <div class="nav__bottom">
                <ul>
                    @if ($menus->count())
                        @foreach ($menus as $k => $menu)
                        @if (($menu->page_id && is_object($menu->page)) || !$menu->page_id)
                        @if ($menu->children->count())

                        <li class="{{ ($k==0)?' fistitem':'' }}">
                            <a href="#">
                                @if(app()->getLocale() == 'ru')
                                    {{ $menu->name }}
                                @elseif(app()->getLocale() == 'kz')
                                    {{ $menu->name_kz }}
                                @else
                                    {{ $menu->name_en }}
                                @endif
                                 <i class="fas fa-angle-down"></i>
                            </a>
                            <ul class="submenu">
                                @foreach ($menu->children as $i => $child)
                                <li class="{{ ($child->url() == Request::url())?'active':'' }}">

                                    @if(substr($child->link,0,7) == 'uploads' || $child->type == 'external_link')
                                    <a href="{{$child->link }}">
                                    @else
                                    <a href="{{app()->getLocale().'/'. $child->link }}">
                                    @endif

                                    @if(app()->getLocale() == 'ru')
                                        {{ $child->name }}
                                    @elseif(app()->getLocale() == 'kz')
                                        {{ $child->name_kz }}
                                    @else
                                        {{ $child->name_en }}
                                    @endif
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="navitem {{ ($k==0)?' fistitem':'' }} {{ ($menu->url() == Request::url())?' active':'' }}">
                            
                            @if(substr($menu->link,0,7) == 'uploads' || $menu->type == 'external_link')
                                <a href="{{$menu->link }}">
                            @else
                                <a href="{{ app()->getLocale().'/'.$menu->link }}">
                            @endif
                            
                                @if(app()->getLocale() == 'ru')
                                    {{ $menu->name }}
                                @elseif(app()->getLocale() == 'kz')
                                    {{ $menu->name_kz }}
                                @else
                                    {{ $menu->name_en }}
                                @endif
                            </a>
                        </li>
                        @endif
                        @endif
                        @endforeach
                    @endif

                </ul>

                <div id="menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>