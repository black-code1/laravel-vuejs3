<template>
    <form class="space-y-6" @submit.prevent="storeCustomer">
        <div>
            <label for="name" class="block">Nom du client</label>
            <input type="text" id="name" v-model="form.name" />
        </div>
        <div>
            <label for="tel" class="block">Tel. du client</label>
            <input type="text" id="tel" v-model="form.tel" />
        </div>
        <div>
            <label for="is_favourite" class="block">Favori ?</label>
            <input
                type="checkbox"
                id="is_favourite"
                v-model="form.is_favourite"
            />
        </div>
        <button type="submit" class="bg-blue-500 px-2 py-1 text-white rounded">
            Enregistrer
        </button>
    </form>
</template>

<script>
import { reactive } from "vue";
import router from "../router/index.js";
import useCustomers from "../services/customerservices.js";
export default {
    setup() {
        const form = reactive({
            name: "",
            tel: "",
            is_favourite: "",
        });

        const { createCustomer } = useCustomers();

        const storeCustomer = async () => {
            await createCustomer({ ...form });
            router.push({ name: "customers.index" });
        };

        return {
            form,
            storeCustomer,
        };
    },
};
</script>
