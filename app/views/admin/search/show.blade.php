<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Search Names</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
    $(function()
      {
         $( "#q" ).autocomplete({
          source: "{{URL('search/autocomplete')}}",
          minLength: 3,
          select: function(event, ui) {
            $('#q').val(ui.item.value);
          }
        });
      });
  </script>
</head>
<body>
 

<div>
  {{ Form::open(['action' => ['SearchController@searchUser'], 'method' => 'GET']) }}
    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Enter name'])}}
    {{ Form::submit('Search', array('class' => 'button expand')) }}
{{ Form::close() }}
</div>
 
 
</body>
</html>