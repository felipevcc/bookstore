import { ref } from 'vue'

export default function handlerModal() {
	const modal = ref(null)
	const load_modal = ref(false)

	// status: true to mount the modal or false to unmount/disassemble it
	const mountModal = async (status = true) => {
		return await new Promise((resolve, reject) => {
			load_modal.value = status
			// Wait 200 milliseconds and scramble the promise
			setTimeout(() => resolve(), 200)
		})
	}

	const openModal = async modal_id => {
		await mountModal()
		modal.value = new bootstrap.Modal(`#${modal_id}`)
		modal.value.show()
	}

	const closeModal = async () => {
		modal.value.hide()
		// Disassemble the modal
		await mountModal(false)
	}

	return {
		load_modal,
		closeModal,
		openModal
	}
}
