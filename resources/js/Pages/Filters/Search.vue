<template>
    <div class="flex items-center ">
        <div class="flex w-1/2 bg-white shadow rounded ">
            <label for="search" class="px-3 py-3" >Search</label>
            <br clear="all"/>
            <input class="relative w-full px-6 py-3 rounded-r focus:shadow-outline" autocomplete="off" type="text"
                   name="search" id="search" placeholder="…" v-model="search">
        </div>

    </div>
</template>

<script>
import { stringify } from 'qs';

export default {
    props: ['filters','routeUrl'],
    data() {
        return {
            search: this.filters.search
        }
    },
    watch: {
        search: _.throttle(function(){
            const query = stringify({
                search: this.search || undefined,
            })

            this.$inertia.visit(query ? `${this.routeUrl}?${query}` : `${this.routeUrl}`,{
                preserveState: true,
                preserveScroll: true,
            });
        },500)
    }
}
</script>
