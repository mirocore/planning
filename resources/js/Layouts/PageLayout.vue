<template>
    <div class="grid grid-cols-12">
        <Sidebar class="col-span-2 min-h-screen bg-zinc-300" />
        <div class="col-span-10 bg-zinc-200 p-10">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import Sidebar from '../Components/Front/Sidebar.vue';

    export default {
        components:{
            Sidebar
        }
    }
</script>