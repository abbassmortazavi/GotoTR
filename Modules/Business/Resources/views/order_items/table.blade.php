<div class="table-responsive">
    <table class="table" id="orderItems-table">
        <thead>
            <tr>
                <th>Order Id</th>
        <th>Orderable Type</th>
        <th>Orderable Id</th>
        <th>Count</th>
        <th>Item Price</th>
        <th>Total Price</th>
        <th>Campaing Id</th>
        <th>Item Price After Discount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->order_id }}</td>
            <td>{{ $orderItem->orderable_type }}</td>
            <td>{{ $orderItem->orderable_id }}</td>
            <td>{{ $orderItem->count }}</td>
            <td>{{ $orderItem->item_price }}</td>
            <td>{{ $orderItem->total_price }}</td>
            <td>{{ $orderItem->campaing_id }}</td>
            <td>{{ $orderItem->item_price_after_discount }}</td>
                <td>
                    {!! Form::open(['route' => ['orderItems.destroy', $orderItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orderItems.show', [$orderItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('orderItems.edit', [$orderItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
