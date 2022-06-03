<template>
  <section class="h-100">
    <a class="text-decoration-none admin" href="/admin"
      ><i class="fa-solid fa-user fa-2x"></i
    ></a>
    <div class="container h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-10">
          <div class="card shadow text-white">
            <div class="content">
              <h2>My Agency</h2>
              <h2>My Agency</h2>
            </div>
            <div class="card-header">
              <h4 class="mb-0">Chiedi qui il tuo preventivo</h4>
            </div>

            <div class="card-body">
              <!-- Alert -->

              <div
                v-if="hasErrors || successAlert"
                class="alert text-center my-3 mx-auto"
                :class="hasErrors ? 'alert-danger' : 'alert-success'"
                role="alert"
              >
                <div v-if="successAlert">
                  {{ successAlert }}
                </div>
                <ul class="p-0" v-if="hasErrors">
                  <li
                    class="list-unstyled"
                    v-for="(error, key) in errors"
                    :key="key"
                  >
                    {{ error }}
                  </li>
                </ul>
              </div>
              <div>
                <div class="form-group">
                  <label for="email">La tua email</label>
                  <input
                    type="email"
                    class="form-control shadow"
                    :class="{ 'is-invalid': errors.email }"
                    id="email"
                    placeholder="name@example.com"
                    v-model.trim="form.email"
                  />
                </div>

                <div class="form-group">
                  <label for="description">Descrivi la tua richiesta</label>
                  <textarea
                    class="form-control shadow"
                    :class="{ 'is-invalid': errors.request }"
                    id="request"
                    rows="3"
                    v-model.trim="form.request"
                  ></textarea>
                </div>
                <button class="form-button" @click="sendQuote()">
                  <span v-if="!isLoading">Invia</span>
                  <span
                    v-else
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                  ></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { isEmpty } from "lodash";
export default {
  data() {
    return {
      form: {
        email: "",
        request: "",
        user_id: 1,
      },
      errors: {},
      isLoading: false,
      successAlert: null,
      match:
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
    };
  },
  methods: {
    validateForm() {
      this.successAlert = "";
      const errors = {};
      if (!this.form.email) errors.email = "La Mail è obbligatoria";
      if (!this.form.request)
        errors.request = "Il testo del messaggio è obbligatorio";

      if (this.form.email && !this.form.email.match(this.match)) {
        errors.email = "La mail non è valida";
      }

      this.isLoading = false;
      this.errors = errors;
    },

    sendQuote() {
      this.validateForm();

      if (!this.hasErrors) {
        this.isLoading = true;
        axios
          .post("http://127.0.0.1:8000/api/quote", this.form)
          .then((res) => {
            this.form.email = "";
            this.form.request = "";
            this.successAlert = "Preventivo inviato con successo";
          })
          .catch((err) => {
            console.error(err);
            this.errors = { error: "Si è verificato un errore" };
          })
          .then(() => {
            this.isLoading = false;
            console.log("chiamata terminata");
          });
      }
    },
  },
  computed: {
    hasErrors() {
      return !isEmpty(this.errors);
    },
  },
};
</script>

<style lang="scss">
body {
  height: 100vh;
  background-image: url(https://soak.co/wp-content/uploads/2019/01/blue-background.jpg);
  background-size: cover;
  .admin {
    position: absolute;
    top: 10px;
    right: 10px;
  }
  .card {
    background-color: #293a4e;
    label {
      font-size: 1.1rem;
    }
    .form-button {
      background-color: #03a9f4;
      font-size: 1.1rem;
      border: 0;
      border-radius: 50px;
      padding: 8px 22px;
      transition: all 0.4s;

      &:hover {
        background-color: rgb(14, 4, 106);
        color: white;
        /* transform: scale(1.2); */
        animation: pulsate 0.5s ease-in-out 2 both;
      }
    }
  }
}
/* Animazione bottone */

@keyframes pulsate {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

/* Testo My agency */
.content {
  position: relative;
}

.content h2 {
  color: #fff;
  font-size: 8em;
  bottom: 100%;
  right: 20%;
  position: absolute;
}

.content h2:nth-child(1) {
  color: transparent;
  -webkit-text-stroke: 2px #03a9f4;
}

.content h2:nth-child(2) {
  color: #03a9f4;
  animation: animate 4s ease-in-out infinite;
}

@keyframes animate {
  0%,
  100% {
    clip-path: polygon(
      0% 45%,
      16% 44%,
      33% 50%,
      54% 60%,
      70% 61%,
      84% 59%,
      100% 52%,
      100% 100%,
      0% 100%
    );
  }

  50% {
    clip-path: polygon(
      0% 60%,
      15% 65%,
      34% 66%,
      51% 62%,
      67% 50%,
      84% 45%,
      100% 46%,
      100% 100%,
      0% 100%
    );
  }
}
</style>
