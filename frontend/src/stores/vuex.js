import { createStore } from 'vuex';

const store = createStore({
  state: {
    user: [],
    checkLogin: "",
  },
  getters: {
    user: state => state.user,
    checkLogin: state => state.checkLogin
  },
  mutations: {
    updateUser(state,payload){
      state.user = payload;
    },
    loggedIn(state,payload){
      state.checkLogin = payload;
    }
    
  },
  actions: {
    // changeChecks (context, payload) {
    //     setTimeout(() => {
    //       context.commit("changeCheck", payload);
    //     }, 2000);
    //   }
  }
});

export default store;