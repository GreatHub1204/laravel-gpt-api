<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import SectionBorder from '@/Components/SectionBorder.vue';
import ActionSection from '@/Components/ActionSection.vue';
</script>

<template>
  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div>
      <ActionSection>
        <template #title>
          FREE
        </template>
        <template #description>
          28 requests per month.
        </template>

        <template #content>
          Get started for free with 28 free monthly requests.
        </template>
      </ActionSection>
      <SectionBorder />
    </div>
    <div>
      <ActionSection>
        <template #title>
          $10 per month
        </template>
        <template #description>
          Unlimited web requests and basic tier API access.
        </template>

        <template #content>
          0r1kul costs $10 a month for unlimited monthly use and
          <Link :href="route('docs')">
            access to the API.
          </Link>
        </template>
      </ActionSection>
      <SectionBorder />
    </div>
    <div>
      <ActionSection>
        <template #title>
          $99 per month + $0.05 per 1K tokens
        </template>
        <template #description>
          Unlimited web requests with unlimited tier API access. Access to team management
          and automations.
        </template>

        <template #content>
          Get the full power of 0r1kul with unlimited API access, the ability to manage teams,
          and automations with the ability to use webhooks.
        </template>
      </ActionSection>
      <SectionBorder />
    </div>
  </div>
</template>
