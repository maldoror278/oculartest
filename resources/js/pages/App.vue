<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand"> Blogs </router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <router-link to="/" class="nav-item nav-link">      Inicio  </router-link>
            <router-link to="/login" class="nav-item nav-link"> Login   </router-link>
        </div>

      </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
  </div>
</template>




