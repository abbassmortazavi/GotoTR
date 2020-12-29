<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Total Price</th>
        <th>Total Item Price</th>
        <th>Delivery Price</th>
        <th>Total Price After Disco</th>
        <th>Unt</th>
        <th>Status</th>
        <th>Item Count</th>
        <th>Restaurant Approved At</th>
        <th>Description</th>
        <th>Owner Id</th>
        <th>Owner Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->total_price }}</td>
            <td>{{ $order->total_item_price }}</td>
            <td>{{ $order->delivery_price }}</td>
            <td>{{ $order->total_price_after_disco }}</td>
            <td>{{ $order->unt }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->item_count }}</td>
            <td>{{ $order->restaurant_approved_at }}</td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->owner_id }}</td>
            <td>{{ $order->owner_type }}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
