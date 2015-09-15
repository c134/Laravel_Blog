<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' =>'articleTitle']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::file('file',['class' => 'form-control', 'id' =>'fileUploadInput']) !!}
</div>

<div class="form-group">
    {!! Form::label('Url', 'Url:') !!}
    {!! Form::text('url', null ,['class' => 'form-control', 'id' =>'urlInput']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control', 'id' => 'submitButton']) !!}
</div>
