import axios from "axios";
import { ref } from "vue";

export default function useCustomers() {
    const customers = ref([]);

    const getCustomers = async () => {
        let response = await axios.get("/api/customers");
        customers.value = response.data.data;
    };

    const createCustomer = async (data) => {
        await axios.post("/api/customers", data);
    };

    return {
        customers,
        getCustomers,
        createCustomer,
    };
}
