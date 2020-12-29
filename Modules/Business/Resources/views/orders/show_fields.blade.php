<!-- Total Price Field -->
<div class="form-group">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $order->total_price }}</p>
</div>

<!-- Total Item Price Field -->
<div class="form-group">
    {!! Form::label('total_item_price', 'Total Item Price:') !!}
    <p>{{ $order->total_item_price }}</p>
</div>

<!-- Delivery Price Field -->
<div class="form-group">
    {!! Form::label('delivery_price', 'Delivery Price:') !!}
    <p>{{ $order->delivery_price }}</p>
</div>

<!-- Total Price After Disco Field -->
<div class="form-group">
    {!! Form::label('total_price_after_disco', 'Total Price After Disco:') !!}
    <p>{{ $order->total_price_after_disco }}</p>
</div>

<!-- Unt Field -->
<div class="form-group">
    {!! Form::label('unt', 'Unt:') !!}
    <p>{{ $order->unt }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $order->status }}</p>
</div>

<!-- Item Count Field -->
<div class="form-group">
    {!! Form::label('item_count', 'Item Count:') !!}
    <p>{{ $order->item_count }}</p>
</div>

<!-- Restaurant Approved At Field -->
<div class="form-group">
    {!! Form::label('restaurant_approved_at', 'Restaurant Approved At:') !!}
    <p>{{ $order->restaurant_approved_at }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $order->description }}</p>
</div>

<!-- Owner Id Field -->
<div class="form-group">
    {!! Form::label('owner_id', 'Owner Id:') !!}
    <p>{{ $order->owner_id }}</p>
</div>

<!-- Owner Type Field -->
<div class="form-group">
    {!! Form::label('owner_type', 'Owner Type:') !!}
    <p>{{ $order->owner_type }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $order->updated_at }}</p>
</div>

