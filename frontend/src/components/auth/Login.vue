<template>
<div class="row justify-content-center mt-5">
    <div class="col-md-4 col-lg-4 col-xl-5">
        <div class="el-card is-always-shadow card_39334a8">
            <div class="el-card__body">
                <div class="mb-6 text-center" style="margin-top: 30px;">
                    <img src="./../../assets/logo_full.svg" alt="Viblo" class="logo_0ce2aea" style="width: 120px;height: 40px;">
                </div>
                <div class="my-4 text-center">
                    <h5>Đăng nhập vào Viblo</h5>
                </div>
                <div class="login-form">
                    <form @submit.prevent="Login" class="el-form">
                        <div class="el-form-item is-required el-form-item--medium">
                            <div class="el-form-item__content">
                                <div class="el-input el-input--medium el-input-group el-input-group--prepend d-flex">
                                    <div class="el-input-group__prepend">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <input v-model="form.email" type="email" autocomplete="off" autofocus="autofocus" placeholder="Email" class="el-input__inner">
                                </div>
                            </div>
                        </div>
                        <div class="el-form-item is-required el-form-item--medium">
                            <div class="el-form-item__content">
                                <div class="el-input el-input--medium el-input-group el-input-group--prepend d-flex">
                                    <div class="el-input-group__prepend">
                                        <i class="bi bi-lock-fill "></i>
                                    </div>
                                    <input v-model="form.password" type="password" autocomplete="off" placeholder="Mật khẩu" class="el-input__inner">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <span>
                                    Đăng nhập
                                </span>
                            </button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between my-2">
                        <router-link :to="{name:'forgotPassword'}">
                            <small>Quên mật khẩu?</small>
                        </router-link>
                        <router-link :to="{name:'register'}">
                            <small>Tạo tài khoản</small>
                        </router-link>
                    </div>
                    <ButtonLoginSocial />
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script lang="ts">
import {
    toast
} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import {
    defineComponent,
    reactive
} from 'vue';
import AuthRepository from '../../repository/AuthRepository.js';
import UserRepository from "../../repository/UserRepository.js";
import {
    useRouter
} from 'vue-router';
import ButtonLoginSocial from '../ButtonLoginSocial.vue';
export default defineComponent({
    name: "LoginUser",
    components: {
        ButtonLoginSocial
    },
    data() {
        const form = reactive({
            email: "a1@gmail.com",
            password: "12345",
        });
        const router = useRouter();
        return {
            form,
            errors: [],
            message: "",
            router
        }
    },
    methods: {
        async Login() {
            try {
                this.message = "";
                const data = await AuthRepository.postLogin(this.form);
                console.log(data);
                this.message = data.data.message;
                const user = await UserRepository.get();
                this.$store.commit('updateUser', user.data[0]);
                this.$store.commit('loggedIn', 'logged');
                toast(this.message, {
                    autoClose: 10000
                });
                this.router.push({
                    name: 'home'
                });
            } catch (error) {
                this.message = "";
                this.message = error.response.data.message;
                toast(this.message, {
                    autoClose: 1500
                });
            }
        }
    }
})
</script>

<style>
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.el-card.is-always-shadow,
.el-card.is-hover-shadow:focus,
.el-card.is-hover-shadow:hover {
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
}

.el-card {
    border-radius: 4px;
    border: 1px solid #ebeef5;
    background-color: #fff;
    overflow: hidden;
    color: #303133;
    transition: .3s;
}

.el-input-group__prepend {
    border-right: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.el-input-group__prepend {
    border-right: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.el-input-group__append,
.el-input-group__prepend {
    background-color: #f5f7fa;
    color: #909399;
    vertical-align: middle;
    display: table-cell;
    position: relative;
    border: 1px solid #dcdfe6;
    padding: 8px 20px 0px 20px;
    width: 1px;
    white-space: nowrap;
    width: 65px;
}

.el-input-group--prepend .el-input__inner,
.el-input-group__append {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.el-input-group>.el-input__inner {
    vertical-align: middle;
    display: table-cell;
}

.el-input--medium .el-input__inner {
    height: 36px;
    line-height: 36px;
}

.el-input__inner:hover {
    border-color: blue;
}

.el-input__inner {
    -webkit-appearance: none;
    background-color: #fff;
    background-image: none;
    border-radius: 4px;
    border: 1px solid #dcdfe6;
    box-sizing: border-box;
    color: #606266;
    display: inline-block;
    font-size: inherit;
    height: 40px;
    line-height: 40px;
    outline: none;
    padding: 0 15px;
    transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
    width: 100%;
}

.el-form-item__content .el-input-group {
    vertical-align: top;
    margin-bottom: 20px;
}

.el-input-group {
    line-height: normal;
    display: inline-table;
    width: 100%;
    border-collapse: initial;
    border-spacing: 0;
}

.el-card__body {
    padding: 20px;
}
</style>
