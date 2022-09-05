<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
// import Datepicker from '@datepicker/Datepicker.vue';
import Datepicker from 'vue3-datepicker'
import { ref } from 'vue';

import Datepicker2 from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { Method } from '@inertiajs/inertia';


defineProps({
    events: Array,
});
const form = useForm();
function destroy(id) {
    if (confirm("Etes-vous sûre de vouloir supprimer")) {
        form.delete(route('events.destroy', id));
    }
}


    function Getrangevalue(payload){
        a= this.rangevalue= payload.message
        console.log(Datepicker2)
    }
    // console.log(this.Datepicker2.$props.rangevalue)


</script>
    <template>

    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Evènements
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <Datepicker2
                    v-model="range" lang="fr" selecte='console' range='true' type="date" placeholder="plage de date" 
                    @custom-event-name='Getrangevalue'
                 />

                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                :href="route('events.create')">
                            Créer un évènenent 
                            </Link>
                        </div>
                        <table className="table-fixed w-full">
                            <thead>
                                <tr className="bg-gray-100">
                                    <th className="px-4 py-2 w-20">No.</th>
                                    <th className="px-4 py-2">Titre</th>
                                    <th className="px-4 py-2">Début</th>
                                    <th className="px-4 py-2">Fin</th>
                                    <th className="px-4 py-2">important</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="event in events">
                                    <td className="border px-4 py-2">{{ event.id }}</td>
                                    <td className="border px-4 py-2">{{ event.titre }}</td>
                                    <td className="border px-4 py-2">{{ event.start_at }}</td>
                                    <td className="border px-4 py-2">{{ event.start_at }}</td>
                                    <td className="border px-4 py-2">{{ event.important }}</td>
                                    <td className="border px-4 py-2">
                                        <Link tabIndex="1" className="px-4 py-2 text-sm  rounded"
                                            :href="route('events.edit', event.id)">
                                        Mettre à jour
                                        </Link>
                                        <br/>
                                        <button @click="destroy(event.id)" tabIndex="-1" type="button"
                                            className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded">
                                            supprimer
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                       
                        <!-- <Datepicker v-model="picked"
                            
                            :starting-view="month"
                        /> -->
                    </div>
                </div>
                <!-- <Datepicker2
                    v-model="range" lang="fr" range type="datetime" placeholder="plage de date" format="YYYY-MM-DD HH:mm:ss"
                 /> -->
            </div>

        </div>
    </BreezeAuthenticatedLayout>
</template>