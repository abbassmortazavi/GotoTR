<div class="table-responsive">
    <table class="table" id="food-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Slug</th>
        <th>Image</th>
        <th>Description</th>
        <th>Status</th>
        <th>Restaurant Id</th>
        <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($food as $food)
            <tr>
                <td>{{ $food->title }}</td>
            <td>{{ $food->slug }}</td>
            <td>{{ $food->image }}</td>
            <td>{{ $food->description }}</td>
            <td>{{ $food->status }}</td>
            <td>{{ $food->restaurant_id }}</td>
            <td>{{ $food->price }}</td>
                <td>
                    {!! Form::open(['route' => ['food.destroy', $food->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('food.show', [$food->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('food.edit', [$food->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
