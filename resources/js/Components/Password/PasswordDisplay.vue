<template>
  <div class="form-row">
    <label for="password">Passwrod</label>
    <input :type="type" disabled v-model="password" />
    <input type="checkbox" @click="showPassword" value="show password" />
  </div>
</template>


<script>
import axios from "axios";

export default {
  props: {
    passwordLength: {
      required: true,
      default: 8,
    },
    passwordId: {
      required: true,
    },
  },

  data() {
    return {
      password: this.generateFakePassword(this.passwordLength),
      type: "password",
      error: null
    };
  },

  methods: {
    showPassword() {
      this.getPassword();
      this.type = this.type === "password" ? "text" : "password";
    },

    getPassword() {
      axios
        .get(`/api/password/${this.passwordId}/decrypt`)
        .then((res) => {
          if(res.status === 200){
            this.password = res.data.password;
          }
          else {
            this.error = res.data.error;
          }
        })
        .catch((err) => console.log(err));
    },

    generateFakePassword(passwordLength) {
       return `*`.repeat(passwordLength);
    },
  },

  mounted(){
    
  }
};
</script>