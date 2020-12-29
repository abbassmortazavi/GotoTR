@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Food
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($food, ['route' => ['food.update', $food->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('food.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection