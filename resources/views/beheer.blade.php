<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Beheer Reservaties | Windkracht-12</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>

@include('partials.navbar')

<main class="container">
    <h1>Beheer Reservaties</h1>

    @if ($reservations->isEmpty())
        <p>Er zijn momenteel geen openstaande reservaties.</p>
    @else
        @foreach ($reservations as $reservation)
            <div class="pakket">
                <h2>{{ $reservation->lessonPackage->name }}</h2>
                <p>{{ $reservation->lessonPackage->description }}</p>
                <p>Geboekt door: {{ $reservation->user->name }} ({{ $reservation->user->email }})</p>
                <p>Datum: {{ $reservation->date }} – Tijd: {{ $reservation->time }}</p>

                <form method="POST" action="{{ route('reservations.approve', $reservation->id) }}" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn">Accepteer</button>
                </form>

                <form method="POST" action="{{ route('reservations.reject', $reservation->id) }}" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je deze reservatie wilt weigeren?');">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn">Weiger</button>
                </form>
            </div>
        @endforeach
    @endif
</main>

</body>
</html>