import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useParts() {
    const part = ref([])
    const parts = ref([])

    const errors = ref('')
    const router = useRouter()

    const getParts = async () => {
        let response = await axios.get('/api/parts')    // retrieve data from endpoint get /api/parts
        parts.value = response.data.data
    }

    const getPart = async (id) => {
        let response = await axios.get(`/api/parts/${id}`)   // retrieve data from endpoint get /api/parts/{id}
        part.value = response.data.data
    }

    const storePart = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/parts', data)  // send data to endpoint post /api/parts
            await router.push({ name: 'parts.index' })
        } catch (e) {
            if (e.response.status === 422) {   // retrieve validation error message request with status 422
                errors.value = e.response.data.errors    // retrieve validation  error message data
            }
        }

    }

    const updatePart = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/parts/${id}`, part.value)  // send data to endpoint patch /api/parts/{id}
            await router.push({ name: 'parts.index' })
        } catch (e) {
            if (e.response.status === 422) {    // retrieve validation error message request with status 422
                errors.value = e.response.data.errors    // retrieve validation  error message data
            }
        }
    }

    const destroyPart = async (id) => {
        await axios.delete(`/api/parts/${id}`)
    }

    return {
        errors,
        part,
        parts,
        getPart,
        getParts,
        storePart,
        updatePart,
        destroyPart
    }

 

  
}