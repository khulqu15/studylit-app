<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="relative min-h-screen">
        <Head title="Log in" />
        <img src="/image/bg-login.png" class="absolute w-full h-full object-center object-cover" alt="">

        <div class="container min-h-screen items-center mx-auto grid md:grid-cols-2 grid-cols-1 justify-center relative z-20 gap-8">
            <div class="text-center">
                <img src="/image/logo-white.png" class="w-72 inline-block" alt="Logo">
                <h3 class="text-white text-xl mt-3">Login into your account</h3>
            </div>
            <div class="w-full">
                <div class="bg-white max-w-md w-full mx-auto p-8 rounded-xl shadow-xl">
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput
                                id="password"
                                v-model="form.password"
                                type="password"
                                class="mt-1 block w-full"
                                required
                                autocomplete="current-password"
                            />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="block mt-4 flex justify-between">
                            <label class="flex items-center">
                                <Checkbox v-model:checked="form.remember" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                            <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                Forgot your password?
                            </Link>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link :href="route('register')" class="ml-4 btn btn-ghost">
                                Register
                            </Link>
                            <button class="ml-4 btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Log in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
