<template>
    <PageLayout>
        <NavLink href="/proyectos" class="text-xs">Volver al listado</NavLink>
        <TitlePage 
            title="Crear Proyecto"
        />


        <form @submit.prevent="createProject" class="bg-white p-5">
            <div>
                <label for="name" class="text-xs block mb-1">Nombre</label>
                <input
                    id="name" 
                    class="bg-gray-200 px-2 py-2 text-xs w-full"
                    placeholder="Nombre del proyecto"
                    v-model="newProject.name"
                />
                <ValidationMsg 
                    v-if="$page.props.errors.name"
                    :mensaje="$page.props.errors.name"
                />
            </div>
            <div class="grid grid-cols-12 mt-5 gap-4">

                <div class="col-span-4">
                    <label for="id_product" class="text-xs block mb-1">Producto</label>
                    <select id="id_product" v-model="newProject.id_product" class="text-xs bg-gray-200  text-gray-600 border-0 w-full">
                        <option value="">Seleccione Producto</option>
                        <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.id_product"
                        :mensaje="$page.props.errors.id_product"
                    />
                </div>

                <div class="col-span-4">
                    <label for="id_state" class="text-xs block mb-1">Estado</label>
                    <select id="id_state" v-model="newProject.id_state" class="text-xs bg-gray-200  text-gray-600 border-0 capitalize w-full">
                        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.id_state"
                        :mensaje="$page.props.errors.id_state"
                    />
                </div>
                <div class="col-span-4">
                    <label for="priority" class="text-xs block mb-1">Prioridad</label>
                    <select id="priority" v-model="newProject.priority" class="text-xs bg-gray-200  text-gray-600 border-0 capitalize w-full">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                    <ValidationMsg 
                        v-if="$page.props.errors.priority"
                        :mensaje="$page.props.errors.priority"
                    />
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 transition-all text-center py-2 text-white text-m mt-5">Crear Proyecto</button>
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
        return{
            newProject: {
                name: '',
                id_product: '',
                id_state: 1,
                priority: 0,
                archived: 0
            }
        }
    },
    props:['products', 'states'],
    methods:{
        createProject(){
            this.$inertia.post('/proyectos', this.newProject, {
                onSuccess: (page) => {
                    let notifier = new AWN()
                    notifier.success("Proyecto creado", {
                        icons:{
                            success: "check-circle",
                        },
                        labels:{
                            success: "????xito!",
                        },
                        position:"top-right",
                    })
            }});
        }
    }
}
</script>