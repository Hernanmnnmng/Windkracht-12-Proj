<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Reservaties | Windkracht-12</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <main class="container">
        <h1>Mijn Reservaties</h1>

        @if ($reservations->isEmpty())
            <p>Je hebt nog geen reservaties gemaakt.</p>
        @else
        @foreach ($reservations as $reservation)
    <div class="pakket">
        <h2>{{ $reservation->lessonPackage->name }}</h2>
        <p>{{ $reservation->lessonPackage->description }}</p>
        <p>Datum: {{ $reservation->date }}</p>
        <p>Tijd: {{ $reservation->time }}</p>
        <p>Status: 
    @if ($reservation->status === 'pending')
        <span style="color: orange;">In afwachting</span>
    @elseif ($reservation->status === 'accepted')
        <span style="color: green;">Goedgekeurd</span>
    @elseif ($reservation->status === 'rejected')
        <span style="color: red;">Geweigerd</span>
    @endif
</p>

        {{-- cancel knopke --}}
        <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Weet je zeker dat je deze reservatie wilt annuleren?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Annuleer</button>
        </form>
    </div>         
@endforeach
        @endif
    </main>

</body>
</html>