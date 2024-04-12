<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>
</head>
<body>
<h1>News Details</h1>
@if(isset($response))
    <div>
        <h2>{{ $response }}</h2>
    </div>
@else
    <p>No news details available.</p>
@endif
</body>
</html>
