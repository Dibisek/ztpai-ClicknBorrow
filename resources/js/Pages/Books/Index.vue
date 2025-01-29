<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AddBookForm from "./Partials/AddBookForm.vue";
import { useForm } from "@inertiajs/vue3";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";

const form = useForm({
    'title': '',
    'author': '',
    'publishing_date': '',
    'description': '',
    'page_count': 0,
    'image': '',

})
</script>

<template>
    <Head title="Books" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Newly added
            </h2>
        </template>
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
