<script setup>
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  records: {
    type: Array,
    default: () => [],
  },
});

const form = useForm({});

const deletePost = (id) => {
  if (confirm("Are you sure you want to delete this plan?")) {
    form.delete(`eligibilitycriterias/${id}`);
  }
};
</script>

<template>
    <Head title="Manage Eligibility Criterias" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Eligibility Criterias</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="eligibilitycriterias/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Eligibility Criteria</button></Link>
                        <table class="table-auto w-full">
                            <thead>
                              <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2" width="250px">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                <tr v-for="record in records.data" :key="record.id">
                                  <td class="border px-4 py-2">{{ record.id }}</td>
                                  <td class="border px-4 py-2">{{ record.name }}</td>
                                  <td class="border px-4 py-2">
                                    <Link :href="`eligibilitycriterias/${record.id}/edit`"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button></Link>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" @click="deletePost(record.id)">Delete</button>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                 <!-- Pagination Start-->
                 <div class="mt-6">
                        <Pagination :links="records.links" />
                  </div>
                <!-- Pagination End-->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
