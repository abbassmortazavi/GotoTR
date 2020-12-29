<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $orderItem->order_id }}</p>
</div>

<!-- Orderable Type Field -->
<div class="form-group">
    {!! Form::label('orderable_type', 'Orderable Type:') !!}
    <p>{{ $orderItem->orderable_type }}</p>
</div>

<!-- Orderable Id Field -->
<div class="form-group">
    {!! Form::label('orderable_id', 'Orderable Id:') !!}
    <p>{{ $orderItem->orderable_id }}</p>
</div>

<!-- Count Field -->
<div class="form-group">
    {!! Form::label('count', 'Count:') !!}
    <p>{{ $orderItem->count }}</p>
</div>

<!-- Item Price Field -->
<div class="form-group">
    {!! Form::label('item_price', 'Item Price:') !!}
    <p>{{ $orderItem->item_price }}</p>
</div>

<!-- Total Price Field -->
<div class="form-group">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $orderItem->total_price }}</p>
</div>

<!-- Campaing Id Field -->
<div class="form-group">
    {!! Form::label('campaing_id', 'Campaing Id:') !!}
    <p>{{ $orderItem->campaing_id }}</p>
</div>

<!-- Item Price After Discount Field -->
<div class="form-group">
    {!! Form::label('item_price_after_discount', 'Item Price After Discount:') !!}
    <p>{{ $orderItem->item_price_after_discount }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $orderItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $orderItem->updated_at }}</p>
</div>

