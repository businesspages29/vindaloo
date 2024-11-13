<script setup>
import InputField from '@/Components/InputField.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
  record: {
    type: Object,
    default: null,
  },
});

const form = useForm({
    name: props.record.name,
    age_less_than: props.record.age_less_than,
    age_greater_than: props.record.age_greater_than,
    last_login_days_ago: props.record.last_login_days_ago,
    income_less_than: props.record.income_less_than,
    income_greater_than: props.record.income_greater_than,
});

const submit = () => {
  form.put(`/eligibilitycriterias/${props.record.id}`);
};
</script>

<template>
    <Head title="Manage Eligibility Criterias" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Eligibility Criterias</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/eligibilitycriterias"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Back</button></Link>
                        
                        <form @submit.prevent="submit">
                            <InputField 
                                label="Name" 
                                id="name"
                                type="text" 
                                placeholder="Enter Name" 
                                v-model="form.name"
                                :error="form.errors.name"
                            />
            
                            <InputField 
                                label="Age Less Than" 
                                id="age_less_than"
                                type="number" 
                                placeholder="Enter Age Less Than" 
                                v-model="form.age_less_than"
                                :error="form.errors.age_less_than"
                            />

                            <InputField 
                                label="Age Greater Than" 
                                id="age_greater_than"
                                type="number" 
                                placeholder="Enter Age Greater Than" 
                                v-model="form.age_greater_than"
                                :error="form.errors.age_greater_than"
                            />

                            <InputField 
                                label="Last Login Days Ago" 
                                id="last_login_days_ago"
                                type="number" 
                                placeholder="Enter Last Login Days Ago" 
                                v-model="form.last_login_days_ago"
                                :error="form.errors.last_login_days_ago"
                            />

                            <InputField 
                                label="Income Less Than" 
                                id="income_less_than"
                                type="number" 
                                placeholder="Enter Income Less Than" 
                                v-model="form.income_less_than"
                                :error="form.errors.income_less_than"
                            />

                            <InputField 
                                label="Income Greater Than" 
                                id="income_greater_than"
                                type="number" 
                                placeholder="Enter Income Greater Than" 
                                v-model="form.income_greater_than"
                                :error="form.errors.income_greater_than"
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
