<template>
<SlideBarAdmin :user="user" />
</template>

<script lang="ts">
import {
    defineComponent,
    ref
} from 'vue';
import SlideBarAdmin from "../../components/admin/SideBar.vue";

export default defineComponent({
    name: "AdminWeb",
    components: {
        SlideBarAdmin
    },
    data() {
        const user = ref([]);
        return {
            componentKey: 0,
            user
        }
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async getUser() {
            this.user = this.$store.state.user;
        }
    }
});
</script>
