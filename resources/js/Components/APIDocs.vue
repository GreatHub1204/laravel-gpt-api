<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

</script>

<template>

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-white">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <AuthenticationCardLogo />
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" >
                  0r1kul costs $10 a month for unlimited monthly use and base tier access to the API.
                </div>
            </div>
        </div>
    </div>
</template>
