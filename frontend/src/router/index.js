import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../layout/user/view.vue') ,
      children:[
        {
          path:'login',
          name: 'login',
          component: () => import('../components/auth/Login.vue') 
        },
        {
          path:'register',
          name: 'register',
          component: () => import('../components/auth/Register.vue') 
        }
        ,
        {
          path:'forgotPassword',
          name: 'forgotPassword',
          component: () => import('../components/auth/ForgotPassword.vue') 
        }
      ]
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../layout/admin/view.vue'),
      children:[
        { path:'dash-board',
        name: 'DashBoard',
        component: () => import('../layout/admin/DashBoard.vue') 
        },
        { path:'members',
        name: 'Members',
        component: () => import('../layout/admin/ListMember.vue') 
        },
        { path:'posts',
        name: 'Posts',
        component: () => import('../layout/admin/ListPost.vue') 
        }
      ]
    }
  ]
})

export default router
