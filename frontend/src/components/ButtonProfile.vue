<template>
  <button class="btn dropdown-toggle" data-bs-toggle="dropdown" >
    <img style="width: 50px;height: 50px;" class="profile-images rounded-circle" :src=user.avatar >
  </button>
    <ul class="dropdown-menu dropdown-menu-right" style="padding: 0px;" >
            <div
              class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top" 
              style="background: linear-gradient(250deg, #3e93d6, #8a75aa);"
            >
            <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white" >
                <span class="mr-2">
                  <img style="width: 50px;height: 50px;margin-right: 10px;"
                    v-if="user.avatar"
                    class="profile-image rounded-circle"
                    :src="user.avatar"
                    alt=""
                  />
                  <img
                    v-else
                    class="profile-image rounded-circle"
                    alt=""
                  />
                </span>
                <div class="info-card-text">
                  <div class="fs-lg text-truncate text-truncate-lg">
                    {{ user.name }}
                  </div>
                  <span class="text-truncate text-truncate-md opacity-80">
                    {{ user.email }}
                  </span>
                </div>
              </div>
            </div>
            <li>
              <router-link :to="{ name: ''}">
                <a class="dropdown-item">Thông tin cá nhân</a>
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: '' }">
                <a class="dropdown-item">Đổi mật khẩu</a>
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: '' }">
                <a class="dropdown-item">Danh sách yêu cầu</a>
              </router-link>
            </li>
            <li style="padding-left: 20px">
              <form>
                <form @submit.prevent="logout">
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </form>
            </li>
          </ul>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
import { useRouter } from 'vue-router';
export default defineComponent({
    name: "ButtonProfile",
    props:{
      user: Object
    },
    data(){
      const router = useRouter();
      return {
        check: false,
        router
      }
    },
    methods:{
      showDropdown(){
        this.check = !this.check;
      },
      logout(){
        this.$emit('logout');
      },
    }
});
</script>