@extends('layouts.main')

@section('title' , 'Update source')

@section('content')
<div id="divEspacio" class="rox marg-main" style="margin-top:40px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong><center>Update Source</center></strong></div>
                    <div class="panel-body">
						{!!Form::model($source,['route'=> ['source.update',$source->id],'method'=>'PUT','class' => 'form-horizontal'])!!}
						
                            @include('source.partials.source')

                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-5 row">
                                    {!!Form::button('<span class="glyphicon glyphicon-save"></span> Save', array('type' => 'submit', 'class' => 'form-control btn btn-primary'))!!}
                                </div>

                            </div>

                        {!!Form::close()!!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

