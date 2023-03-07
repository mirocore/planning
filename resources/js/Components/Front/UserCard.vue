<template>
    <div class="bg-white mb-2 py-1 px-2 rounded-xl grid grid-cols-12 items-center">
        <div class="col-span-3 text-zinc-900 font-bold text-xs flex items-center gap-3">
            <img class="h-8 w-8 rounded-full" :src="data.photo" :alt="data.email"/>
            <span>{{ data.name }} {{ data.lastname }}</span>
        </div>
        <div class="col-span-3 text-zinc-500 text-xs">{{ data.position }}</div>
        <div class="col-span-3 text-zinc-500 text-xs ">{{ data.amountTasks }} Tarea{{ data.amountTasks !== 1 ? "s" : "" }}</div>
        <Dropdown class="flex justify-end col-span-3">
            <template v-slot:trigger>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                </svg>
            </template>
            <template v-slot:content>
                <ul class="bg-gray-300 py-0 ">
                    <li class="text-xs  hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1 ">
                        <Link  class="flex gap-1 w-full p-2" :href="`/usuarios/${data.id}`">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>

                            Ver más
                        </Link>
                    </li>
                    <li class="text-xs  hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                        <Link  class="flex gap-1 w-full  p-2" :href="`/usuarios/${data.id}`">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Editar
                        </Link>
                    </li>
                    <li  class="text-xs p-2 hover:bg-gray-500 transition-all cursor-pointer hover:text-white flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Borrar
                    </li>
                </ul>
            </template>
        </Dropdown>
    </div>
</template>

<script>
import Dropdown from '@/Components/Dropdown.vue';
import { Link } from '@inertiajs/vue3';

export default{
    props:{
        data: Object
    },
    components:{
        Dropdown,
        Link
    }
}

</script>