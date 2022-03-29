<template>
    <div class="container">
		<HeaderPage />
		<main>
			<router-view/>	
		</main>
	</div>
</template>

<script>
import HeaderPage from './components/HeaderPage';

export default {
  name: 'App',
  components: {
    HeaderPage
  }
}
</script>

<style>
.bd-content{
	height: 92.7vh;
    overflow: hidden;
}
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
