<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!!Form::label('name','Title:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::text('name',null,['id'=>'name','class'=>'form-control ','placeholder'=>'Insert the problem name'])!!}
		 @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
	{!!Form::label('author','Author:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
        {!! Form::select('author',['1' => 'Miguel Angel mickemandujas ESCOM-IPN'],null,['id'=>'author', 'class' => 'form-control select-author','placeholder'=>'Select the author']) !!}
		@if ($errors->has('author'))
            <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
            </span>
        @endif
	</div>
</div>


<!--Description-->
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<div class="row">
	      <h4><label for="input" class="col-sm-10 col-sm-offset-1 label label-primary"><center>Problem Description</center></label></h4>
	</div>
	{!!Form::label('description','Description:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('description',null,['id'=>'description','class'=>'form-control textarea-content','placeholder'=>'Problem description...','rows'=> '15'])!!}
		 @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('input_specification') ? ' has-error' : '' }}">
	{!!Form::label('input_specification','Input specification:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('input_specification',null,['id'=>'input_specification','class'=>'form-control textarea-content','placeholder'=>'Input specification...','rows'=> '2'])!!}
		 @if ($errors->has('input_specification'))
            <span class="help-block">
                <strong>{{ $errors->first('input_specification') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('output_specification') ? ' has-error' : '' }}">
	{!!Form::label('output_specification','Output specification:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('output_specification',null,['id'=>'output_specification','class'=>'form-control textarea-content','placeholder'=>'Output specification...','rows'=> '2'])!!}
		 @if ($errors->has('output_specification'))
            <span class="help-block">
                <strong>{{ $errors->first('output_specification') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('sample_input') ? ' has-error' : '' }}">
	{!!Form::label('sample_input','Sample input:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('sample_input',null,['id'=>'sample_input','class'=>'form-control textarea-content','placeholder'=>'Sample input...','rows'=> '2'])!!}
		 @if ($errors->has('sample_input'))
            <span class="help-block">
                <strong>{{ $errors->first('sample_input') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('sample_output') ? ' has-error' : '' }}">
	{!!Form::label('sample_output','Sample output:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('sample_output',null,['id'=>'sample_output','class'=>'form-control textarea-content','placeholder'=>'Sample output...','rows'=> '2'])!!}
		 @if ($errors->has('sample_output'))
            <span class="help-block">
                <strong>{{ $errors->first('sample_output') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="form-group{{ $errors->has('hints') ? ' has-error' : '' }}">
	{!!Form::label('hints','Hints:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
		{!!Form::textArea('hints',null,['id'=>'hints','class'=>'form-control textarea-content','placeholder'=>'Hints...','rows'=> '2'])!!}
		 @if ($errors->has('hints'))
            <span class="help-block">
                <strong>{{ $errors->first('hints') }}</strong>
            </span>
        @endif
	</div>
</div>

<div class="col-md-2 col-md-offset-5">
	{!!link_to('#', $title='Save', $attributes = ['id'=>'register_problem_description', 'class'=>'form-control btn btn-primary'], $secure = null)!!}
</div>
<br>
<br>

<div class="col-md-6 col-md-offset-3">
	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
	        <strong><center>Data save successfully.</center></strong>
	</div>
</div>
<div id="msj-error" class=" form-control alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong id="msj"><center></center> </strong>
</div>

<!--Limits-->

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<div class="row">
	    <h4><label for="input" class="col-sm-10 col-sm-offset-1 label label-primary"><center>Limits</center></label></h4>
	</div>
	<br>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
            <div class="panel-heading"><strong><center>Limits</center></strong></div>
                <div class="panel-body">
					@include('problem.partials.limits')
				</div>
		</div>
		 @if ($errors->has('email'))
        	<span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
	</div>
</div>

<!--Datasets-->

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<div class="row">
	    <h4><label for="input" class="col-sm-10 col-sm-offset-1 label label-primary"><center>Datasets</center></label></h4>
	</div>
	<br>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
            <div class="panel-heading"><strong><center>Datasets</center></strong></div>
                <div class="panel-body">
					<div class="form-group{{ $errors->has('dataset') ? ' has-error' : '' }}">
					    {!!Form::label('dataset','Source code:',['class' => 'col-md-3 control-label file'])!!}
					    <div class="col-md-7">
					        {!! Form::file('dataset', array('multiple'=>true)) !!}
					        @if ($errors->has('dataset'))
					            <span class="help-block">
					                <strong>{{ $errors->first('dataset') }}</strong>
					            </span>
					        @endif
					     </div>
					</div>					
				</div>
		</div>

		<div class="checkbox">
		    <label><input type="checkbox" value=""><strong>Multidata</strong></label>
		</div>
		<div class="checkbox">
		    <label><input type="checkbox" value=""><strong>Enable</strong></label>
		</div>

		 @if ($errors->has('email'))
        	<span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
	</div>
</div>


<!--Languages-->

<div class="form-group{{ $errors->has('languages') ? ' has-error' : '' }}">
	<div class="row">
	    <h4><label for="input" class="col-sm-10 col-sm-offset-1 label label-primary"><center>Languages</center></label></h4>
	</div>
	<br>
	
	{!!Form::label('languages','Available Languages:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">


		<div class="row">
        	<div class="col-sm-3">
		    	<label><input type="checkbox" value="">&nbsp;&nbsp;&nbsp;All</label>
		    </div>
		    <div class="col-sm-3">
		    	<label><input type="checkbox" value="">&nbsp;&nbsp;&nbsp;C</label>
		    </div>
		    <div class="col-sm-3">
		    	<label><input type="checkbox" value="">&nbsp;&nbsp;&nbsp;C++</label>
		    </div>
		</div>

		
		<div class="row">
        	<div class="col-sm-3">
		    	<label><input type="checkbox" value="">&nbsp;&nbsp;&nbsp;Java</label>
		    </div>
		    <div class="col-sm-3">
		    	<label><input type="checkbox" value="">&nbsp;&nbsp;&nbsp;Python</label>
		    </div>
		</div>

		 @if ($errors->has('languages'))
        	<span class="help-block">
                <strong>{{ $errors->first('languages') }}</strong>
            </span>
        @endif
	</div>
</div>
               
<!--Tags-->

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
	<div class="row">
	    <h4><label for="input" class="col-sm-10 col-sm-offset-1 label label-primary"><center>Tags</center></label></h4>
	</div>
	<br>
	
	{!!Form::label('tags','Classification By Tags:',['class' => 'col-md-3 control-label'])!!}
	<div class="col-md-7">
        {!! Form::select('dificulty[]',$tags,null,['id'=>'author', 'class' => 'form-control select-tag','data-placeholder'=>'Select tags and their levels ' ,'multiple' => true]) !!}
		@if ($errors->has('tags'))
        	<span class="help-block">
                <strong>{{ $errors->first('tags') }}</strong>
            </span>
        @endif
	</div>
</div>
        
 