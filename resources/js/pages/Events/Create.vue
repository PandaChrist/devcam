<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeTextArea from '@/Components/Textarea.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
const form = useForm({
    titre: '',
    start_at: '',
    end_at: '',
    important: ''
});
// const submit = () => {
//     form.event(route('events.store'));
// };

function submit(){
    form.post('/events')
}
</script>
    <template>

    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Creer un évènenent
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('events.index')">
                            Retour
                            </Link>
                        </div>
                        <!-- <form name="createForm" @submit.prevent="submit"> -->
                        <form name="createForm"  method="POST" @submit.prevent="submit">
                            <div className="flex flex-col">
                                <div className="mb-4">
                                    <BreezeLabel for="title" value="Title" />

                                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.titre"
                                        autofocus />
                                    <span className="text-red-600" v-if="form.errors.titre">
                                        {{ form.errors.titre }}
                                    </span>
                                </div>
                                <div className="mb-4">
                                    <BreezeLabel for="start_at" value="Début" />

                                    <BreezeInput id="start_at"  type="datetime-local" class="mt-1 block w-full" v-model="form.start_at" autofocus />

                                    <span className="text-red-600" v-if="form.errors.start_at">
                                        {{ form.errors.start_at }}
                                    </span>

                                </div>
                                <div className="mb-4">

                                    <BreezeLabel for="end_at" value="Fin" />
                                    <BreezeInput id="end_at" type="datetime-local" class="mt-1 block w-full" v-model="form.end_at"
                                        autofocus />

                                    <span className="text-red-600" v-if="form.errors.end_at">
                                        {{ form.errors.end_at }}
                                    </span>
                                </div>

                                <div className="mb-4">

                                    <BreezeLabel for="important" value="important" />
                                    <BreezeInput id="important" type="number"   value=0 class="mt-1 block w-full" v-model="form.important"
                                        autofocus />

                                    <span className="text-red-600" v-if="form.errors.important">
                                        {{ form.errors.important }}
                                    </span>
                                </div>
                            </div>

                            <div className="mt-4">
                                <button type="submit" value="0" className="px-6 py-2 font-bold text-white bg-green-500 rounded">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>