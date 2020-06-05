import axios from 'axios';
const url = "http://localhost/proyecto-i2/api/";

export default {
    createAccount: function (userData) {
        /*
      for (var value of userData.values()) {
          console.log(value);
        }*/

        var options = {
            method: "POST",
            headers: { "content-type": "multipart/form-data" },
            data: userData,
            url: url + "/signup.php"
        };
        axios(options)
            .then(response => {
                response.data;
            })
            .catch(error => {
                //  this.errors.push(error);
                console.log(error);
            });
    },

    login(userData) {

         axios
            .post(url + "/signin.php?request=getUser", userData, {
                headers: { "content-type": "multipart/form-data" }
            })
            .then(response => {
                response.data;
                /*   if (response.data.error) {
                      this.errorMessage = response.data.message;
                      alert(this.errorMessage);
                  } else { */

                // this.userPayload.account_type = response.data.user.account_type;
                //  this.userPayload.username = response.data.user.username;
                //  this.userPayload.email = response.data.user.email;
                //  console.log(response.body);

                // localStorage.setItem("token", this.userPayload);

                /*           console.log(localStorage.getItem("token"));
      
                          if (response.status === 200 && localStorage.token) {
                              console.log("session start");
      
                              this.$session.start();
                              this.$session.set("jwt", localStorage.token);
      
                              console.log(this.$session);
      
                              //     axios.defaults.headers.common.Authorization["Authorization"] =
                              //       "Bearer " + localStorage.token;
                              this.$router.push("/");
                          } */
                //  }
            })
            .catch(error => {
                //  this.errors.push(error);
                console.log(error);
            });
    }
}