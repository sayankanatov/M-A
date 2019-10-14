<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
{{-- <li><a href='{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}'><i class='fa fa-hdd-o'></i> <span>Backups</span></a></li>
<li><a href="{{ backpack_url('log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
<li><a href='{{ url(config('backpack.base.route_prefix', 'admin') . '/setting') }}'><i class='fa fa-cog'></i> <span>Settings</span></a></li> --}}
<li><a href="{{ backpack_url('menu-item') }}"><i class="fa fa-list"></i> <span>Меню</span></a></li>

<li><a href='{{ backpack_url('city') }}'><i class='fa fa-fort-awesome'></i> <span>Города</span></a></li>

<li><a href='{{ backpack_url('service') }}'><i class='fa fa-balance-scale'></i> <span>Услуги</span></a></li>

<li><a href='{{ backpack_url('company') }}'><i class='fa fa-building'></i> <span>Компании</span></a></li>

<li><a href='{{ backpack_url('lawyer') }}'><i class='fa fa-address-book'></i> <span>Юристы</span></a></li>