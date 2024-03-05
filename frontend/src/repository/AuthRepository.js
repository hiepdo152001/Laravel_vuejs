import Repository from './Repository.js';

const resource = '/auth';

export default ({
    get(){
        return Repository.get(`${resource}`);
    },
    logout(){
        return Repository.get(`${resource}/logout`);
    },
    post(payload){
        return Repository.post(`${resource}`,payload);
    },
    postLogin(payload){
        return Repository.post(`${resource}/login`,payload);
    }

});
