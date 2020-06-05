<template>
  <div v-if="account_type === 'ADMIN'">
    <div class="col-2">
      <h2 class="sec-title display-4 text-center text-uppercase">{{ username }}</h2>
    </div>

    <hr />
    <div class="row">
      <div class=" list-panel">
        <div class="list-group" id="list-tab" role="tablist">
          <a
            class="list-group-item list-group-item-action active"
            id="list-add-game-list"
            data-toggle="list"
            href="#list-add-game"
            role="tab"
            aria-controls="add-game"
          >Add Game</a>
          <a
            class="list-group-item list-group-item-action"
            id="list-update-game-list"
            data-toggle="list"
            href="#list-update-game"
            role="tab"
            aria-controls="update-game"
          >Update Game</a>
          <a
            class="list-group-item list-group-item-action"
            id="list-delete-game-list"
            data-toggle="list"
            href="#list-delete-game"
            role="tab"
            aria-controls="delete-game"
          >Delete Game</a>
          <a
            class="list-group-item list-group-item-action bg-blue color-white"
            id="list-logout-list"
            data-toggle="list"
            href="#list-logout"
            role="tab"
            aria-controls="logout"
            v-on:click="logout"
          >Log Out</a>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
<!-- Add game -->
          <div
            class="tab-pane fade show active"
            id="list-add-game"
            role="tabpanel"
            aria-labelledby="list-add-game-list"
          >
            <div class="">
              <div class="card-body">
                <h5 class="card-title text-center animate__animated animate__fadeInDown">Add a new Game</h5>
                <hr class="my-4" />
                <form class="form-signin">
                  <div class="row animate__animated animate__bounceInRight animate__delay-1000ms">
                    <div class="col-md-3">
                      <figure class="figure text-center">
                        <img
                          :src="imageData"
                          class="figure-img img-fluid rounded thumb-small text-center"
                          alt="Game Image."
                        />
                        <figcaption class="figure-caption">
                          <div class="custom-file">
                            <small>
                              <small>
                                <input
                                  type="file"
                                  class="custom-file-input"
                                  id="imgUpload"
                                  accept="image/*"
                                  v-on:change="previewImage"
                                />
                                <label class="custom-file-label" for="imgUpload">Choose file</label>
                              </small>
                            </small>
                          </div>
                        </figcaption>
                      </figure>
                    </div>

                    <div class="col-md-10 ">
                      <div class="row ">
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label ">Title:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.title"
                                placeholder="Title of the game"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Genre:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.genre"
                                placeholder="Game genre"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Publisher:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.publisher"
                                placeholder="Publisher company"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Developer:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.developer"
                                placeholder="Developer company"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Platforms:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.platform"
                                placeholder="Supported platforms"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Released on:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.released_on"
                                placeholder="Release year"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Multiplayer:</label>
                            <div class="col-md-9">
                              <select
                                name="multiplayer"
                                class="custom-select custom-select mb-3"
                                v-model="game.multiplayer"
                                required
                              >
                                <option selected default value disabled>Choose...</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Trailer video:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.video_link"
                                placeholder="Link of the video trailer"
                              />
                            </div>
                          </div>
                        </div>
                        <label for class="col-md-3 col-form-label">Description:</label>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <textarea
                                name="description"
                                id="gameDescription"
                                cols="10"
                                rows="7"
                                class="form-control"
                                v-model="game.description"
                                maxlength="500"
                                wrap="soft"
                                placeholder="Synopsis / Requirements"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-end">
                    <div class="col-6 animate__animated animate__backInUp animate__delay-1000ms">
                      <button
                        class="btn btn-lg btn-primary btn-block text-uppercase mt-50"
                        type="button"
                      >Clear</button>
                    </div>
                    <div class="col-6 animate__animated animate__backInUp animate__delay-1000ms">
                      <button
                        class="btn btn-lg btn-primary btn-block text-uppercase mt-50"
                        type="submit"
                      >Add game</button>
                    </div>
                  </div>
                  <hr />
                </form>
              </div>
            </div>
          </div>
