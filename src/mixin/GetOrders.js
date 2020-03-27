import axios from "axios";
import Api from '@/config/api.js'

export function getOrders(fromDate, toDate) {
    let from = fromDate
    let to = toDate

    const url = Api.data().baseUrl + Api.data().getOrders + from + '/' + to
    return axios.get(url, {
        headers: {
            Authorization: "Bearer " + sessionStorage.getItem('token'),
            Accept: 'application/json'
        }
    })
}
