<template>
    <div>
        <b-container>
            <b-row>
                <b-col>
                    <b-button @click="logout" variant="outline-info" class="mb-2">
                        <b-icon icon="power"></b-icon> Wyloguj się
                    </b-button>
                    <h4>Wyszukaj zamówienia</h4>
                </b-col>
            </b-row>

            <b-row>
                <b-col>Od daty:
                    <b-form-datepicker id="fromDate" v-model="fromDate" class="mb-2"></b-form-datepicker>
                </b-col>
            </b-row>
            <b-row>
                <b-col>Do daty:
                    <b-form-datepicker id="toDate" v-model="toDate" class="mb-2"></b-form-datepicker>
                </b-col>
            </b-row>

            <b-row>
                <b-col>
                    <b-button @click="search" variant="outline-info" class="mb-2">
                        <b-icon icon="search"></b-icon> Szukaj
                    </b-button>
                </b-col>
            </b-row>
            <hr />

            <b-row>
                <b-col>
                    <b-card>
                        <b-card-header v-model="selectedOrder">{{ selectedOrder }}</b-card-header>
                        <b-card-text>
                            <ul>
                                <li v-for="selectedItem in items" :key="selectedItem">
                                    {{ selectedItem.name }} - {{ selectedItem.quantity }} {{ selectedItem.unit}}
                                </li>
                            </ul>
                        </b-card-text>
                    </b-card>
                </b-col>
            </b-row>

            <br /><br />

            <b-row>
                <b-col>
                    <b-list-group>
                        <b-list-group-item v-for="order in orders" :key="order.num">
                            <b-row>
                                <b-col>Zamówienie nr:</b-col>
                                <b-col>{{ order.num }}</b-col>
                                <b-col>
                                    <b-button @click="orderDetail(order)" variant="outline-info">Pokaż</b-button>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
    import { logoutAction } from '@/mixin/Logout'
    import { getOrders } from '@/mixin/GetOrders'

    export default {
        name: "WelcomePage",
        data() {
            return {
                fromDate: '',
                toDate: '',
                orders: '',
                selectedOrder: '',
                items: '',
            }
        },
        methods: {
            logout() {
                let data = JSON.stringify({
                    token: sessionStorage.getItem('token')
                })
                logoutAction(data).then(response => {
                    if (response.data.status) {
                        sessionStorage.removeItem('token')
                    }
                })
                this.$router.push({ name: 'Login' })
            },

            search() {
                getOrders(this.fromDate, this.toDate).then(response => {
                    if (response.data.status) {
                        this.orders = response.data.orders
                        console.log(response.data.orders)
                    }
                })
            },

            orderDetail(order) {
                this.selectedOrder = order.num
                this.items = order.items
            }
        },
    }
</script>

<style scoped>

</style>
