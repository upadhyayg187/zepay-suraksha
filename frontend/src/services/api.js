//Central API service file to manage all API calls

import axios from 'axios';


const api = axios.create({
    baseURL: 'http://localhost:8000', // Your Laravel API URL
    withCredentials: true, // This is crucial for sending cookies with requests
    headers: {
        'Accept': 'application/json',
    }
});

// A function to fetch the initial CSRF cookie from Sanctum
export const getCsrfCookie = () => {
    // The '/sanctum/csrf-cookie' endpoint is provided by Laravel Sanctum
    // to initialize the CSRF protection for SPAs.
    return api.get('/sanctum/csrf-cookie');
};

export default api;

