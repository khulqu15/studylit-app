<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'
import { Icon } from '@iconify/vue'
</script>

<template>
    <AppLayout title="Dashboard" header="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-4 gap-3 items-center">
                        <div class="md:col-span-2 col-span-4 flex items-center justify-center gap-4">
                            <div class="w-20 h-20 relative bg-primary rounded-full flex justify-center items-center">
                                <Icon icon="carbon:user" class="text-3xl text-white"/>
                            </div>
                            <div class="user-text">
                                <h2 class="text-2xl font-bold">Welcome back, {{ $page.props.user.name }}</h2>
                                <span>It's really nice to see you again</span>
                            </div>
                        </div>
                        <div class="task-status md:col-span-1 col-span-2">
                            <h1 class="text-3xl font-bold">10</h1>
                            <span class="block">Tasks are pending review</span>
                            <Link class="font-bold text-primary">View Tasks</Link>
                        </div>
                        <div class="task-status md:col-span-1 col-span-2">
                            <div class="bg-primary/80 shadow-lg relative p-4 rounded-md text-white">
                                <span>Start find your favorite course and start learning now.</span>
                                <Icon icon="carbon:book" class="absolute bottom-4 right-4 text-5xl opacity-50"/>
                                <Link class="font-bold text-white block mt-3">Start Now</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-6 mt-5">
                <div class="grow md:w-3/4 w-full">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold">My Course</h3>
                                <Link class="text-primary font-semibold">View All</Link>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div v-for="(item, index) in 6" class="p-3 hover:bg-gray-50 rounded-md flex justify-between items-center">
                                    <div class="flex justify-start items-center gap-3">
                                        <div class="w-12 h-12 rounded-md bg-primary overflow-hidden">
                                            <img :src="`https://picsum.photos/id/${item * 12}/367/267`" class="w-full h-full object-center object-cover" alt="Image Course">
                                        </div>
                                        <div>
                                            <h5 class="font-semibold">StudyLit Course - Course Innovative {{ item }}</h5>
                                            <span class="text-sm text-gray-500">Opened 10h ago</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="avatar-group -space-x-3">
                                            <div class="avatar">
                                                <div class="w-8">
                                                    <img :src="`https://picsum.photos/id/${item * 10}/367/267`" />
                                                </div>
                                            </div>
                                            <div class="avatar">
                                                <div class="w-8">
                                                    <img :src="`https://picsum.photos/id/${item * 8}/367/267`" />
                                                </div>
                                            </div>
                                            <div class="avatar">
                                                <div class="w-8">
                                                    <img :src="`https://picsum.photos/id/${item * 7}/367/267`" />
                                                </div>
                                            </div>
                                            <div class="avatar placeholder">
                                                <div class="w-8 bg-neutral-focus text-neutral-content">
                                                    <span class="text-sm">+23</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown dropdown-end">
                                            <label tabindex="0">
                                                <Icon icon="mdi:ellipsis-vertical" class="text-2xl"/>
                                            </label>
                                            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><Link>View Detail</Link></li>
                                                <li><Link>Book</Link></li>
                                                <li><Link>Video</Link></li>
                                                <li><Link>Practicing</Link></li>
                                                <li><Link>Make a gift</Link></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md:col-span-1 col-span-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold">Todo List</h3>
                                <Link class="text-primary font-semibold">View All</Link>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div v-for="(item, index) in 4">
                                    <div class="flex justify-start items-start gap-3">
                                        <label class="swap w-10 h-10 bg-gray-100 rounded-full text-gray-700">
                                            <input type="checkbox" class="hidden"/>
                                            <Icon class="swap-on text-4xl text-primary" icon="material-symbols:check-small-rounded"/>
                                            <Icon class="swap-off text-4xl scale-90 text-gray-400" icon="material-symbols:close-rounded"/>
                                        </label>
                                        <div>
                                            <h5 class="text-md font-semibold">Elektronika : Praktikum Nyolder {{ item }}</h5>
                                            <span class="text-sm text-gray-500">Opened 10h ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-1 mt-6 col-span-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold">My Friend</h3>
                                <Link class="text-primary font-semibold">View All</Link>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div v-for="(item, index) in 4">
                                    <div class="flex justify-start items-start gap-3">
                                        <label class="swap w-10 h-10 bg-gray-100 rounded-full text-gray-700">
                                            <input type="checkbox" class="hidden"/>
                                            <Icon class="swap-on text-4xl text-primary" icon="material-symbols:check-small-rounded"/>
                                            <Icon class="swap-off text-4xl scale-90 text-gray-400" icon="material-symbols:close-rounded"/>
                                        </label>
                                        <div>
                                            <h5 class="text-md font-semibold">Elektronika : Praktikum Nyolder {{ item }}</h5>
                                            <span class="text-sm text-gray-500">Opened 10h ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </AppLayout>
</template>
