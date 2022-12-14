import axios from "axios"
import { ref, inject } from "vue"
import { useRouter } from 'vue-router'


export default function usePosts() {
    const posts = ref([])

    const post = ref({})

    const router = useRouter()

    const validationErrors = ref({})

    const isLoading = ref(false)

    const swal = inject('$swal')

    const getPosts = async () => {
        axios
            .get('api/posts')
            .then(response => {
                posts.value = response.data.data
            })
    }

    const storePost = async (post) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.post('/api/posts', post)
            .then(response => {
                router.push({ name: 'posts.index' })

                swal({
                    icon: 'success',
                    title: 'Post created successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const getPost = async (id) => {
        axios.get('/api/posts/' + id)
            .then(response => {
                post.value = response.data.data;
            }).catch(error => {
                router.push({ name: 'posts.index' })

                swal({
                    icon: 'error',
                    title: 'You cant access this post'
                })
            })
    }

    const updatePost = async (post) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/posts/' + post.id, post)
            .then(response => {
                
                swal({
                    icon: 'success',
                    title: 'Post updated successfully'
                })
                
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    return { posts, post, getPosts, getPost, storePost, updatePost, validationErrors, isLoading }
}
