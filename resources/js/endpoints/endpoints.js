export const APP_URL = 'http://localhost:8000';
export const API_URL = 'http://localhost:8000/api';
// export const APP_URL = 'http://password-manager';
// export const API_URL = 'http://password-manager/api';


// Password 

export const GET_PASSWORDS = `${API_URL}/passwords`;

export const GET_PASSWORD = (password) => `${API_URL}/passwords/${password}`;
export const GET_DECRYPTED_PASSWORD = (password) => `${API_URL}/passwords/${password}/decrypt`;

export const POST_PASSWORD = `${API_URL}/passwords`;

export const UPDATE_PASSWORD = (password) =>  `${API_URL}/passwords/${password}`;


// Categories
export const GET_CATEGORIES = `${API_URL}/categories`;

// users 
export const GET_USERS  = `${API_URL}/users`;
export const DELETE_USER = (user) => `${API_URL}/users/${user}`;
export const BAN_USER   =   (user)  =>  `${API_URL}/users/${user}/ban`;
export const UNBAN_USER   =   (user)  =>  `${API_URL}/users/${user}/unban`;

// Activity 

export const GET_ACTIVITIES = `${API_URL}/activity`;
export const GET_ACTIVITY = (activity) => `${API_URL}/activity/${activity}`;


// Auth

export const GET_SANCTUM = `${APP_URL}/sanctum/csrf-cookie`;

// login 
export const POST_LOGIN = `${APP_URL}/login`;


