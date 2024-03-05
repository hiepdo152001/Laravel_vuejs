<template>
        <Header />
<!-- <MenuBar :user="user" :check="check" :key="reload" @logout="logout" /> -->
<router-view></router-view>
</template>

<script lang="ts">
import {
    defineComponent,
    ref
} from 'vue';
import MenuBar from '../../components/Menubar.vue';
import Header from './header.vue';
import AuthRepository from "../../repository/AuthRepository.js";
import UserRepository from "../../repository/UserRepository.js";
import {
    useRouter
} from 'vue-router';

export default defineComponent({
    components: {
        Header
    },
    data() {
        const router = useRouter();
        return {
            reload: 0,
            router,
            check: "",
            user: ref([]),
        }
    },
    mounted() {
        this.getUser();
    },
    methods: {
        logout() {
            try {
                AuthRepository.logout();
                this.check = "";
                this.reload = 1;
                this.router.push({
                    name: 'login'
                });
            } catch (error) {
                console.log(error);
            }
        },
        async getUser() {
            this.check = "";
            try {
                const data = await UserRepository.get();
                console.log(data);
                this.user = this.$store.state.user;
                this.check = this.$store.state.checkLogin;
            } catch (error) {
                this.check = "";
            }
        },
    }
});
</script>

<style>
.main-menu__item {
    margin-right: 15px !important;
    text-decoration: none;

}

.main-menu__item a {
    text-decoration: none;
    color: #9b9b9b;
    font-weight: 700px;
}

.main-menu__item a:hover {
    color: black;
}
</style>
