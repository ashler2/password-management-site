export const APP_URL = 'http://password-manager';
export const API_URL = 'http://password-manager/api';


// Password 

export const GET_PASSWORDS = `${API_URL}/passwords`;

export const GET_PASSWORD = (password) => `${API_URL}/passwords/${password}`;

// Categories
export const GET_CATEGORIES = `${API_URL}/categories`;