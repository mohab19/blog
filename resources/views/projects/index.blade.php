<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>blog</h2>

        <ul>
            @foreach($projects as $project)
            <li>{{ $project->title }}</li>
            @endforeach
        </ul>
    </body>
</html>
