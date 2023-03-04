<template>
    <PageLayout>
        <NavLink href="/proyectos" class="text-xs">Volver al listado</NavLink>
        <TitlePage 
            title="Editar Proyecto"
        />
        <form @submit.prevent="editProject" class="bg-white p-5">
            <div>
                <label for="name" class="text-xs block mb-1">Nombre</label>
                <input
                    id="name" 
                    class="bg-gray-200 px-2 py-2 text-xs w-full"
                    placeholder="Nombre del proyecto"
                    v-model="project.name"
                />
                <ValidationMsg 
                    v-if="$page.props.errors.name"
                    :mensaje="$page.props.errors.name"
                />
            </div>
            <div class="grid grid-cols-12 mt-5 gap-4">

                <div class="col-span-6">
                    <label for="id_product" class="text-xs block mb-1">Producto</label>
                    <select id="id_product" v-model="project.id_product" class="text-xs bg-gray-200  text-gray-600 border-0 w-full">
                        <option value="">Seleccione Producto</option>
                        <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.id_product"
                        :mensaje="$page.props.errors.id_product"
                    />
                </div>

                <div class="col-span-6">
                    <label for="id_state" class="text-xs block mb-1">Estado</label>
                    <select id="id_state" v-model="project.id_state" class="text-xs bg-gray-200  text-gray-600 border-0 capitalize w-full">
                        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.id_state"
                        :mensaje="$page.props.errors.id_state"
                    />
                </div>
                <div class="col-span-6">
                    <label for="priority" class="text-xs block mb-1">Prioridad</label>
                    <select id="priority" v-model="project.priority" class="text-xs bg-gray-200  text-gray-600 border-0 capitalize w-full">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.priority"
                        :mensaje="$page.props.errors.priority"
                    />
                </div>
                <div class="col-span-6">
                    <label for="archived" class="text-xs block mb-1">Archivado</label>
                    <select id="archived" v-model="project.archived" class="text-xs bg-gray-200  text-gray-600 border-0 capitalize w-full">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
                <ValidationMsg 
                    v-if="$page.props.errors.archived"
                    :mensaje="$page.props.errors.archived"
                />
            </div>

            <button type="submit" class="w-full bg-sky-600 hover:bg-sky-800 transition-all text-center py-2 text-white text-m mt-5">Editar Proyecto</button>
        </form>
    </PageLayout>
</template>

<script>
import PageLayout from '@/Layouts/PageLayout.vue';
import TitlePage from '@/Components/Front/TitlePage.vue';
import ValidationMsg from '../../Components/Front/ValidationMessage.vue';
import AWN from "awesome-notifications";
import NavLink from '@/Components/NavLink.vue';

export default{
    components:{
        PageLayout,
        TitlePage,
        ValidationMsg,
        NavLink
    },
    data(){
        return{}
    },
    props:['products', 'states', 'project'],
    methods:{
        editProject(){
            this.$inertia.put(`/proyectos/${this.project.id}`, this.project, {
                onSuccess: (page) => {
                    let notifier = new AWN()
                    notifier.success("Proyecto actualizado", {
                        icons:{
                            success: "check-circle",
                        },
                        labels:{
                            success: "¡Éxito!",
                        },
                        position:"top-right",
                    })
            }});
        }
    }
}
</script>