<template>
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-10">
        <div class="card text-white">
          <div class="content">
            <h2>My Agency</h2>
            <h2>My Agency</h2>
          </div>
          <div class="card-header">
            <h4 class="mb-0">Chiedi qui il tuo preventivo</h4>
          </div>

          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">La tua email</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleFormControlInput1"
                  placeholder="name@example.com"
                />
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1"
                  >Descrivi la tua richiesta</label
                >
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                ></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
body {
  height: 100vh;
  background-image: url(https://soak.co/wp-content/uploads/2019/01/blue-background.jpg);
  background-size: cover;
  .card {
    background-color: #293a4e;
    .form-control {
      border-color: rgb(26, 14, 14);
    }
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
