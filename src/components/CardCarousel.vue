<template>
  <div>
    <div class="carousel-wrapper">
      <div class="carousel" data-flickity>
        <div class="carousel-cell">
          <h3 class="color-white mb-2">Monster Hunter World</h3>
          <img
            src="https://miotaku.com/wp-content/uploads/2018/03/Monster-Hunter-World-wallpaper.jpg"
          />
          <a class="more text-center">show more</a>
          <div class="arrow down"></div>
        </div>
        <div class="carousel-cell">
          <h3 class="color-white mb-2">Valorant</h3>
          <img
            src="https://assets.vg247.com/current//2020/03/valorant_art_3.jpg"
          />
          <a class="more text-center">show more</a>
          <div class="arrow down"></div>
        </div>
        <div class="carousel-cell">
          <h3 class="color-white mb-2">Resident Evil 2: REMAKE</h3>
          <img
            src="https://images5.alphacoders.com/942/thumb-1920-942283.png"
          />
          <a class="more text-center">show more</a>
          <div class="arrow down"></div>
        </div>
        <div class="carousel-cell">
          <h3 class="color-white mb-2">Horizon Zero Down</h3>

          <img
            src="https://images4.alphacoders.com/601/thumb-1920-601157.jpg"
          />
          <a class="more text-center">show more</a>
          <div class="arrow down"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardCarousel",
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