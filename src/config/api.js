export default {
    name: 'Api',
    data() {
        return {
            baseUrl: 'http://luk-star.pl/storage/public',
            checkStatus: '/api/checkStatus',
            loginAction: '/api/login',
            logoutAction: '/api/logout',
            getOrders: '/api/orders/'
        }
    }
}
