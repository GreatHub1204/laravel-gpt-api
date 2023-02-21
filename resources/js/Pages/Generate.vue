<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Generation from '@/Components/Generation.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Make A Generation
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                    <Generation />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
