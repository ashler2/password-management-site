export const APP_URL = 'http://127.0.0.1:8000';
export const API_URL = 'http://127.0.0.1:8000/api';
// export const APP_URL = 'http://password-manager';
// export const API_URL = 'http://password-manager/api';


// Password 

export const GET_PASSWORDS = `${API_URL}/passwords`;

export const GET_PASSWORD = (password) => `${API_URL}/passwords/${password}`;

export const POST_PASSWORD = `${API_URL}/passwords`;

export const UPDATE_PASSWORD = (password) =>  `${API_URL}/passwords/${password}`;

// Categories
export const GET_CATEGORIES = `${API_URL}/categories`;



// Auth

export const GET_SANCTUM = `${APP_URL}/sanctum/csrf-cookie`;

// login 
export const POST_LOGIN = `${APP_URL}/login`;