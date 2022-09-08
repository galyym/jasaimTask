<template>
    <div class="container d-flex justify-content-around">
        <div v-if="worker.length === 0">
            <h1>Please add workers via postman, http://127.0.0.1:8000/api/worker(POST)       :)</h1>
        </div>
        <div v-for="workers in worker">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm81XoZa9dFFAFPY-LjxgJ-XAj-KeySicSvw&usqp=CAU" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> {{ workers.full_name }} </h5>
                    <p class="card-text">{{ workers.birthday}}</p>
                    <p class="card-text">{{ workers.address}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import api from '../api';

    export default {
        components: {

        },
        data: ()=> ({
            worker: null,
        }),
        mounted() {
            this.getWorkers()
        },
        methods: {
            getWorkers(){
                api.get('/api/worker')
                    .then(res => {
                        this.worker = res.data.data
                    })
            }
        }
    }
</script>

<style scoped>

</style>
