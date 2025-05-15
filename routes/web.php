<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\LessonPackage;

Route::get('/reserve', function (Request $request) {
    $packageId = $request->query('package');
    $selectedPackage = LessonPackage::find($packageId);

    return view('reservations', compact('selectedPackage'));
})->middleware('auth')->name('reservations');

Route::post('/reserve', function (Request $request) {
    $request->validate([
        'date' => 'required|date',
        'time' => 'required',
        'lesson_package_id' => 'required|exists:lesson_packages,id',
    ]);

    // Prevent same user from booking same lesson at same date and time
    $alreadyBooked = Reservation::where('user_id', Auth::id())
        ->where('lesson_package_id', $request->lesson_package_id)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->exists();

    if ($alreadyBooked) {
        return back()->with('error', 'Je hebt al een reservering voor dit moment.');
    }

    // Check max student limit
    $existing = Reservation::where('lesson_package_id', $request->lesson_package_id)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->count();

    $max = LessonPackage::find($request->lesson_package_id)->max_students;

    if ($existing >= $max) {
        return back()->with('error', 'Dit tijdslot is al volgeboekt. Kies een andere tijd.');
    }

    Reservation::create([
        'user_id' => Auth::id(),
        'lesson_package_id' => $request->lesson_package_id,
        'date' => $request->date,
        'time' => $request->time,
        'status' => 'pending',
    ]);

    return redirect('/mijn-reservaties')->with('success', 'Je reservatie is aangemaakt!');
})->middleware('auth');

Route::get('/mijn-reservaties', function () {
    $reservations = Reservation::where('user_id', Auth::id())->with('lessonPackage')->get();

    return view('mijn-reservaties', compact('reservations'));
})->middleware('auth')->name('mijn-reservaties');

Route::delete('/reservations/{id}', function ($id) {
    $reservation = Reservation::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $reservation->delete();

    return redirect()->route('mijn-reservaties')->with('success', 'Reservatie geannuleerd.');
})->middleware('auth')->name('reservations.cancel');

Route::get('/pakketten', function () {
    $packages = LessonPackage::all(); // Get all pakketten from DB
    return view('pakketten', compact('packages'));
})->name('pakketten');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/beheer', function () {
    $user = Auth::user();

    if (! $user->isAdmin() && ! $user->isWorker()) {
        abort(403, 'Toegang geweigerd.');
    }

    $reservations = Reservation::with('lessonPackage', 'user')
        ->where('status', 'pending')
        ->orderBy('date')
        ->get();

    return view('beheer', compact('reservations'));
})->middleware('auth')->name('beheer');

Route::patch('/reservations/{id}/approve', function ($id) {
    $reservation = Reservation::findOrFail($id);

    if (! Auth::user()->isAdmin() && ! Auth::user()->isWorker()) {
        abort(403);
    }

    $reservation->status = 'accepted';
    $reservation->save();

    // TODO: send confirmation email to user

    return redirect()->route('beheer')->with('success', 'Reservatie geaccepteerd.');
})->middleware('auth')->name('reservations.approve');

Route::patch('/reservations/{id}/reject', function ($id) {
    $reservation = Reservation::findOrFail($id);

    if (! Auth::user()->isAdmin() && ! Auth::user()->isWorker()) {
        abort(403);
    }

    $reservation->status = 'rejected';
    $reservation->save();

    // TODO: optionally send rejection email

    return redirect()->route('beheer')->with('success', 'Reservatie geweigerd.');
})->middleware('auth')->name('reservations.reject');
require __DIR__.'/auth.php';
