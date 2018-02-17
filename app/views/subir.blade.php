@extends ('admin/layout')

{{ Form::open(array(
     'url'=>'upload/', 
     'method' => 'post',
     'enctype'=>'multipart/form-data'
) )}}

{{ Form::file('archivo') }}
{{ Form::submit('subir') }}

{{ Form::close()}}