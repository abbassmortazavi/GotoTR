<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::text('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Item Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_item_price', 'Total Item Price:') !!}
    {!! Form::text('total_item_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_price', 'Delivery Price:') !!}
    {!! Form::text('delivery_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price After Disco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price_after_disco', 'Total Price After Disco:') !!}
    {!! Form::text('total_price_after_disco', null, ['class' => 'form-control']) !!}
</div>

<!-- Unt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unt', 'Unt:') !!}
    {!! Form::text('unt', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_count', 'Item Count:') !!}
    {!! Form::text('item_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Restaurant Approved At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('restaurant_approved_at', 'Restaurant Approved At:') !!}
    {!! Form::text('restaurant_approved_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_id', 'Owner Id:') !!}
    {!! Form::text('owner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_type', 'Owner Type:') !!}
    {!! Form::text('owner_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
</div>
