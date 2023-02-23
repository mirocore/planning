<template>
    <PageLayout>
        <TitlePage 
            title="Listado de Proyectos"
        />

        <div class="botonera mb-4">
            <NavLink href="/proyectos/create" class="justify-center bg-blue-600 hover:bg-blue-800 hover:text-white transition-all px-4 pt-1 pb-1 text-white text-xs leading-0">Crear Proyecto</NavLink>
        </div>
        
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
import NavLink from "@/Components/NavLink.vue";

export default{
    components:{
        PageLayout,
        TitlePage,
        ProjectCard,
        NavLink
    },
    props:['projects'],
}

</script>