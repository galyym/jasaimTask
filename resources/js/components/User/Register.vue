<template>
    <div class="w-25">
        <input v-model="name" type="text" class="form-control" placeholder="name">
        <input v-model="email" type="email" class="form-control" placeholder="email">
        <input v-model="password" type="password" class="form-control" placeholder="password">
        <input @click.prevent="store" type="submit" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Register",

    data(){
        return{
            name: null,
            email: null,
            password: null
        }
    },
    methods:{
        store(){
            axios.post('/api/auth/register', {name:this.name, email:this.email,password:this.password})
                .then(res => {
                    localStorage.setItem('token', res.data.access_token)
                    this.$router.push({name: 'worker'})
                })
        }
    }
}
</script>

<style scoped>

</style>
