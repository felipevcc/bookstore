<template>
	<div v-if="Object.entries(errors).length > 0" role="alert" class="alert alert-danger alert-dismissible fade show mx-2 my-2">
		<ul>
			<li v-for="(error, index) in errors" :key="index">
				{{ error }}
			</li>
		</ul>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
</template>

<script>
export default {
	props: ['errors']
}
</script>
