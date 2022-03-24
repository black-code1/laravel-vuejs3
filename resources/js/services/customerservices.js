import { ref } from "vue";
import axios from "axios";
import router from "../router/index.js";

export default function useCustomers() {
    const errors = ref("");
    const customers = ref([]);

    const getCustomers = async () => {
        let response = await axios.get("/api/customers");
        customers.value = response.data.data;
    };

    const createCustomer = async (data) => {
        try {
            await axios.post("/api/customers", data);
            router.push({ name: "customers.index" });
        } catch (error) {
            const createCustomerErrors = error.response.data.errors;

            for (const key in createCustomerErrors) {
                errors.value += createCustomerErrors[key][0] + " ";
                console.log(errors.value);
            }
            console.log("errors ref");
            console.log(errors);
        }
    };

    return {
        customers,
        errors,
        getCustomers,
        createCustomer,
    };
}
