<template>
    <PageLayout>
        <TitlePage 
            title="Listado de Usuarios"
        />
        <UserCard v-for="user in users" :key="user.id" :data="user"></UserCard>
    </PageLayout>    
</template>

<script>
import PageLayout from '@/Layouts/PageLayout.vue';
import UserCard from '../../Components/Front/UserCard.vue';
import TitlePage from '../../Components/Front/TitlePage.vue';

    export default{
        components:{
            PageLayout,
            UserCard,
            TitlePage
        },
        props:['users']
    }
</script>