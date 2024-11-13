<script setup>
import InputField from '@/Components/InputField.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from 'vue';
import VueMultiselect from "vue-multiselect";
const plans = ref([]); // Initialize as an empty array
const props = defineProps({
  record: {
    type: Object,
    default: null,
  },
});

const form = useForm({
  name: props.record.name,
  price: props.record.price,
plans: [],
});

const submit = () => {
  form.put(`/comboplans/${props.record.id}`);
};

const asyncFind = async (query) => {
  const response = await fetch(
    `/plan-ajax?search=${query}`
  );
  const data = await response.json();
  plans.value = Object.keys(data).map(key => ({
    code: key,
    name: data[key],
  }));
};
</script>

<template>
    <Head title="Manage Combo Plans" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Combo Plan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/comboplans"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Back</button></Link>
                        
                        <form @submit.prevent="submit">
                            <VueMultiselect
                            v-model="form.plans"
                            :options="plans"
                            :multiple="multiple"
                            :searchable="searchable"
                            @search-change="asyncFind"
                            placeholder="Type to search"
                            label="name"
                            track-by="code"
                            class="w-full md:w-80"
                            >
                            <template #noResult>
                                Oops! No elements found. Consider changing the search query.
                            </template>
                            </VueMultiselect>

                            <InputField 
                                label="Name" 
                                id="name"
                                type="text" 
                                placeholder="Enter Name" 
                                v-model="form.name"
                                :error="form.errors.name"
                            />
                           
                            <InputField 
                                label="Price" 
                                id="price"
                                type="number" 
                                placeholder="Enter Price" 
                                v-model="form.price"
                                :error="form.errors.price"
                            />
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 text-white">
                                Submit
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
