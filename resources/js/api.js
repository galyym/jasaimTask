import axios from "axios";
import router from "./router";

const api = axios.create();

api.interceptors.request.use(function (config) {
    if (localStorage.getItem('token')) {
        config.headers.authorization = 'Bearer ' + localStorage.getItem('token')
    }
    return config
}, function (error) {
    console.log(error.response)
    if (error.response.status === 401){
        router.push({name: 'user.login'})
    }
})

api.interceptors.response.use({}, error => {
    if (error.response.data.message === 'Token has expired') {
        return axios.post('/api/auth/refresh', {}, {
            headers: {
                'authorization': 'Bearer ' + localStorage.getItem('token')
            }
        }).then(res => {
            localStorage.setItem('token', res.data.access_token)

            error.config.headers.authorization = 'Bearer' + localStorage.getItem(res.data.access_token)

            return api.request(error.config)
        });
    }
    if (error.response.status === 401){
        router.push({name: 'user.login'})
    }
})

export default api
