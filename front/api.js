import axios from 'axios';

let API_URL = 'http://127.0.0.1:8001/api/'
export default axios.create({
    baseURL: API_URL,
    timeout: 50000
});