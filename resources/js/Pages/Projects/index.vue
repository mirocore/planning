<template>
    <PageLayout>
        <TitlePage 
            title="Listado de Proyectos"
        />
        
        <div>
            <ProjectCard
                v-for="project in projects"
                :key="project.id" 
                :project="project"
            />
        </div>
    </PageLayout>
</template>

<script>
import ProjectCard from '../../Components/Front/ProjectCard.vue';
import TitlePage from '../../Components/Front/TitlePage.vue';
import PageLayout from "../../Layouts/PageLayout.vue";


export default{
    components:{
        PageLayout,
        TitlePage,
        ProjectCard
    },
    props:['projects'],
}

</script>