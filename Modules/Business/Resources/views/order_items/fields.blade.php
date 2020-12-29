<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderable Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderable_type', 'Orderable Type:') !!}
    {!! Form::text('orderable_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderable_id', 'Orderable Id:') !!}
    {!! Form::text('orderable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count', 'Count:') !!}
    {!! Form::text('count', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_price', 'Item Price:') !!}
    {!! Form::text('item_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::text('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Campaing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campaing_id', 'Campaing Id:') !!}
    {!! Form::text('campaing_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Price After Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_price_after_discount', 'Item Price After Discount:') !!}
    {!! Form::text('item_price_after_discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orderItems.index') }}" class="btn btn-default">Cancel</a>
</div>
