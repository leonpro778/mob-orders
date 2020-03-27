import axios from 'axios'
import Api from '@/config/api'

export function loginAction(inputData) {
    const url = Api.data().baseUrl + Api.data().loginAction
    return axios.post(url, inputData)
}
