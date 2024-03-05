<template>
  <header class="main-navbar main-navbar__group d-flex flex-row justify-content-between mt-2">
    <div class="main-navbar__container d-flex flex-row">
      <div class="d-flex flex-row main-navbar__grow align-items-center">
        <a class="main-navbar__logo d-block mr-lg-5 nuxt-link-exact-active active" aria-current="page">
          <img src="./../assets/logo_full.svg" alt="Viblo" width="62" height="21" style="margin-right: 20px;">
        </a>
        <ul class="main-menu  list-unstyled d-flex flex-row " style="margin-bottom: 0px;">
          <li class="main-menu__item category-menubar">
            <a href="/newest" class="link nuxt-link-exact-active active" aria-current="page">
              Bài Viết
            </a>
          </li>
          <li id="v-step-2" class="main-menu__item category-menubar">
            <a href="/questions" class="link">
              Hỏi Đáp
            </a>
          </li>
          <li class="main-menu__item category-menubar">
            <a href="/discussion" class="link">
              Thảo Luận
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-navbar__right d-flex flex-row">
      <div class="d-flex search-reponsive d-sm-none" style="margin-right: 15px;">
        <input placeholder="Tìm kiếm trên Viblo" value="" class="sb__input search-reponsive">
        <button class="btn btn-primary search-reponsive" style="border-radius: 0px;margin-left: -43px;">
          <i class="bi bi-search search-reponsive"></i>
        </button>
      </div>
      <div class="d-flex flex-row align-items-center">
        <div class="dropdown" style="margin-right: 15px;">
          <img class="dropdown-toggle imageLocale" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" slot="prefix" src="./../assets/vi-flag-32x48.png" width="20" height="20">
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Tiếng Việt</a></li>
            <li><a class="dropdown-item" href="#">English</a></li>
          </ul>
        </div>
        <div v-if="check == ''">
          <span>
            <router-link :to="{name:'login'}" style="text-decoration: none;">
              <i class="bi bi-box-arrow-in-right"></i>
              Đăng nhập/Đăng ký
            </router-link>
          </span>
        </div>
        <div v-else>
          <ButtonProfile :user="user" @logout="logout"/>
        </div>
      </div>
    </div>
  </header>
</template>
<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useRouter } from "vue-router";
import ButtonProfile from "../components/ButtonProfile.vue";

export default defineComponent({
    name: "MenuBar",
    components:{
      ButtonProfile
    },
    props:{
      user: Object,
      check: String
    },
    data(){
      const router = useRouter();
      return {
        showDropdown: ref(false),
        router
      }
    },
    methods:{
      toggleDropdown() {
        this.showDropdown = !this.showDropdown;
      },
      logout(){
        this.$emit('logout');
      }
  }
});

</script>
