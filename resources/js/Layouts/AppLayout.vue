<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Icon } from '@iconify/vue'

defineProps({
    title: String,
    header: String
});

const show_sidebar = ref(true)
const selected_sidebar = ref(null)
const selected_icon = ref(null)
const on_search = ref(false)
const show_notification = ref(false)
const menus = ref([
    {
        name: 'Product',
        data: [{
            name: 'Exclusive Book',
            path: 'dashboard',
        },{
            name: 'Pricing Access',
            path: 'dashboard',
        },{
            name: 'Packet Bundle',
            path: 'dashboard',
        }]
    }
])

const logout = () => {
    Inertia.post(route('logout'));
};

const onSelectMenu = (menu, icon) => {
    selected_sidebar.value = menu
    selected_icon.value = icon
    show_sidebar.value = !show_sidebar.value
}
</script>

<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen bg-gray-50">
            <div v-if="selected_sidebar !== null" class="fixed transition-all top-0" :class="{'-left-3/4 hidden': show_sidebar}">
                <div class="relative left-1/4 p-6 min-h-screen bg-white shadow space-y-4 md:w-72 w-96">
                    <div class="cursor-pointer absolute right-0 top-0 z-10 p-4" @click="show_sidebar = !show_sidebar">
                        <Icon icon="carbon:close" class="text-3xl text-gray-400"/>
                    </div>
                    <div class="relative">
                        <div class="flex gap-2 items-center">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center bg-primary/20 items-center justify-center">
                                <Icon class="text-primary" :icon="selected_icon"/>
                            </div>
                            <h5 class="text-xl font-bold">{{ selected_sidebar }}</h5>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div v-for="(item, index) in menus.find(item => item.name === selected_sidebar).data" :key="index">
                            <div class="py-3">
                                <Link :href="item.path">{{ item.name }}</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed transition-all right-0 top-0 bg-white shadow space-y-4 md:w-72 w-96 z-10" :class="{'-right-3/4 hidden': !show_notification}">
                <div class="relative p-6 min-h-screen">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex gap-2 items-center">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center bg-primary/20 items-center justify-center">
                                <Icon class="text-primary" icon="carbon:notification"/>
                            </div>
                            <h5 class="text-xl font-bold">Notification</h5>
                        </div>
                        <div class="cursor-pointer" @click="show_notification = !show_notification">
                            <Icon icon="carbon:close" class="text-3xl text-gray-400"/>
                        </div>
                    </div>

                </div>
            </div>
            <div class="fixed top-0 p-4 left-0 bg-white shadow-lg space-y-4 md:inline-block z-10" :class="{'hidden': show_sidebar}">
                <div class="relative min-h-screen">
                    <div class="mb-9">
                        <img src="/image/logo-icon.png" class="w-10" alt="">
                    </div>
                    <div id="menu-nav">
                        <div class="text-center space-y-6 text-gray-500">
                            <div>
                                <Link :href="route('dashboard')" class="hover:text-primary inline-block" :class="{'text-primary': header === 'Dashboard'}">
                                    <Icon icon="carbon:chart-network" class="text-xl"/>
                                </Link>
                            </div>
                            <div>
                                <Link class="hover:text-primary inline-block" :class="{'text-primary': header === 'Course'}">
                                    <Icon icon="carbon:book" class="text-xl"/>
                                </Link>
                            </div>
                            <div>
                                <div @click="onSelectMenu('Product', 'carbon:carbon-for-ibm-product')" class="hover:text-primary inline-block">
                                    <Icon icon="carbon:carbon-for-ibm-product" class="text-xl"/>
                                </div>
                            </div>
                            <div>
                                <Link class="hover:text-primary inline-block">
                                    <Icon icon="carbon:chat" class="text-xl"/>
                                </Link>
                            </div>
                            <div>
                                <div @click="on_search = !on_search" class="hover:text-primary inline-block">
                                    <Icon icon="carbon:search" class="text-xl"/>
                                </div>
                            </div>
                            <div class="absolute w-full left-0 bottom-10 space-y-5">
                                <div>
                                    <Link class="hover:text-primary inline-block">
                                        <Icon icon="carbon:settings" class="text-2xl"/>
                                    </Link>
                                </div>
                                <div class="dropdown dropdown-top md:inline-block hidden">
                                    <label tabindex="0" class="w-10 h-10 cursor-pointer flex justify-center items-center bg-primary rounded-full">
                                        <Icon class="text-white font-bold" icon="carbon:user"></Icon>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><Link :href="route('profile.show')">Profile</Link></li>
                                        <li class="text-danger"><Link class="text-danger" @click="logout">Logout</Link></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed transition-all top-0 left-0 bg-white shadow space-y-4 md:w-96 w-full z-20" :class="{'-left-3/4 hidden': !on_search}">
                <div class="relative p-8 min-h-screen">
                    <div class="flex justify-between items-center">
                        <div class="flex gap-2 items-center">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center bg-primary/20 items-center justify-center">
                                <Icon class="text-primary" icon="carbon:search"/>
                            </div>
                            <h5 class="text-xl font-bold">Search Feature</h5>
                        </div>
                        <div class="cursor-pointer" @click="on_search = !on_search">
                            <Icon icon="carbon:close" class="text-3xl text-gray-400"/>
                        </div>
                    </div>
                    <div class="mt-6">
                        <form>
                            <input type="text" placeholder="Search Something" class="input input-bordered w-full" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="container mx-auto md:pl-16">
                <div class="ml-auto py-6 px-4 sm:px-6 lg:px-8 transition-all" :class="{'max-w-7xl': show_sidebar, 'max-w-5xl': !show_sidebar}">
                    <header v-if="$slots.header">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="inline-block" :class="{'md:hidden': header !== 'Product' && header !== 'Course'}" @click="show_sidebar = !show_sidebar">
                                    <Icon v-if="!show_sidebar" icon="line-md:menu-unfold-right" class="text-primary text-3xl"/>
                                    <Icon v-else icon="line-md:menu-unfold-left" class="text-primary text-3xl"/>
                                </div>
                                <slot name="header" />
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="dropdown dropdown-down md:hidden inline-block dropdown-end">
                                    <label tabindex="0" class="w-8 h-8 cursor-pointer flex justify-center items-center bg-primary rounded-full">
                                        <Icon class="text-white font-bold" icon="carbon:user"></Icon>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                        <li><Link>Profile</Link></li>
                                        <li class="text-danger"><Link class="text-danger" @click="logout">Logout</Link></li>
                                    </ul>
                                </div>
                                <div @click="show_notification = !show_notification" class="cursor-pointer">
                                    <Icon class="text-gray-500 font-bold text-2xl" icon="carbon:notification"></Icon>
                                </div>
                            </div>
                        </div>
                    </header>

                    <main>
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
