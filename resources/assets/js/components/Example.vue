<template>
  <div class="example">
    <img
      class="example-logo"
      src="~images/base-camp-logo.png"
      alt="Logo"
    >
    <p class="example-message">{{ message }}</p>
  </div>
</template>

<script>
export default {
	data() {
		return {
			message: 'This is example component'
		};
	}
};
</script>

<style lang="scss" scoped>
.example-logo {
	max-width: 200px;
}

.example-message {
	color: red;
}
</style>
