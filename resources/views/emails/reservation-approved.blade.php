<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reservering Goedgekeurd</title>
</head>
<body>
    <h2>Hallo {{ $reservation->user->name }},</h2>

    <p>Goed nieuws! Je reservering voor <strong>{{ $reservation->lessonPackage->name }}</strong> is goedgekeurd.</p>

    <p><strong>Datum:</strong> {{ $reservation->date }}</p>
    <p><strong>Tijd:</strong> {{ $reservation->time }}</p>

    <p>We kijken ernaar uit je te zien bij Windkracht-12! 🌬️</p>

    <p>Met vriendelijke groet,<br>Team Windkracht-12</p>
</body>
</html>