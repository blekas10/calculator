<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Calculation from '@/Components/Calculation.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['calculation']);
 
const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Calculations" />
 
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('calculations.store'), { onSuccess: () => form.reset() })">
                <input 
                    v-model="form.message"
                    placeholder="Enter a number"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Calculate</PrimaryButton>
            </form>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Calculation
                    v-for="calculation in calculation"
                    :key="calculation.id"
                    :calculation="calculation"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>