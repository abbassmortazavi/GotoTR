<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $menu->title }}</p>
</div>

<!-- Menuable Type Field -->
<div class="form-group">
    {!! Form::label('menuable_type', 'Menuable Type:') !!}
    <p>{{ $menu->menuable_type }}</p>
</div>

<!-- Menuable Id Field -->
<div class="form-group">
    {!! Form::label('menuable_id', 'Menuable Id:') !!}
    <p>{{ $menu->menuable_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $menu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $menu->updated_at }}</p>
</div>

