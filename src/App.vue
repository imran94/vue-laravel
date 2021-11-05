<template>
  <header>
    <nav class="container container-nav">
      <h1 class="site-title nav-left">spense.</h1>
      <ul class="nav-center">
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/about">About</router-link></li>
      </ul>
      <ul class="nav-right">
        <li><a href="">Login</a></li>
        <li><a href="">Get Started</a></li>
      </ul>
    </nav>
  </header>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;

  font-size: 1.125rem;
  color: #707070;
  margin: 0;
}

header {
  padding: 1.5em 0;
  /*text-align: center;*/
}

/*nav {
	font-family: Ubuntu;
	font-weight: bold;
	font-size: 1rem;
}*/

nav ul {
  list-style: none;
  padding: 0;
  display: flex;
  /*	justify-content: center;*/
}

nav li {
  /*border: 2px dotted orange;*/
  margin: 0 0.6em;
}

nav a {
  text-decoration: none;
  color: #707070;
  font-weight: 700;
  padding: 0.25em 0;
}

nav a:hover,
nav a:focus {
  color: #1792d2;
  border-bottom: 1px solid #707070;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

.container {
  width: 90%;
  max-width: 1100px;
  margin: 0 auto;
}

.container-nav {
  display: flex;
  align-content: center;

  justify-content: space-between;
}

.site-title {
  font-family: "Lora", serif;
  font-weight: 400;
  font-size: 2rem;
  color: #143774;
  margin: 0;
}
</style>
