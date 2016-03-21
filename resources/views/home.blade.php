@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Keep</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('keep.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('keep') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nuevo Keep</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="keep" value="{{ old('keep') }}">
                                @if ($errors->has('keep'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('keep') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Lista</div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="40">ID</th>
                                <th>No olvidar</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keeps as $keep)
                            <tr @if($keep->status == 'full') class='text-muted' title="completada" @endif>
                                <td width="40">{{ $keep->id }}</td>
                                <td>{{ $keep->keep }}</td>
                                <td width="40">
                                    <form action="{{ route('keep.update', $keep->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button class="btn btn-primary">
                                            @if($keep->status === 'full')
                                            <i class="glyphicon glyphicon-eye-open" title="Abrir"></i>
                                            @else
                                            <i class="glyphicon glyphicon-check" title="Terminada"></i>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td width="90">
                                    <form action="{{ route('keep.destroy', $keep->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    Tabla de keep
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
