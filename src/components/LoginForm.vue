<template>
    <div>
        <b-container>
            <b-row>
                <b-col>
                    <b-form @submit="loginAction">
                        Login:
                        <b-form-input id="loginInput" type="text" v-model="form.loginInput"></b-form-input>
                        <br />
                        Hasło:
                        <b-form-input id="passwordInput" type="password" v-model="form.passwordInput"></b-form-input>
                        <br />
                        <b-button type="submit">Login</b-button>
                    </b-form>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="loginError" title="Błąd logowania" ok-only>
            <p class="my-4">Podano błędny login lub hasło</p>
        </b-modal>
    </div>
</template>

<script>
    import { loginAction } from "@/mixin/LoginAction";

    export default {
        name: "LoginForm",
        data() {
            return {
                form: {
                    loginInput: '',
                    passwordInput: '',
                }
            }
        },
        methods: {
            loginAction(evt) {
                let data = JSON.stringify({
                    login: this.form.loginInput,
                    password: this.form.passwordInput
                })
                evt.preventDefault()

                loginAction(data).then(response => {
                    if (response.data.status !== false) {
                        sessionStorage.setItem('token', response.data.token)
                        this.$router.push({ name: 'WelcomePage' })
                    } else { this.$bvModal.show('loginError') }
                })
            }
        }
    }
</script>

<style scoped>

</style>
