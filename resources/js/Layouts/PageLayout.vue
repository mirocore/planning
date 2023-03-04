<template>
    <Head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="awn/style.css"/>
    </Head>
    <div class="grid grid-cols-12">
        <Sidebar class="col-span-2 min-h-screen bg-zinc-300" />
        <div class="col-span-10 bg-zinc-200 p-10">
            <slot></slot>
        </div>
    </div>
    
</template>

<script>
import Sidebar from '../Components/Front/Sidebar.vue';
import { Head } from '@inertiajs/vue3'



    export default {
        components:{
            Sidebar,
            Head
        }
    }
</script>