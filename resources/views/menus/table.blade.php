<div class="table-responsive">
    <table class="table" id="menus-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Menuable Type</th>
        <th>Menuable Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->title }}</td>
            <td>{{ $menu->menuable_type }}</td>
            <td>{{ $menu->menuable_id }}</td>
                <td>
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menus.show', [$menu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
