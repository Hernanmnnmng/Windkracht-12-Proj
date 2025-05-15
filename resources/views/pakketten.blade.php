<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Pakketten | Windkracht-12</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>

  @include('partials.navbar')

  <main class="container">
    <h1>Lespakketten</h1>

    

    @foreach ($packages as $package)
  <div class="pakket">
    <h2>{{ $package->name }}</h2>
    <p>€{{ $package->price }} – {{ $package->duration_minutes / 60 }} uur</p>
    <p>{{ $package->description }}</p>
    <form method="GET" action="/reserve">
      <input type="hidden" name="package" value="{{ $package->id }}">
      <button type="submit" class="btn">Reserveer</button>
    </form>
  </div>
@endforeach

  </main>

</body>
</html>