<!-- Update game -->
          <div
            class="tab-pane fade"
            id="list-update-game"
            role="tabpanel"
            aria-labelledby="list-update-game-list"
          >
          <div>
              <div class="card-body">
                <h5 class="card-title text-center animate__animated animate__fadeInDown">Update a Game</h5>
                <hr class="my-4" />
                <!-- Select game form -->
                <div class="row animate__animated animate__bounceInRight animate__delay-100ms">
                <form class="form-signin">  
                  <div class="form-label-group row">                    
                    <div class="col-7 col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                      <select
                      name="account_type"
                      class="custom-select custom-select-lg mb-3">
                      <option selected default value disabled>Choose a game...</option>
                      <option value="1">Game</option>
                      <option value="2">Game</option>
                      </select>                      
                    </div>

                    <div class="col-5 col-md-6 animate__animated animate__bounceInRight animate__delay-1000ms">
                        <button
                        class="btn btn-lg btn-success btn-block text-uppercase "
                        type="submit"
                        >Select game</button>
                      </div>                      
                  </div>
                </form>
                </div>

                <hr class="my-4" />
                <!-- Update form -->
                <form class="form-signin">
                  <div class="row animate__animated animate__bounceInRight animate__delay-100ms">
                    <div class="col-md-3 col-md-6 ">
                      <figure class="figure text-center">
                        <img
                          :src="imageData"
                          class="figure-img img-fluid rounded thumb-small text-center"
                          alt="Game Image."
                        />
                        <figcaption class="figure-caption">
                          <div class="custom-file">
                            <small>
                              <small>
                                <input
                                  type="file"
                                  class="custom-file-input"
                                  id="imgUpload"
                                  accept="image/*"
                                  v-on:change="previewImage"
                                />
                                <label class="custom-file-label" for="imgUpload">Choose file</label>
                              </small>
                            </small>
                          </div>
                        </figcaption>
                      </figure>
                    </div>
                    <div class="col-md-10">
                      <div class="row">
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Title:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.title"
                                placeholder="Title of the game"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Genre:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.genre"
                                placeholder="Game genre"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Publisher:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.publisher"
                                placeholder="Publisher company"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Developer:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.developer"
                                placeholder="Developer company"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Platforms:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.platform"
                                placeholder="Supported platforms"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Released on:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.released_on"
                                placeholder="Release year"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Multiplayer:</label>
                            <div class="col-md-9">
                              <select
                                name="multiplayer"
                                class="custom-select custom-select mb-3"
                                v-model="game.multiplayer"
                                required
                              >
                                <option selected default value disabled>Choose...</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 animate__animated animate__bounceInRight animate__delay-100ms">
                          <div class="form-group row">
                            <label for class="col-md-3 col-form-label">Trailer video:</label>
                            <div class="col-md-9">
                              <input
                                type="text"
                                class="form-control"
                                v-model="game.video_link"
                                placeholder="Link of the video trailer"
                              />
                            </div>
                          </div>
                        </div>
                        <label for class="col-md-3 col-form-label">Description:</label>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-md-12">
                              <textarea
                                name="description"
                                id="gameDescription"
                                cols="10"
                                rows="7"
                                class="form-control"
                                v-model="game.description"
                                maxlength="500"
                                wrap="soft"
                                placeholder="Synopsis / Requirements"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-end">
                    <div class="col-6">
                      <button
                        class="btn btn-lg btn-primary btn-block text-uppercase mt-50"
                        type="button"
                      >Clear</button>
                    </div>
                    <div class="col-6">
                      <button
                        class="btn btn-lg btn-primary btn-block text-uppercase mt-50"
                        type="submit"
                      >Update game</button>
                    </div>
                  </div>
                  <hr />
                </form>
              </div>
            </div>
          </div>
<!-- Delete game -->
          <div
            class="tab-pane fade"
            id="list-delete-game"
            role="tabpanel"
            aria-labelledby="list-delete-game-list"
          >
            <div>
              <div class="card-body">
                <h5 class="card-title text-center animate__animated animate__fadeInDown">Delete a Game</h5>
                <hr class="my-4" />
                <!-- Select game form -->
                <div class="row">
                <form class="form-signin">  
                  <div class="form-label-group">                    
                    <div class="col-lg-10 col-12  animate__animated animate__bounceInRight animate__delay-100ms">
                      <select
                      name="account_type"
                      class="custom-select custom-select-lg mb-5">
                      <option selected default value disabled>Choose a game...</option>
                      <option value="1">Game</option>
                      <option value="2">Game</option>
                      </select>                      
                    </div>

                    <div class="col-7 col-lg-4 animate__animated animate__zoomIn animate__delay-100ms">
                        <button
                        class="btn btn-lg btn-danger btn-block text-uppercase"
                        type="submit"
                        >Delete game</button>
                      </div>                      
                  </div>
                </form>
                </div>

                <hr class="my-4" />
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <h1 class="mt-50">NOTHING TO SHOW</h1>
    <button v-on:click="logout">LOG OUT</button>
  </div>
</template>
<script>
export default {
  name: "profile",
  data() {
    return {
      account_type: "ADMIN",
      username: "",
      email: "",
      imageData: "",
      game: {
        thumbnail: "",
        title: "",
        genre: "",
        publisher: "",
        developer: "",
        platform: "",
        released_on: "",
        multiplayer: "",
        description: "",
        video_link: ""
      }
    };
  },
  async created() {
    /*
    if (!this.$store.getters.isLoggedIn) {
      this.$router.push("/SignIn");
    }
    this.account_type = this.$store.getters.getUser.account_type;
    this.username = this.$store.getters.getUser.username;
    this.email = this.$store.getters.getUser.email;
    */
  },
  mounted() {
    //cargar juegos
  },
  methods: {
    logout() {
      this.$store.dispatch("logout");
      this.$router.push("/");
    },
    previewImage: function(event) {
      // Reference to the DOM input element
      var input = event.target;
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader();
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = e => {
          // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
          // Read image as base64 and set to imageData
          this.imageData = e.target.result;
          this.game.thumbnail = input.files[0];
          console.log(this.game.thumbnail);
        };
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0]);
      }
    }
  }
};
</script>