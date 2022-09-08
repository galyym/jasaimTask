<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
<!--                    <router-link v-if="token" class="nav-item nav-link" :to="{name: 'home'}"> Главная</router-link>-->
                    <router-link v-if="token" class="nav-item nav-link" :to="{name: 'worker'}">Worker</router-link>
                    <router-link v-if="!token" class="nav-item nav-link" :to="{name: 'user.login'}">Login</router-link>
                    <router-link v-if="!token" class="nav-item nav-link" :to="{name: 'user.register'}">Register</router-link>
                    <a class="nav-item nav-link" v-if="token" href="#" @click.prevent="logout">Logout</a>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import Api from "../api";

export default {

    data() {
        return {
            token: null
        }
    },
    mounted() {
        this.getToken()
    },

    updated() {
        this.getToken()
    },

    methods:{
        getToken(){
            this.token = localStorage.getItem('token')
        },

        logout(){
            Api.post('/api/auth/logout')
                .then( res => {
                    localStorage.removeItem('token')
                    this.$router.push({name: 'user.login'})
                })
        }
    }
}
</script>

<style scoped>

</style>
