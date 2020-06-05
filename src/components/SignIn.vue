<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Sign in</h5>
            <hr class="my-4" />

            <form class="form-signin">
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

              <button
                class="btn btn-lg btn-primary btn-block text-uppercase mt-50"
                type="submit"
              >Sign in</button>

              <router-link class="d-block text-center mt-2 medium color-black" to="/SignUp">
                <strong>CREATE ACCOUNT?</strong>
              </router-link>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import jwt from "jsonwebtoken";
const url = "http://localhost/proyecto-i2/api/";
export default {
  name: "sign-in",
  data() {
    return {
      user: {
        username: "",
        password: ""
      },
      userExists: "",
      userPayload: {
        account_type: "",
        username: "",
        email: ""
      },
      errorMessage: ""
    };
  },
  //Si el usuario está logueado no tiene acceso
  async created() {
    if (this.$store.getters.isLoggedIn) {
      this.$router.push("/Profile");
    }
  },
  methods: {
    //USAR THIS. EN LOS METODOS O NO SIRVE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    async handleSubmit(submitEvent) {
      submitEvent.preventDefault(); //previene el default submit del form

      this.verifyUser(this.user.username).then(p_verification => {
        //   alert(this.userExists);
        if (this.userExists == 1) {
          this.login().then(p_access => {
            //   console.log(this.userPayload);
            if (this.userPayload.account_type) {
              /*        alert(
                "Logged in: welcome " +
                  this.userPayload.account_type +
                  this.userPayload.email +
                  this.userPayload.username

                  //props
              ); */
            }
          });
        } else {
          alert("Error, wrong data or account doesn't exist!");
        }
      });
    },
    //para crear un ojeto form data para axios
    toFormData(obj) {
      var formData = new FormData();
      for (var key in obj) {
        formData.append(key, obj[key]);
      }
      return formData;
    },
    //verificar que el usuario existe
    async verifyUser(username) {
      await axios
        .get(url + "/signin.php?request=verify&username=" + username)
        //El response con arrow function si guarda los datos, sino no los asigna a la variable
        .then(response => {
          this.userExists = response.data.verifyUser;
        })
        .catch(error => {
          //  this.errors.push(error);
          console.log(error);
        });
    },
    async login() {
      var userData = this.toFormData(this.user); //crea el formData
      await axios
        .post(url + "/signin.php?request=getUser", userData, {
          headers: { "content-type": "multipart/form-data" }
        })
        .then(response => {
          if (response.data.error) {
            this.errorMessage = response.data.message;
            alert(this.errorMessage);
          } else {
            this.userPayload.account_type = response.data.user.account_type;
            this.userPayload.username = response.data.user.username;
            this.userPayload.email = response.data.user.email;
            console.log(response.body);

            const token = jwt.sign(
              {
                account_type: response.data.user.account_type,
                username: response.data.user.username,
                email: response.data.user.email
              },
              "SECRETKEY",
              {
                expiresIn: "1h"
              }
            );
            const user = this.userPayload;
            this.$store.dispatch("login", { token, user });
            this.$router.push("/profile");
          }
        })
        .catch(error => {
          //  this.errors.push(error);
          console.log(error);
        });
    }
  }
};
</script>