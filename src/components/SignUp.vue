<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
    <!--         v-on:submit="signUp" -->
            <form class="form-signin">
              <div class="form-label-group">
                <select
                  name="account_type"
                  class="custom-select custom-select-lg mb-3"
                  v-model="user.account_type"
                  required
                >
                  <option selected default value disabled>Choose...</option>
                  <option value="1">Administrator</option>
                  <option value="2">User</option>
                </select>
              </div>

              <hr class="my-4" />

              <div class="form-label-group">
                <input
                  type="text"
                  id="inputUserame"
                  class="form-control"
                  placeholder="Username"
                  name="username"
                  v-model="user.username"
                  required
                  autofocus
                />
                <label for="inputUserame">Username</label>
              </div>

              <div class="form-label-group">
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  placeholder="Email address"
                  name="email"
                  v-model="user.email"
                  required
                />
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input
                  type="password"
                  id="inputPassword"
                  class="form-control"
                  placeholder="Password"
                  name="password"
                  v-model="user.password"
                  required
                />
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input
                  type="password"
                  id="inputConfirmPassword"
                  class="form-control"
                  placeholder="Password"
                  name="password_confirm"
                  v-model="user.password_confirm"
                  required
                />
                <label for="inputConfirmPassword">Confirm password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase mt-50" type="submit">
                Create
                my Account!
              </button>
              <router-link class="d-block text-center mt-2 medium color-black" to="/SignIn">
                <strong>ALREADY HAVE AN ACCOUNT?</strong>
              </router-link>
            </form>
            <div class="row">
              <span class="text-danger medium mx-auto"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Authentication from "../js/Authentication.js";
export default {
  name: "sign-up",
  data() {
    return {
      user: {
        account_type: "",
        username: "",
        email: "",
        password: "",
        password_confirm: ""
      }
    };
  },
  async created() {
    if (this.$store.getters.isLoggedIn) {
      this.$router.push("/Profile");
    }
  },
  methods: {
    async signUp(submitEvent) {
      submitEvent.preventDefault();
      // console.log(this.user.username);
      var userData = this.toFormData(this.user);
      await Authentication.createAccount(userData);
    },
    //para crear un ojeto form data para axios
    toFormData: function(obj) {
      var formData = new FormData();
      for (var key in obj) {
        formData.append(key, obj[key]);
      }
      return formData;
    },
    clearFields() {
      this.user = {
        account_type: "",
        username: "",
        email: "",
        password: "",
        password_confirm: ""
      };
    }
  }
};
</script>