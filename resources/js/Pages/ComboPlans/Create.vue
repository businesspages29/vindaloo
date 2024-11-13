<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  price: "",
});

const submit = () => {
  form.post("/plans");
};
</script>

<template>
    <Head title="Manage Plans" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Plan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/plans"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Back</button></Link>
                        
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label 
                                    for="name" 
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Name:</label>
                                <input 
                                    type="text" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    placeholder="Enter Name" 
                                    id="name"
                                    v-model="form.name" />

                            </div>

                            <div class="mb-4">
                                <label 
                                    for="price" 
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Price:</label>
                                    <input 
                                    type="number"
                                    step="0.01" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    placeholder="Enter Price" 
                                    id="price"
                                    v-model="form.price" />

                            </div>

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
