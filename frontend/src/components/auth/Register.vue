<template>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-8 col-xl-5">
        <div class="el-card__body ">
            <h1 class="">
                Đăng ký tài khoản cho Viblo
            </h1>
            <p class="card-subtitle mt-2">
                Chào mừng bạn đến
                <strong>Nền tảng Viblo</strong>!
                Tham gia cùng chúng tôi để tìm kiếm thông tin hữu ích cần thiết để cải thiện kỹ năng IT của bạn. Vui lòng điền thông tin của bạn vào biểu mẫu bên dưới để tiếp tục.
            </p>
            <div class="pt-4 ">
                <form @submit.prevent="Register" class="el-form">
                    <div class=" grid md:grid-cols-2 md:gap-6 relative z-0 w-full mb-5 group">
                        <div class="relative z-0 w-full mb-5 group">
                            <input v-model="form.name" type="text" name="floating_name" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input v-model="form.username" type="text" name="floating_name" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input v-model="form.email" type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input v-model="form.password" type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input v-model="form.confirmPassword" type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                    </div>
                    <div class="alert alert-danger mt-2" v-if="checkEmail">
                        {{ checkEmail }}
                    </div>
                    <div class="alert alert-danger mt-2" v-if="checkPassword">
                        {{ checkPassword }}
                    </div>
                    <div class="alert alert-danger mt-2" v-if="!Confirm()">
                        confirm password not match!
                    </div>
                    <div class="text-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span>
                                Đăng ký
                            </span>
                        </button>
                    </div>
                </form>
                <ButtonLoginSocial />
            </div>
        </div>
    </div>
</div>
</template>

<script lang="ts">
import {
    defineComponent
} from 'vue';
import {
    reactive
} from 'vue';
import {
    useRouter
} from "vue-router";
import AuthRepository from '../../repository/AuthRepository.js';
import {
    toast
} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import ButtonLoginSocial from '../ButtonLoginSocial.vue';

export default defineComponent({
    name: "RegisterUser",
    components: {
        ButtonLoginSocial
    },
    data() {
        const form = reactive({
            name: "",
            email: "a@gmail.com",
            username: "",
            password: "12345",
            confirmPassword: "12345"
        });
        const router = useRouter();
        return {
            form,
            check: "",
            router,
            checkEmail: "",
            checkPassword: "",
            errors: [],
            data: [],
        }
    },
    methods: {
        async Register() {
            try {
                const response = await AuthRepository.post(this.form);
                console.log(response);
                if (response.status === 200) {
                    toast('Tạo tài khoản thành công!', {
                        autoClose: 5000
                    });
                    this.router.push({
                        name: "login"
                    });
                }

            } catch (error) {
                this.checkEmail = '';
                this.checkPassword = '';
                console.log(error.response);
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.error;
                    if (this.errors.hasOwnProperty('email')) {
                        this.checkEmail = this.errors.email[0];
                    }
                    if (this.errors.hasOwnProperty('password')) {
                        this.checkPassword = this.errors.password[0];
                    }
                }
            }
        },
        Confirm() {
            return this.form.password === this.form.confirmPassword;
        }
    }

});
</script>

<style>
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
