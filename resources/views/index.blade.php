<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Windkracht-12 | Kitesurfschool</title>
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
@include('partials.navbar')



<header class="hero-slider">
  <div class="slide active" style="background-image: url('/frontend/images/hero.jpg');">
    <div class="hero-content">
      <h1>Welkom bij Windkracht-12</h1>
      <p>Ervaar de kracht van de wind met onze kitesurflessen</p>
    </div>
  </div>
  <div class="slide" style="background-image: url('/frontend/images/hero2.jpg');">
    <div class="hero-content">
      <h1>Professionele instructeurs</h1>
      <p>Met jarenlange ervaring op de Nederlandse kust</p>
    </div>
  </div>
  <div class="slide" style="background-image: url('/frontend/images/hero3.jpg');">
    <div class="hero-content">
      <h1>Boek eenvoudig online</h1>
      <p>Automatisch, veilig en snel je les reserveren</p>
    </div>
  </div>
</header>




  <section id="over">
    <div class="container">
      <h2>Over Windkracht-12</h2>
      <p>Windkracht-12 bestaat al 8 jaar en biedt kwalitatieve kitesurflessen op locaties als Zandvoort, Scheveningen en meer. Onze ervaren instructeurs helpen je veilig en plezierig het water op.</p>
    </div>
  </section>

  <section id="pakketten">
    <div class="container">
      <h2>Lespakketten</h2>
      <div class="pakket">
        <h3>Privéles (2,5 uur)</h3>
        <p>€175,- inclusief materiaal</p>
        <p>1 persoon | 1 dagdeel</p>
      </div>
      <div class="pakket">
        <h3>Duo Kiteles (3,5 uur)</h3>
        <p>€135,- per persoon</p>
        <p>Max. 2 personen | 1 dagdeel</p>
      </div>
      <div class="pakket">
        <h3>Duo Lespakket (3 lessen)</h3>
        <p>€375,- per persoon</p>
        <p>3 dagdelen | inclusief materiaal</p>
      </div>
      <div class="pakket">
        <h3>Duo Lespakket (5 lessen)</h3>
        <p>€675,- per persoon</p>
        <p>5 dagdelen | inclusief materiaal</p>
      </div>
    </div>
  </section>

  <section id="reserveren">
    <div class="container">
      <h2>Reserveren</h2>
      <p>Boek nu eenvoudig je les via ons online reserveringssysteem en ontvang een bevestiging per e-mail.</p>
      <a href="/login" class="btn">Login om te reserveren</a>
    </div>
  </section>

  <script>
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slide');

  function showNextSlide() {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
  }

  setInterval(showNextSlide, 5000); // 5s per slide
</script>

<style>
	
</style>

</body>
</html>

