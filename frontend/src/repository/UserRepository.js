import Repository from './Repository.js';
const resource = '/user';

export default ({
    get(){
        return Repository.get(`${resource}`);
    },
});
