<header class="header__addition">
		<div class="header__addition-wrap">
			<div class="logo__addition">
				<a href="{{route('main')}}">
					<img src="{{asset('img/icons/logo-synergy-2.png')}}">
				</a>
			</div>

			<nav>
				<div id="menu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			
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

                                    @if($child->type == 'external_link')
                                        <a href="{{$child->link }}">
                                    @else
                                        @if(substr($child->link,0,7) == 'uploads')
                                        <a href="{{'/'.$child->link }}">
                                        @else
                                        <a href="{{'/'.app()->getLocale().'/'.$child->link }}">
                                        @endif
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
                            
                            @if($menu->type == 'external_link')
                                <a href="{{$menu->link }}">
                            @else
                                @if(substr($menu->link,0,7) == 'uploads')
                                    <a href="{{'/'.$menu->link }}">
                                @else
                                    <a href="{{'/'.app()->getLocale().'/'.$menu->link }}">
                                @endif
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
			</nav>
		</div>
	</header>