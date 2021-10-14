@extends('layouts.app')

@section('content')
    {{--  <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tareas</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('tareas.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('tareas.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>  --}}
    <section class="view_tareas">
        <div class="container">
            <div class="row">
                <div class="col-6 lista_tareas">
                    <h2 style="color: #fff">Bienvenido a tu lista de tareas</h2>
                    @foreach ($tareas as $tarea)
                        <div class="alert alert-{{$tarea->item}}" role="alert">
                            {{$tarea->descripcion}}
                            <form action="{{route('tareas.destroy',$tarea->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="close"  aria-label="Close">
                                    <span aria-hidden="true" class="btn_destroy text-danger"><i class="fas fa-trash"></i></span>
                                </button> 
                            </form>
                            
                        </div>
                    @endforeach
                   <div class="line"></div>
                </div>
                <div class="col-6 items">
                    <form method="post" action="{{route('tareas.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="tarea" style="color: #fff; font-size:30px !important">Tarea</label>
                          <input type="text" class="form-control" name="tarea">
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                    <div class="list_items">
                        <div class="row">
                            <div class="col-12">
                                <h5 style="font-size: 10px">
                                    Define las tareas segun la importancia con los siguientes Items
                                    Seguidos de la descripcion.
                                </h5>
                            </div>
                        <div class="col-12">
                            <span class="badge badge-primary">Primary</span>
                            <span class="badge badge-secondary">Secondary</span>
                            <span class="badge badge-success">Success</span>
                            <span class="badge badge-danger">Danger</spa
                            <span class="badge badge-warning">Warning</span>
                            <span class="badge badge-info">Info</span>
                            <span class="badge badge-light">Light</span>
                            <span class="badge badge-dark">Dark</span>
                        </div>
                        </div>
                        
                        
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
    
@endsection

