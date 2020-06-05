<template>
  <div class="test">
    <!-- directivas: para manipular la estructura del html -->
    <div v-html="myhtml "></div>
    <hr />
    <!-- directiva para hacer un if-else, para mostrar algo por ejemplo -->
    <div v-if="showTitle">
      <p>{{title}}</p>
    </div>
    <div v-else>
      <p>No se puede mostrar el titulo</p>
    </div>
    <hr />
    <!--  mostrando un elemento de array-->
    <div>{{tasks[0].title}}</div>

    <hr />
    <div>{{fullName}}</div>
    <hr />
    <!--    for array
    <ul>
      <li v-for="task in tasks">{{task.title}}</li>
    </ul>-->

    <!-- el v-model le indica al elemento que va a estar ligado a un dato -->
    <input type="text" v-model="user.firstName" />
    <button type="button" v-on:click="saludar(user.firstName)">Click me!</button>

    <hr />
    <!-- se peude poner con una tecla tambien por ejemplo: v-on:keyup.enter -->
    <input type="text" v-on:keyup="typing" />

    <hr />
    <!-- estas llaves dobles interpretan js -->
    <h1>{{title}}</h1>

    <div>{{ msg }}</div>

    <hr />
    <!-- representación directa -->
    {{myhtml}}
  </div>
</template>

<script>
export default {
  //datos js
  data() {
    return {
      title: "Hola Vue JS",
      myhtml: "<h3>enviando codigo html a través de js</h3>",

      //objeto
      user: {
        firstName: "Joe",
        lastName: "Anderson"
      },

      //cambiar para probar el if-else
      showTitle: true,

      //arreglo
      tasks: [{ title: "breakfast" }, { title: "launch" }, { title: "dinner" }]
    };
  },
  methods: {
    //metodos
    saludar(value) {
      alert("Hello " + value);
    },
    typing(evt) {
      console.log(evt.target.value);
    }
  },
  //para los datos  que estan cambiando
  computed: {
    fullName() {
      return this.user.firstName + " " + this.user.lastName;
    }
  },
  //los datos que recive de fuera
  props: {
    msg: {
      type: String,
      default: "default msg"
    }
  }
};
</script>

<style media="screen">
.test {
  background-color: #eee;
}
</style>