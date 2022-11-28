import axios from "axios"
import { ref } from "vue"
import { useRouter } from 'vue-router'

export default function useComments() {
    
    const comment = ref({})

    const validationErrors = ref({})

    const isLoading = ref(false)

    const router = useRouter()

    const storeComment = async (comment) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/comments', comment)
            .then(response => {
                router.go()
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => {
                isLoading.value = false
            })
    }

    return { storeComment, validationErrors, isLoading }
}
