<template>
    <div class="d-flex align-items-center justify-content-between my-4">
        <hr class="flex-fill m-0">
        <span class="mx-3">
            Đăng nhập bằng
        </span>
        <hr class="flex-fill m-0">
    </div>
    <div class="social-login px-5">
        <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap mb-0">
            <button type="button" class="d-flex  align-items-center el-button social-login__button facebook el-button--default el-button--medium">
                <i class="bi bi-facebook" style="color: bule;"></i>
                <span>
                    <a class="font-bold" href="http://localhost:80/auth/facebook/url">Facebook</a> 
                </span>
            </button>
            <button type="button" class=" d-flex  align-items-center el-button social-login__button google el-button--default el-button--medium">
                <i class="bi bi-google"></i>
                <span>
                    <a class="font-bold" href="http://localhost:80/auth/google/url">Google</a> 
                </span>
            </button>
            <button type="button" class="d-flex  align-items-center el-button social-login__button github el-button--default el-button--medium">
                <i class="bi bi-github"></i>
                <span>
                    <a class="font-bold" href="http://localhost:80/auth/github/url">Github</a>
                </span>
            </button>
        </ul>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
    name: "ButtonLoginSocial",
});
</script>