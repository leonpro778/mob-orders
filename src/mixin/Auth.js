import axios from "axios";
import Api from '@/config/api.js'

export function isAuth() {

    let url = Api.data().baseUrl + Api.data().checkStatus
    const data = JSON.stringify({ token: sessionStorage.getItem('token') })
    return axios.post(url, data)
}
