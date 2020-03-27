import axios from 'axios'
import Api from '@/config/api'

export function logoutAction(inputData) {
    const url = Api.data().baseUrl + Api.data().logoutAction
    return axios.post(url, inputData)
}
