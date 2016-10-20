@extends('layouts.main')

@section('title' , 'Add Submit')

@section('styles')
    {!!Html::style('plugins/chosen/chosen.css')!!}
@endsection

@section('content')
<div id="divEspacio" class="rox marg-main" style="margin-top:40px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Problems</div>
                    <div class="panel-body">


                        <div class="form-group">

                            <div id = "search" class="form-group">
                                <table style="border-collapse: separate;margin:0 auto;">
                                    <tr style="display:inline; border-spacing:10px;">
                                        <td>
                                            {!!Form::text('name',null,['id'=>'name','class'=>'form-control ','placeholder'=>'Title or ID'])!!}
                                        </td>
                                        <td>
                                            {!! Form::select('tag',$tags,null,['id'=>'tag', 'class' => 'form-control select-chosen','placeholder'=>'Select a tag']) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('level',$levels,null,['id'=>'level', 'class' => 'form-control select-chosen','placeholder'=>'Select a level']) !!}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" >
                                                <i class="fa fa-search" aria-hidden="true"></i> Search
                                            </button>
                                        </td>
                                    </tr>

                                </table>
                            </div>

                             <table class="table table-striped table-bordered table-hover table-condensed table-responsive">

                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;" >TITLE</th>
                                        <th style="text-align: center;" >SCORE</th>
                                        <th style="text-align: center;" >ACCURACY</th>
                                        <th style="text-align: center;" >SOLVED</th>
                                        <th style="text-align: center;" >SUBMISSIONS</th>
                                        <th style="text-align: center;" >SUBMIT</th>

                                    </tr>
                                </thead>

                                <tbody style="text-align: center;" >
                                    @foreach($problems as $problem)
                                        <tr>
                                            <td>{{ $problem->id }}</td>
                                            <td>{{ $problem->name }}</td>
                                            <td>{{ $problem->points }}</td>
                                            <td>0.0 %</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>{!! Html::decode(link_to_action('ProblemController@downloadDatasets', $title = '<i class="fa fa-paper-plane" aria-hidden="true"></i>', $parameters = ['id'=> $problem->id ], $attributes = [ ])) !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div style="text-align: center;">
                                {!!$problems->render()!!}
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!!Html::script('plugins/chosen/chosen.jquery.js')!!}
    
    <script type="text/javascript">  
        $('.select-chosen').chosen({
        });
    </script>
@endsection