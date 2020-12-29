<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{{ route('menus.index') }}"><i class="fa fa-edit"></i><span>Menus</span></a>
</li>

<li class="{{ Request::is('food*') ? 'active' : '' }}">
    <a href="{{ route('food.index') }}"><i class="fa fa-edit"></i><span>Food</span></a>
</li>

