import router from 'vue-router';
import {useStore} from 'vuex';
import lodash from 'lodash'; // Đảm bảo bạn đã import thư viện lodash

router.beforeEach(async (to, from, next) => {
  const { userInfo } = useStore.getters;
  
  if (to.matched.some((record) => record.meta.requiresAuth) && lodash.isEmpty(userInfo)) {
    next('/login');
  } else if (!lodash.isEmpty(userInfo)) {
    switch (to.name) {
      case 'Login':
      case 'Register':
      case 'ResetPassword':
        next({ path: '/' });
        break;
      case 'Home':
        next({ path: '/' });
        break;
      default:
        next();
        break;
    }
  } else {
    next();
  }
});
