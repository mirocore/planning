<template>
    <PageLayout>
        <TitlePage 
            title="Listado de Proyectos"
        />
        {{  projects  }}
    </PageLayout>
</template>

<script>
import TitlePage from '../../Components/Front/TitlePage.vue';
import PageLayout from "../../Layouts/PageLayout.vue";

export default{
    components:{
        PageLayout,
        TitlePage
    },
    props:['projects'],
}

</script>