
export const logIn = () => {
    localStorage.setItem('isLoggedIn', true);
}

export const isLoggedIn = () => {
   let loggedIn =  localStorage.getItem('isLoggedIn');
   return loggedIn ? true : false;
}

