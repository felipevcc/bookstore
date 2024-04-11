<template>
	<div class="modal fade" id="book_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ is_create ? 'Crear' : 'Editar' }} libro</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<!-- Form -->
				<Form @submit="saveBook" :validation-schema="schema" ref="form">
					<div class="modal-body">
						<section class="row">

							<!-- Title -->
							<div class="col-12">
								<label for="title">Título</label>
								<Field name="title" v-slot="{ errorMessage, field }" v-model="book.title">
									<input type="text" id="title" v-model="book.title" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>

							<!-- Stock -->
							<div class="col-12 mt-2">
								<Field name="stock" v-slot="{ errorMessage, field }" v-model="book.stock">
									<label for="stock">Cantidad</label>
									<input type="number" id="stock" v-model="book.stock" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>

							<!-- Description -->
							<div class="col-12 mt-2">
								<Field name="description" v-slot="{ errorMessage, field }" v-model="book.description">
									<label for="description">Descripción</label>
									<textarea v-model="book.description" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" id="description" rows="3" v-bind="field"></textarea>
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>

							<!-- Author -->
							<div class="col-12 mt-2">
								<Field name="author" v-slot="{ errorMessage, field }" v-model="author">
									<label for="author">Autor</label>
									<v-select :options="authors_data" label="name" v-model="author" :reduce="author => author.id" v-bind="field" placeholder="Seleccione autor" :clearable="false" :class="`${errorMessage ? 'is-invalid' : ''}`">
									</v-select>
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>

							<!-- Category -->
							<div class="col-12 mt-2" v-if="load_category">
								<Field name="category" v-slot="{ errorMessage, field, valid }" v-model="category">
									<label for="category">Categoría</label>
									<v-select id="category" :options="categories_data" v-model="category" :reduce="category => category.id" v-bind="field" label="name" placeholder="Selecciona categoria" :clearable="false" :class="`${errorMessage ? 'is-invalid' : ''}`">
									</v-select>
									<span class="invalid-feedback" v-if="!valid">{{ errorMessage }}</span>

								</Field>
							</div>
						</section>
					</div>

					<!-- Buttons -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</Form>
			</div>
		</div>
	</div>
</template>

<script>
	import { Field, Form } from 'vee-validate'
	import * as yup from 'yup'

	export default {
		props: ['authors_data'],
		components: {
			Field,
			Form
		},
		computed: {
			schema() {
				return yup.object({
					title: yup.string().required(),
					stock: yup.number().required().positive().integer(),
					description: yup.string(),
					author: yup.string().required(),
					category: yup.string().required()
				})
			}
		},
		data() {
			return {
				is_create: true,
				book: {},
				author: null,
				category: null,
				categories_data: [],
				load_category: false
			}
		},
		created() {
			this.index()
		},
		methods: {
			index() {
				this.getCategories()
			},
			async saveBook() {
				try {
					this.book.category_id = this.category
					this.book.author_id = this.author
					await axios.post('/books', this.book)
					await Swal.fire('success', 'Felicidades')
					this.$parent.closeModal()
				} catch (error) {
					console.error(error)
				}
			},
			async getCategories() {
				try {
					const { data: { categories } } = await axios.get('/categories/get-all')
					this.categories_data = categories
					this.load_category = true
				} catch (error) {
					console.error(error)
				}
			},
			reset() {
				this.is_create= true
				this.book= {}
				this.author= null
				this.category= null
				this.$refs.form.resetForm()
			}
		}
	}
</script>

<style lang='scss' scoped>
</style>
