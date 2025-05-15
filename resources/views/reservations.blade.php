<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Reserveren | Windkracht-12</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>

  @include('partials.navbar')

  <main class="container">
    @if (session('error'))
  <div class="alert error" style="background-color: #fdd; color: #a00; padding: 10px; border: 1px solid #a00; border-radius: 4px; margin-bottom: 20px;">
    {{ session('error') }}
  </div>
@endif
    @guest
      <h1>Reserveren</h1>
      <p>Je moet ingelogd zijn om een reservering te maken.</p>
      <a href="{{ route('login') }}" class="btn">Log in</a>
    @endguest

    @auth
  @if ($selectedPackage)
    <div class="reservation-form">
      <img src="{{ asset('frontend/images/kitesurf-hero.jpg') }}" alt="Kitesurfen" style="width: 100%; border-radius: 8px; margin-bottom: 20px;">
      <h1>Reserveer: {{ $selectedPackage->name }}</h1>
      <p>{{ $selectedPackage->description }}</p>

      <form action="{{ url('/reserve') }}" method="POST">
        @csrf
        <input type="hidden" name="lesson_package_id" value="{{ $selectedPackage->id }}">

        <div>
          <label for="date">Datum:</label>
          <!-- I made sure the date was only selectable from present time to within 1 month and a half backend validation also works -->
          <input type="date" id="date" name="date" required min="{{ now()->format('Y-m-d') }}" max="{{ now()->addDays(45)->format('Y-m-d') }}">
        </div>

        <div>
          <label for="time">Tijd:</label>
          <select id="time" name="time" required>
            <option value="09:00">09:00 – 12:00</option>
            <option value="13:00">13:00 – 16:00</option>
            <option value="12:00">Zaterdag: 12:00 – 17:00</option>
          </select>
        </div>

        <button type="submit" class="btn">Bevestig Reservatie</button>
      </form>
    </div>
  @else
    <p>Geen lespakket geselecteerd. Ga terug naar <a href="{{ route('pakketten') }}">lespakketten</a>.</p>
  @endif
@endauth
<div style="margin-top: 30px;">
    <a href="{{ route('mijn-reservaties') }}" class="btn">Mijn Reservaties</a>
</div>
  </main>

</body>
</html>