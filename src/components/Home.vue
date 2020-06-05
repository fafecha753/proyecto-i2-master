<template>
  <div>
    <Carousel />
    <div class="mx-auto mt-50">
      <div class="row">
        <div class="col align-self-center animate__animated animate__bounce">
          <h1 class="main-title display-1 text-center">
            <strong>MAIN TITLE</strong>
          </h1>
          <h2 class="sec-title display-4 text-center">Secondary title</h2>
        </div>
      </div>
      <div class="container mx-auto mt-50" >
        <p class="lead text-center">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis doloremque culpa aspernatur
          cumque
          similique nam exercitationem
          laboriosam eligendi vitae, eaque minima, mollitia pariatur repellendus libero, deserunt neque veniam
          esse. Ipsa!
        </p>
      </div>
      <div class="carousel-wrapper mb-4">
        <div class="carousel" data-flickity>
          <div class="carousel-cell" v-for="game in games" v-bind:key="games.id">
            <h3 class="color-white mb-2">{{game.title}}</h3>
            <img :src="game.image" />
            <div class="col-12 align-items-center mt-2">
              <p
                class="text-center small text-truncate font-weight-light color-white"
              >{{game.description}}</p>
            </div>
            <a class="more text-center" v-on:click="loadGame(game.id)">show more</a>
            <div class="arrow down"></div>
          </div>
        </div>
      </div>
      <div v-if="!this.hide" class="row align-items-center">
        <h2 class="sec-title display-4 text-center col-12">Title item - video</h2>
        <div class="video-container bg-black col-xl-12 mt-20">
          <div class="container embed-responsive embed-responsive-16by9 red-box">
            <iframe
              class="embed-responsive-item"
              src="https://www.youtube.com/embed/Ro6r15wzp2o?rel=0"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <div class="cover-large col-12">
          <img src="https://wallpaperaccess.com/full/2591303.jpg" class="img-fluid" alt="COVER" />
        </div>
        <div class="col-12 align-self-center bg-black">
          <div class="bg-white container title-card mx-auto align-items-center">
            <div class="col-12">
              <h3 class="main-title display-3 text-center font-weight-bold mt-100">Title</h3>
            </div>
            <div class="col-12 lead text-center mx-auto mt-5">
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates dignissimos, modi ipsum dolorum ullam tenetur libero dolor vero cumque ipsam molestiae consequatur suscipit tempora cupiditate. Molestiae saepe in incidunt non?</p>
            </div>
            <div>
              <p>text</p>
              <p>text</p>
              <p>text</p>
              <p>text</p>
              <p>text</p>
              <p>text</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import Footer from "./Footer.vue";

export default {
  name: "home",
  data() {
    return {
      hide: true,
      games: [
        {
          id: "1",
          title: "Monster Hunter World",
          genre: "action",
          description:
            "game description game description game description game description game description game description game description game description",
          publisher: "CAPCOM",
          multiplayer: "yes",
          image: "https://wallpaperaccess.com/full/2591303.jpg",
          video: "https://www.youtube.com/embed/Ro6r15wzp2o?rel=0"
        },
        {
          id: "2",
          title: "VALORANT",
          genre: "FPS",
          description:
            "game description game description game description game description game description game description game description game description",
          publisher: "Riot Games",
          multiplayer: "yes",
          image: "https://assets.vg247.com/current//2020/03/valorant_art_3.jpg",
          video: "https://www.youtube.com/embed/e_E9W2vsRbQ?rel=0"
        }
      ]
    };
  },
  components: {
    Carousel,
    Footer
  },
  methods: {
    loadGame(id) {
     // alert("game id:  " + id);
      this.hide = false;
    }
  },
  mounted() {
    let cardCarouselScript = document.createElement("script");
    cardCarouselScript.setAttribute(
      "src",
      "https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"
    );
    document.head.appendChild(cardCarouselScript);
  }
};
</script>