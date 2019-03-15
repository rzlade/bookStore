<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <b-navbar type="dark" variant="dark">
        <b-navbar-nav>
          <b-navbar-brand href="#">BukuCuy!</b-navbar-brand>

          <!-- Navbar dropdowns -->
          <b-nav-item-dropdown text="Buku" right>
            <b-dropdown-item href="/buku">Stok Buku</b-dropdown-item>
            <b-dropdown-item href="/add">Tambah Buku</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-navbar>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  /* margin-top: 60px; */
}
</style>
