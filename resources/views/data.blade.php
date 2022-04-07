<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Version</title>
</head>
<body>
    @if($version)
        <pre>
        {{json_encode($version, JSON_PRETTY_PRINT)}}
        </pre>
    @else
        {{$status}}
    @endif
    <a href="{{url('/')}}">Make a new request</a>
</body>
</html>