<script setup>
import { Head, Link, Form } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/App.vue';

defineOptions(
    {
        layout: AppLayout
    }
)

defineProps(
    {
        customer: Object
    }
)
</script>

<template>
    <Head>
        <title>Customers</title>
        <meta head-key="description" name="description" content="This is inertia app customer edit page" />
    </Head>

    <section class="mx-auto max-w-screen-xl px-4 py-16">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Edit Customer</h2>
                <Link :href="route('customers.index')"
                    class="rounded-md bg-gray-500 px-4 py-2 text-sm text-white hover:bg-gray-600 transition">
                ← Back
                </Link>
            </div>

            <Form class="space-y-6" :action="route('customers.update', customer.id)" method="PUT" #default="{ errors, processing }">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            :value="customer.first_name"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                            :class="{'border-red-500' : errors.first_name}"
                            placeholder="First name"
                        >
                        <div class="text-sm text-red-500 mt-1" v-if="errors.first_name">{{ errors.first_name }}</div>
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input 
                            type="text" 
                            id="last_name" 
                            name="last_name"
                            :value="customer.last_name"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                            :class="{'border-red-500' : errors.last_name}"
                            placeholder="Last name"
                        >
                        <div class="text-sm text-red-500 mt-1" v-if="errors.last_name">{{ errors.last_name }}</div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        :value="customer.email"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                        :class="{'border-red-500' : errors.email}"
                        placeholder="Email address"
                    >
                    <div class="text-sm text-red-500 mt-1" v-if="errors.email">{{ errors.email }}</div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone"
                        :value="customer.phone"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                        :class="{'border-red-500' : errors.phone}"
                        placeholder="Phone number"
                    >
                    <div class="text-sm text-red-500 mt-1" v-if="errors.phone">{{ errors.phone }}</div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea 
                        id="address" 
                        name="address" 
                        rows="3"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"
                        :class="{'border-red-500' : errors.address}"
                        placeholder="Type your address ..."
                    >{{ customer.address }}</textarea>
                    <div class="text-sm text-red-500 mt-1" v-if="errors.address">{{ errors.address }}</div>
                </div>

                <div class="flex items-center">
                    <input
                        id="status"
                        name="status"
                        :value="1"
                        :checked="customer.status"
                        type="checkbox"
                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                    >
                    <label for="status" class="ml-2 text-gray-700">Active</label>
                </div>

                <button 
                    type="submit"
                    :disabled="processing"
                    class="w-full bg-green-500 text-white font-medium py-3 px-6 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-1 transition"
                >
                    {{ processing ? 'Updating...' : 'Submit' }}
                </button>
            </Form>
        </div>
    </section>
</template>