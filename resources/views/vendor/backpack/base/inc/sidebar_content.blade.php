<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
{{-- <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}'><i class='fa fa-hdd-o'></i> <span>Backups</span></a></li>
<li><a href="{{ backpack_url('log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix', 'admin') . '/setting') }}'><i class='fa fa-cog'></i> <span>Settings</span></a></li> --}}
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Пользователи</span></a></li>
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Роли</span></a></li>
        <li><a href="#{{-- {{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }} --}}"><i class="fa fa-key"></i> <span>Права и разрешения</span></a></li>
    </ul>
</li>
{{-- <li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>Меню</span></a></li> --}}

<li><a href='{{ backpack_url('city') }}'><i class='fa fa-fort-awesome'></i> <span>Города</span></a></li>

<li><a href='{{ backpack_url('seo_page') }}'><i class='fa fa-fort-awesome'></i> <span>SEO Страницы</span></a></li>

<li class="treeview">
    <a href="#"><i class="fa fa-balance-scale"></i> <span>Услуги и Категории</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href='{{ backpack_url('service_category') }}'><i class='fa fa-gavel'></i> <span>Категории услуг</span></a></li>

<li><a href='{{ backpack_url('service') }}'><i class='fa fa-credit-card'></i> <span>Услуги</span></a></li>
    </ul>
</li>

<li><a href='{{ backpack_url('company') }}'><i class='fa fa-building'></i> <span>Компании</span></a></li>

<li><a href='{{ backpack_url('lawyer') }}'><i class='fa fa-address-book'></i> <span>Юристы</span></a></li>
<li><a href='{{ backpack_url('faq') }}'><i class='fa fa-question'></i> <span>Часто задаваемые вопросы</span></a></li>