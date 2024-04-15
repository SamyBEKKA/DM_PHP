<?php 
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/layout/nav.php';
// la page qui m'aura pris et faire perdre le plus de temps.
?>
<!-- Carousel wrapper -->
<div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark " data-mdb-ride="carousel" data-mdb-carousel-init>
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="1"
      aria-label="Slide 1"
    ></button>
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="2"
      aria-label="Slide 1"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="images/disposition-articles-voyage-au-dessus-vue.jpg" class="d-block w-100" alt="Motorbike Smoke"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="images/paris-city-skyline-rooftop-view-with-river-seine-night-france.jpg" class="d-block w-100" alt="Mountaintop"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="images/vue-celebre-plage-palombaggia-au-lever-du-soleil.jpg" class="d-block w-100" alt="Woman Reading a Book"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->

<section class="container"> <!-- ICI on met si on veut un backgroud à la section en ajoutant sa class -->
            <div class=" container justify-content-center"> <!-- container si on touche pas container-fluid si on touche -->
                <h1>Hello Voyage</h1>
                <div class=" align-self-center">
                    <div class="col-lg mb-4">
                        <div class="border mb-4">
                          <h2>Présentation</h2>
                            <p>Lorem ipsum dolor sit amet. Et fuga ipsum non laboriosam dolorum sed voluptatibus possimus a galisum repellat aut unde recusandae rem aspernatur expedita. Aut repellat iste At nulla saepe et error iste. Sit nihil 
                              reprehenderit cum voluptas iste ut consequuntur magnam ex sint consequatur qui ducimus atque qui tempora laborum et labore aspernatur? Eum recusandae corrupti qui accusamus neque eos possimus aliquam et magnam maiores sit internos minus. </p><p>Qui sequi voluptas nam delectus quaerat hic autem labore est quia ipsam. Est ipsum enim aut consequuntur quod qui ipsam tenetur cum tempore obcaecati non commodi repellat et rerum incidunt. Ab molestiae optio ut facere inventore et itaque eius non fuga iste At officiis possimus qui optio culpa qui Quis placeat. </p><p>Hic expedita molestias est ducimus ipsum qui dolorum voluptatem sit blanditiis repellendus ab dignissimos distinctio est nesciunt quis. Sed error nihil eos provident totam sit laudantium architecto aut impedit rerum est temporibus debitis. Est molestiae laudantium ut enim quia est error facilis ut aliquid architecto non ipsam voluptatem.</p>
                        </div>
                    </div>
                    <div class="col-lg mb-4">
                        <div class="border mb-4">
                            <h2>Articles</h2>
                        </div>
                    </div>
                    <div class="col-lg mb-4">
                        <div class="border mb-4">
                            <h2>Commentaires</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
require_once __DIR__ . '/layout/footer.php';

?>