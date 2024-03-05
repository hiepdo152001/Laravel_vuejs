import axios from 'axios';

const baseDomain = 'http://localhost:80';

const baseURL = `${baseDomain}/api`;

export default axios.create({
    baseURL,
    withCredentials: true,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }
});
